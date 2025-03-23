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

<div class="users-form">
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_birth')->textInput() ?>

    <?= $form->field($model, 'numbercard')->textInput() ?>

    <?= $form->field($model, 'diagnez')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php $form = ActiveForm::end() ?>
</div>
