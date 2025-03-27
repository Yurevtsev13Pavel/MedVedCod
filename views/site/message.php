<h1>Чат</h1>
<div class="messages">
    <?php
    use yii\helpers\Html;
    use yii\bootstrap5\ActiveForm;

    foreach ($messages as $message): ?>
            <div class="message-container">
                <p> <?= Yii::$app->user->identity->username ?? 'Аноним' ?></p>
                <p> <?= $message->text ?></p>
                <p> <?= date('d.m.Y H:i', strtotime($message->created_at)) ?></p>
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