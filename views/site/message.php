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

    <div class="message-form">
        <?php $form = ActiveForm::begin(); ?>
        <div>
            <?= $form->field($model, 'text')->textarea(['rows' => 1]) ?>
        </div>
        <div>
            <?= Html::submitButton('Отправить', ['class' => 'reg-but-regsite'])?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
