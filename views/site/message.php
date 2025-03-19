

<h1>Чат</h1>

<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

foreach ($messages as $message): ?>
    <div class="message" style="margin-top: 20px; background-color: #7b5a7d; color: white; padding-left: 15px; border-radius: 15px; ">
        <p> <?= Yii::$app->user->identity->username ?? 'Аноним' ?></p>
        <p> <?= $message->text ?></p>
        <p> <?= date('d.m.Y H:i', strtotime($message->created_at)) ?></p>
    </div>
<?php endforeach; ?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>