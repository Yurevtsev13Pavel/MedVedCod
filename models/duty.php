<?php

namespace app\models;

use yii\db\ActiveRecord;

class duty extends ActiveRecord
{
    public static function tableName()
    {
        return 'duty';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя врача',
            'date' => 'Дата дежурства',
            'time' => 'Время дежурства (день/ночь)',
        ];
    }
}