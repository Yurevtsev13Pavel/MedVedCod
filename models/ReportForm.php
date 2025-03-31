<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $text
 *
 * @property Category $category
 * @property User $user
 */

class ReportForm extends Model
{
    public $category_id;
    public $user_id;
    public $text;
    public $name;
    public $cardnumber;
    public $datebirth;
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
            [['user_id', 'category_id', 'zapis', 'numbercard', 'date_zapis', 'date_of_birth', 'name'], 'required'],
            ['text', 'safe'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'category_id' => 'Тип записи',
            'zapis' => 'Запись',
            'date_zapis' => 'Запись',
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

    public function save(){
        $report = new Report();
        $report->user_id = Yii::$app->user->id;
        $report->category_id = $this->category_id;
        $report-> = $this->;
        $report->name = $this->name;
        $report->date_of_birth = $this->date_of_birth;
        $report->numbercard = $this->numbercard;

        return $report->save() ? $report: null;
    }
}
