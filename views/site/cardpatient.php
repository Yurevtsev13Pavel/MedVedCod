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

    <div class="patient-records">
        <h2>Записи в карточке</h2>

        <?= GridView::widget([
            'dataProvider' => $zapisDataProvider,
            'columns' => [
                [
                    'attribute' => 'category_id',
                    'label' => 'тип записи',
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

<?= Html::a('Добавить запись', ['report'], ['class' => 'button-add']) ?>

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