<?php

namespace app\models;

use yii\db\ActiveRecord;

class reester extends ActiveRecord
{
    public static function tableName()
    {
        return 'reester';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'date_of_birth' => 'Дата Рождения',
            'numbercard' => 'Номер карты',
            'diagnez' => 'Основной диагноз',
        ];
    }
}