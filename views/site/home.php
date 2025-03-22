<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Главная';
?>

<div class="duty-hours">
    <div class="avatar"></div>
    <p calss="text">Сейчас дежурит:</p>
    <button class="duty-button">РАСПИСАНИЕ ДЕЖУРСТВ</button>
</div>

<img src="<?= Yii::getAlias('images/logo.png') ?>" alt="Logo">

<p>Задачи на день</p>

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
            <td style='width: 60%; border-left: 2px solid #4d5154; border-right: 2px solid #4d5154;'>{$row['name']}</td>
            <td style='width: 20%;'>{$row['time']}</td>
            </tr>";
        }
    ?>
</table>