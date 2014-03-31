<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * An Eloquent Model: 'user'
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $picture
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class User extends Eloquent implements UserInterface, RemindableInterface {

    /**
     * モデルで使用されるデータベース
     *
     * @var string
     */
    protected $table = 'users';
    
    protected $fillable = ['username', 'email', 'password'];

    /**
     * モデルのJSON形式に含めない項目
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * ユーザーのユニークな識別子の取得.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * ユーザーのパスワードの取得
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * パスワードリマインダーを送信するメールアドレスの取得
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    /**
     * パスワードをセットしたら自動で Hash する
     * 
     * @param string $value
     */
    public function setPasswordAttribute($value = null)
    {
        if (!is_null($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function getPhotoAttribute()
    {
        return 'photo/' . $this->picture;
    }

    /**
     * Following
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function following()
    {
        return $this->hasMany('Follow');
    }

    /**
     * Fllowers
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function followers()
    {
        return $this->hasMany('Follow', 'followee_id');
    }

    /**
     * Ribbits
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ribbits()
    {
        return $this->hasMany('Ribbit');
    }
}