<h1>Чат</h1>

<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

foreach ($messages as $message): ?>
    <div class="messages">
        <div class="message-container">
            <p> <?= Yii::$app->user->identity->username ?? 'Аноним' ?></p>
            <p> <?= $message->text ?></p>
            <p> <?= date('d.m.Y H:i', strtotime($message->created_at)) ?></p>
        </div>
    </div>
<?php endforeach; ?>

<?php $form = ActiveForm::begin(); ?>
    <div class="message-form">
        <?= $form->field($model, 'text')->textarea(['rows' => 1]) ?>
        <?= Html::submitButton('Отправить', ['class' => 'reg-but-regsite'])?>
    </div>
<?php ActiveForm::end(); ?>
