<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $rememberMe;



    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'пароль',
            'email' => 'Email',
            'password_repeat' => 'Повторить пароль',
        ];
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'email'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password_repeat', 'compare', 'compareAttribute'=>'password'],
        ];
    }




    public function register()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password =Yii::$app->getSecurity()->generatePasswordHash($this->password);

        return $user->save() ? $user: null;
    }

}
