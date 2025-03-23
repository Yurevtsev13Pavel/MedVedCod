
<h1>Реестр пациентов</h1>

<?php
/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Реестр пациентов';
?>

<table class="task-table">
    <tr class="top-table">
        <th>ФИО</th>
        <th style="border-left: 2px solid #4d5154; border-right: 2px solid #4d5154;">Дата рождения</th>
        <th style='border-right: 2px solid #4d5154;'>Номер карточки</th>
        <th>Основной диагноз</th>
    </tr>
    <?php
    foreach ($patients as $patient){
        echo "<tr class='string-table'>
            <td>{$patient['name']}</td>
            <td style='border-left: 2px solid #4d5154; border-right: 2px solid #4d5154;'>{$patient['date_of_birth']}</td>
            <td style='border-right: 2px solid #4d5154;'>{$patient['numbercard']}</td>
            <td>{$patient['diagnez']}</td>
            </tr>";
    }
    ?>
</table>

<?= Html::a('Добавить', ['addpatient'], ['class' => 'button-add']) ?>
