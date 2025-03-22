<?php

namespace app\models;

use yii\db\ActiveRecord;

class TaskTable extends ActiveRecord
{
    public static function tableName()
    {
        return 'TaskTable';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'time' => 'Время выполнения',
        ];
    }
}