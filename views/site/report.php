<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Добавить запись';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
        <h1>Добавить запись</h1>
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name')) ?>

                    <?= $form->field($model, 'date_zapis')->textInput() ?>
                    <?= $form->field($model, 'zapis')->textarea(['rows' => 6]) ?>



                    <div class="form-group">
                        <?= Html::submitButton('Добавить запись', ['class' => 'reg-but-regsite', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

</div>
