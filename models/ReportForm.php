<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property int $category_id
 *
 * @property Category $category
 */

class ReportForm extends Model
{
    public $category_id;
    public $zapis;
    public $date_zapis;
    public $name;
    public $diagnez;
    public $numbercard;
    public $date_of_birth;

    public function rules()
    {
        return [
            [['category_id', 'zapis', 'date_zapis'], 'required'],
            [['category_id', 'numbercard'], 'integer'],
            [['zapis', 'name', 'diagnez'], 'string'],
            [['date_zapis', 'date_of_birth'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Тип записи',
            'name' => 'Имя пациента',
            'numbercard' => 'Номер карты',
            'date_zapis' => 'Дата записи',
            'zapis' => 'Запись',
            'diagnez' => 'Диагноз',
        ];
    }

    public function save()
    {
        $report = new Report();
        $report->attributes = $this->attributes;
        return $report->save() ? $report : null;
    }
}