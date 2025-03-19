<?php

namespace app\models;

use yii\db\ActiveRecord;
class Message extends ActiveRecord
{
    public static function tableName()
    {
        return 'message';
    }

    public function rules()
    {
        return [
            [['text', 'user_id'], 'required'],
            [['text'], 'string'],
            [['user_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Текст сообщения',
            'user_id' => 'ID пользователя',
            'created_at' => 'Время отправки',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserName()
    {
        return $this->user ? $this->user->username : 'Аноним';
    }
}