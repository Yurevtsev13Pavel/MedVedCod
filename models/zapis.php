<?php

namespace app\models;

use yii\db\ActiveRecord;

class zapis extends ActiveRecord
{
    public static function tableName()
    {
        return 'zapis';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'date_of_birth' => 'Дата Рождения',
            'numbercard' => 'Номер карты',
            'diagnez' => 'Основной диагноз',
            'zapis' => 'Запись в карточке',
            'type' => 'Тип записи',
        ];
    }
}