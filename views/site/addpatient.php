<h1>Добавить пациента</h1>

<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Добавить Пациента';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="report-form">
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'name', ['inputOptions' => [
        'style' => 'width: 1000px; height: 45px; font-size: 16px;'
    ]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_birth')->input('date') ?>

    <?= $form->field($model, 'numbercard')->textInput() ?>

    <?= $form->field($model, 'diagnez')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('добавить', ['class' => 'reg-but-regsite']) ?>
    </div>

    <?php $form = ActiveForm::end() ?>
</div>
