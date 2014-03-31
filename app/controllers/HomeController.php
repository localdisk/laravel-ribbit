<?php

/**
 * HomeController
 *
 * @author localdisk
 */
class HomeController extends BaseController
{
    /**
     * Ribbit Model
     * 
     * @var Ribbit
     */
    private $_ribbit;

    /**
     * コンストラクタ
     * 
     * @param Ribbit $ribbit
     */
    public function __construct(Ribbit $ribbit)
    {
        $this->_ribbit = $ribbit;
        $this->beforeFilter('auth', ['only' => ['ribbit', 'profile', 'follow']]);
    }
    
    /**
    * Top 画面
    *
    * @return Response
    */
    public function index()
    {
        $data = [];
        if (Auth::check()) {
            $user         = Auth::user();
            $data['user'] = $user;
            $data['ribbits'] = $this->_ribbit->with('user')
                            ->whereIn('user_id', $user->following()->lists('followee_id'))
                            ->orderBy('id', 'desc')->get();
        }
            return View::make('home', $data);
    }

    public function ribbit()
    {
        $inputs   = Input::only('ribbit');
        $rules  = [
            'ribbit' => 'required|max:140',
        ];
        $valdator = Validator::make($inputs, $rules);
        if ($valdator->fails()) {
            return Redirect::back()->withErrors($valdator)->withInput();
        }
        $this->_ribbit->ribbit  = $inputs['ribbit'];
        $this->_ribbit->user_id = Auth::user()->id;
        $this->_ribbit->save();
        Session::flash('success', 'つぶやきを保存しました');
        return Redirect::back();
    }

    public function profile($username)
    {
        $data            = [];
        $user              = User::where('username', '=', $username)->first();
        $following_id      = $user->following()->whereNotIn('followee_id', [Auth::user()->id])->lists('followee_id');
        $data['ribbits'] = $this->_ribbit->with('user')
                        ->where('user_id', '=', $user->id)
                        ->orderBy('id', 'desc')->get();
        $data['user']      = $user;
        $data['following'] = array_except($following_id, $user->id);
        return View::make('ribbits', $data);
    }

    public function follow()
    {
        $rules    = [
            'user_id' => 'required',
        ];
        $inputs   = Input::only('user_id');
        $valdator = Validator::make($inputs, $rules);
        if ($valdator->fails()) {
            return Redirect::back()->withErrors($valdator)->withInput();
        }
        Follow::create(['user_id' => Auth::user()->id, 'followee_id' => $inputs['user_id']]);
        Session::flash('success', User::find($inputs['user_id'])->username . 'をフォローしました');
        return Redirect::back();
    }

    public function unfollow()
    {
        $rules    = [
            'user_id' => 'required',
        ];
        $inputs   = Input::only('user_id');
        $valdator = Validator::make($inputs, $rules);
        if ($valdator->fails()) {
            return Redirect::back()->withErrors($valdator)->withInput();
        }
        Follow::where('user_id', '=', Auth::user()->id)
                ->where('followee_id', '=', $inputs['user_id'])->delete();
        Session::flash('success', User::find($inputs['user_id'])->username . 'のフォローを外しました');
        return Redirect::back();
    }

}