<?php

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class addpatient extends Model
{
    public $name;
    public $numbercard;
    public $date_of_birth;
    public $diagnez;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reester';
    }

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
          [['name', 'date_of_birth', 'numbercard', 'diagnez'], 'required'],
          [['name', 'diagnez'], 'string'],
          [['date_of_birth'], 'date', 'format' => 'php:Y-m-d'],
          [['numbercard'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function attributeLabels()
    {
        return [
            'name' => 'ФИО',
            'date_of_birth' => 'Дата рождения (год-месяц-число)',
            'numbercard' => 'Номер карты',
            'diagnez' => 'Диагноз',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function save()
    {
        $reester = new reester();
        $reester->name = $this->name;
        $reester->date_of_birth = $this->date_of_birth;
        $reester->numbercard = $this->numbercard;
        $reester->diagnez = $this->diagnez;

        return $reester->save() ? $reester: null;
    }
}