<h1>Чат</h1>

<div class="messages">
    <?php use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    foreach ($messages as $message): ?>
        <div class="message-container">
            <p><strong><?= Html::encode($message->user->username ?? 'Аноним') ?></strong></p>
            <p><?= Html::encode($message->text) ?></p>
            <p class="time"><?= Yii::$app->formatter->asDatetime($message->created_at) ?></p>
        </div>
    <?php endforeach; ?>

    <div class="message-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="message-form">
            <div class="pole">
                <?= $form->field($model, 'text')->textarea(['rows' => 1]) ?>
            </div>
            <?= Html::submitButton('Отправить', ['class' => 'button-chat'])?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>