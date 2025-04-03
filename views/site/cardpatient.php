<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
?>

<div class="patient-card">
    <h1><?= Html::encode($name) ?>, карта №<?= Html::encode($numbercard) ?></h1>

    <div class="patient-info">
        <?= DetailView::widget([
            'model' => new \yii\base\DynamicModel([
                'date_of_birth' => $date_of_birth,
                'diagnez' => $diagnez
            ]),
            'attributes' => [
                [
                    'label' => 'Дата рождения',
                    'value' => Yii::$app->formatter->asDate($date_of_birth),
                ],
                [
                    'label' => 'Основной диагноз',
                    'value' => Html::encode($diagnez),
                ],
            ],
        ]) ?>
    </div>

    <div style="display: flex; flex-direction: row;">
        <h2>Записи в карточке</h2>
        <div style="margin-left: 2%; margin-top: 5px;"><?= Html::a('Добавить запись', ['report', 'numbercard' => $numbercard], ['class' => 'button-add'])?></div>
    </div>

    <div class="patient-records">
        <?= GridView::widget([
            'dataProvider' => $zapisDataProvider,
            'columns' => [
                [
                    'attribute' => 'category_id',
                    'label' => 'тип записи',
                    'value' => function($model) {
                        return $model->category->name; // Получаем название категории через связь
                    }
                ],
                [
                    'attribute' => 'date_zapis',
                    'label' => 'Дата записи',
                ],
                [
                    'attribute' => 'zapis',
                    'label' => 'запись',
                ],
            ],
            'emptyText' => 'Записей не найдено',
        ]) ?>

    </div>
</div>



<style>
    .patient-card {
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .patient-info {
        margin-bottom: 30px;
    }
    .patient-records {
        margin-top: 30px;
    }
</style>