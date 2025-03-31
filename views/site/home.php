<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Главная';
?>

<div class="duty-hours">
    <img class="avatar-duty" src="<?= Yii::getAlias('images/avatar.png') ?>" alt="Avatar">
    <p class="text">Сейчас дежурит:<br><?= Yii::$app->user->identity->username ?></p>
    <div class="duty-button">
        <?= Html::a('График дежурств', ['duty'], ['class' => 'butlog', 'style' => 'width: auto; min-width: 120px; height: 30px; line-height: 30px; padding: 0 15px;',]) ?>
    </div>
</div>

<img src="<?= Yii::getAlias('images/logo.png') ?>" alt="Logo">

<h2 style="font-weight: bold;">Задачи на день</h2>

<table class="task-table">
    <tr class="top-table">
        <th style='width: 20%;'>Номер задачи</th>
        <th style='width: 60%; border-left: 2px solid #4d5154; border-right: 2px solid #4d5154;'>Название задачи</th>
        <th style='width: 20%;'>Время выполнения</th>
    </tr>
    <?php
        foreach ($rows as $row){
            echo "<tr class='string-table'>
            <td style='width: 20%;'>{$row['id']}</td>
            <td style='width: 60%; border-left: 2px solid #4d5154; border-right: 2px solid #4d5154; text-align: left;'>{$row['name']}</td>
            <td style='width: 20%;'>{$row['time']}</td>
            </tr>";
        }
    ?>
</table>