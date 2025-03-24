<h1>График Дежурств</h1>

<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'График дежурств';
?>

<table class="task-table">
    <tr class="top-table">
        <th>Имя</th>
        <th style="border-left: 2px solid #4d5154; border-right: 2px solid #4d5154;">Дата дежурства</th>
        <th>Время дежурства (день/ночь)</th>
    </tr>
    <?php
    foreach ($duties as $duty){
        echo "<tr class='string-table'>
            <td>{$duty['name']}</td>
            <td style='border-left: 2px solid #4d5154; border-right: 2px solid #4d5154;'>{$duty['date']}</td>
            <td>{$duty['time']}</td>
            </tr>";
    }
    ?>
</table>
