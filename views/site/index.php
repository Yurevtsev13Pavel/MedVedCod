<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Добро Пожаловать';
?>


<h1>Добро пожаловать в NexaHealthSolutions</h1>
<h3>Система автоматизированного места дежурного врача</h3>
<img src="<?= Yii::getAlias('images/logo.png') ?>" alt="Logo">
<div class="loginbut">
    <?=
    Html::submitButton('Регистрация', ['class' => 'butlog',
        'url' => ['/site/register']]);
    ?>
    <?=
    Html::submitButton('Вход', ['class' => 'butlog',
        'url' => ['/site/login']])
    ?>
</div>
