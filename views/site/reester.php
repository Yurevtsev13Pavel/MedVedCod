
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
                'filter' => Html::activeTextInput($searchModel, 'name', ['class' => 'form-control']),
            ],
            [
                'attribute' => 'date_of_birth',
                'filter' => Html::activeTextInput($searchModel, 'date_of_birth', ['class' => 'form-control']),
            ],
            [
                'attribute' => 'numbercard',
                'filter' => Html::activeTextInput($searchModel, 'numbercard', ['class' => 'form-control']),
            ],
            [
                'attribute' => 'diagnez',
                'filter' => Html::activeTextInput($searchModel, 'diagnez', ['class' => 'form-control']),
            ],

        ],
])?>
</div>

<?= Html::a('Добавить', ['addpatient'], ['class' => 'button-add']) ?>
