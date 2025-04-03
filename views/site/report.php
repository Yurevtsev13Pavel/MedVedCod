<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportForm */
/* @var $patient app\models\Reester */

$this->title = 'Новая запись для: ' . Html::encode($patient->name);
?>

<div class="report-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="patient-info">
        <p><strong>Номер карты:</strong> <?= $patient->numbercard ?></p>
        <p><strong>Дата рождения:</strong> <?= Yii::$app->formatter->asDate($patient->date_of_birth) ?></p>
        <p><strong>Диагноз:</strong> <?= Html::encode($patient->diagnez) ?></p>
    </div>

    <div class="report-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'category_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name'),
            ['prompt' => 'Выберите тип записи']
        ) ?>

        <?= $form->field($model, 'date_zapis')->input('date' ) ?>

        <?= $form->field($model, 'zapis')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Добавить запись', ['class' => 'reg-but-regsite']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>