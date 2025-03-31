<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Добро Пожаловать';
?>


<h1>Добро пожаловать в NexaHealthSolutions</h1>
<h3>Система автоматизированного места дежурного врача</h3>
<img src="<?= Yii::getAlias('images/logo.png') ?>" alt="Logo">
<div class="loginbut">
    <?= Html::a('Регистрация', ['register'], ['class' => 'reg-but-regsite']) ?>
    <?= Html::a('Вход', ['login'], ['class' => 'reg-but-regsite']) ?>
</div>
