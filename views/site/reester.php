
<h1>Реестр пациентов</h1>

<?php
/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Реестр пациентов';
?>

<div class="task-table">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->name, ['cardpatient',
                        'name' => $model->name,
                        'date_of_birth' => $model->date_of_birth,
                        'numbercard' => $model->numbercard,
                        'diagnez' => $model->diagnez
                    ], ['title' => 'Перейти к карте пациента',
                        'style' => 'color: inherit; text-decoration: none;']);
                },
                'filter' => Html::activeTextInput($searchModel, 'name', ['class' => 'form-control']),
            ],
            [
                'attribute' => 'date_of_birth',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->date_of_birth, ['cardpatient',
                        'name' => $model->name,
                        'date_of_birth' => $model->date_of_birth,
                        'numbercard' => $model->numbercard,
                        'diagnez' => $model->diagnez
                    ], ['title' => 'Перейти к карте пациента',
                        'style' => 'color: inherit; text-decoration: none;']);
                },
                'filter' => Html::activeTextInput($searchModel, 'date_of_birth', ['class' => 'form-control']),
            ],
            [
                'attribute' => 'numbercard',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->numbercard, ['cardpatient',
                        'name' => $model->name,
                        'date_of_birth' => $model->date_of_birth,
                        'numbercard' => $model->numbercard,
                        'diagnez' => $model->diagnez
                    ], ['title' => 'Перейти к карте пациента',
                        'style' => 'color: inherit; text-decoration: none;']);
                },
                'filter' => Html::activeTextInput($searchModel, 'numbercard', ['class' => 'form-control']),
            ],
            [
                'attribute' => 'diagnez',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->diagnez, ['cardpatient',
                        'name' => $model->name,
                        'date_of_birth' => $model->date_of_birth,
                        'numbercard' => $model->numbercard,
                        'diagnez' => $model->diagnez
                    ], ['title' => 'Перейти к карте пациента',
                        'style' => 'color: inherit; text-decoration: none;']);
                },
                'filter' => Html::activeTextInput($searchModel, 'diagnez', ['class' => 'form-control']),
            ],

        ],
    ])?>
</div>

<?= Html::a('Добавить', ['addpatient'], ['class' => 'button-add']) ?>
