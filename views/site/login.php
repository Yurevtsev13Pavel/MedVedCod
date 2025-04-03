<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'С возвращением!';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Авторизируйтесь, чтобы войти в систему</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username', ['inputOptions' => [
                'style' => 'width: 1000px; height: 45px; font-size: 16px;'
            ]])->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password', ['inputOptions' => [
                'style' => 'width: 1000px; height: 45px; font-size: 16px;'
            ]])->passwordInput() ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Вход', ['class' => 'reg-but-regsite', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
