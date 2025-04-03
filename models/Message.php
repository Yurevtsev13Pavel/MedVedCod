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
            [['created_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => '',
            'user_id' => 'ID пользователя',
            'created_at' => 'Время отправки',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created_at = date('Y-m-d H:i:s');
            }
            return true;
        }
        return false;
    }
}