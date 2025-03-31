<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property int $category_id
 *
 * @property Category $category
 */
class Report extends \yii\db\ActiveRecord
{
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
            [['category_id', 'zapis', 'date_zapis', 'name', 'date_of_birth', 'numbercard', 'diagnez'], 'required'],
            [['category_id', 'numbercard'], 'integer'],
            [['zapis'], 'string'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
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
            'name' => 'Имя пациента',
            'numbercard' => 'Номер карты',
            'date_zapis' => 'Дата записи',
            'zapis' => 'Запись',
            'diagnez' => 'Диагноз',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
