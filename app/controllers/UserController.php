<?php
/**
 * UserController
 *
 * @author localdisk
 */
class UserController extends BaseController
{

    public function __construct()
    {
        $this->beforeFilter('auth', ['only' => ['getSetting', 'postSetting']]);
    }

    /**
     * ユーザー登録画面
     * 
     * @return Response
     */
    public function getSignup()
    {
        return View::make('user.signup');
    }

    /**
     * ユーザー登録
     * 
     * @return Response
     */
    public function postRegister()
    {
        $rules = [
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ];
        $inputs = Input::only(['username', 'email', 'password']);
        $valdator = Validator::make($inputs, $rules);
        if ($valdator->fails()) {
            return Redirect::back()->withErrors($valdator)->withInput();
        }
        DB::transaction(function() use ($inputs) {
            $user = User::create($inputs);
            // 自分で自分をフォローする
            $user->following()->save(new Follow(['followee_id' => $user->id]));
        });
        Session::flash('success', 'ユーザーを作成しました。');
        return Redirect::to('user/login');
    }

    /**
     * ログイン画面
     * 
     * @return Response
     */
    public function getLogin()
    {
        return View::make('user/login');
    }

    /**
     * ログイン
     * 
     * @return Response
     */
    public function postLogin()
    {
        $credentials = Input::only([ 'username', 'password']);
        if (Auth::attempt($credentials, Input::only('remember'))) {
            return Redirect::intended('/');
        }
        Session::flash('error', 'ログインに失敗しました。');
        return Redirect::back()->withInput();
    }

    /**
     * ログアウト
     * 
     * @return Response
     */
    public function getLogout()
    {
        Auth::logout();
        Session::flash('info', 'ログアウトしました。');
        return Redirect::to('/');
    }

    /**
     * 設定画面
     * 
     * @return Response
     */
    public function getSetting()
    {
        return View::make('user.setting')->with('user', Auth::user());
    }

    public function postSetting()
    {
        $inputs = Input::only(['username', 'email', 'password']);
        // 正しいユーザーか?
        if (!Auth::validate(['username' => Auth::user()->username, 'password' => $inputs['password']])) {
            Session::flash('error', 'パスワードが違います');
            return Redirect::back()->withInput();
        }
        // ファイルアップロード処理
        $user     = Auth::user();
        $fileName = null;
        if (Input::hasFile('picture')) {
            $file     = Input::file('picture');
            $valdator = Validator::make(['picture' => $file], ['picture' => 'image']);
            // 画像以外は NG
            if ($valdator->fails()) {
                Session::flash('error', '画像のみアップロードできます');
                return Redirect::back()->withInput();
            }
            // 100 * 100 にリサイズ
            $image = Image::make($file->getRealPath());
            $image->grab(100); // grab 便利

            $fileName = is_null($user->picture) ? Str::random() . '.jpg' : $user->picture;
            $image->save(public_path('photo') . DIRECTORY_SEPARATOR . $fileName);
        }
        // 設定を保存
        $user->username = $inputs['username'];
        $user->email    = $inputs['email'];
        $user->picture  = $fileName;
        $user->save();
        Session::flash('success', 'ユーザー設定を変更しました');
        return Redirect::back();
    }

}
