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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'zapis', 'date_zapis'], 'required'],
            [['date_zapis'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Тип записи',
            'zapis' => 'Запись',
            'date_zapis' => 'Дата записи',
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
     * @return Report
     */

    public function save(){
        $report = new Report();
        $report->category_id = $this->category_id;
        $report->name = $this->name;
        $report->diagnez = $this->diagnez;
        $report->date_zapis = $this->date_zapis;
        $report->zapis = $this->zapis;
        $report->date_of_birth = $this->date_of_birth;
        $report->numbercard = $this->numbercard;

        return $report->save() ? $report: null;
    }
}
