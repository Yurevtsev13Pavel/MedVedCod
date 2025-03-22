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

<table class="task-table">
    <tr class="top-table">
        <th>Номер задачи</th>
        <th>Название задачи</th>
        <th>Время выполнения</th>
    </tr>
    <?php
        foreach ($rows as $row){
            echo "<tr class='string-table'>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['time']}</td>
            </tr>";
        }
    ?>
</table>