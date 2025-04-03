<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<div class="sidebar">
    <img class="logo" src="<?= Yii::getAlias('images/logo.png') ?>" alt="Logo">
    <?php
    NavBar::begin([
     //   'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'logo']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'buttons'],
        'items' => [
                    ['label' => 'Главная', 'linkOptions' => ['class' => 'button-non-active'], 'url' => ['/site/home'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Главная', 'linkOptions' => ['class' => 'button-non-active'], 'url' => ['/site/index'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Реестр Пациентов', 'linkOptions' => ['class' => 'button-non-active'], 'url' => ['/site/reester'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Чат', 'linkOptions' => ['class' => 'button-non-active'], 'url' => ['/site/message'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Регистрация', 'linkOptions' => ['class' => 'button-non-active'], 'url' => ['/site/register'], 'visible' => Yii::$app->user->isGuest],
            Yii::$app->user->isGuest
                ? ['label' => 'Вход', 'linkOptions' => ['class' => 'button-non-active'], 'url' => ['/site/login']]
                : Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Выход (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'button-non-active']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
    <div class="profile-section">
        <?php if (!Yii::$app->user->isGuest):?>
            <img class="avatar" src="<?= Yii::getAlias('images/avatar.png') ?>" alt="Avatar">
        <?php endif; ?>
        <div style="display: flex; flex-direction: row; margin-left: 6%">
            <?php if (Yii::$app->user->isGuest): ?>
                    <?= Html::a('Вход', ['site/login'], [
                        'class' => 'butLog-profile',
                        'style' => 'margin-right: auto; width: 120px; height: 30px; line-height: 30px;'
                    ]) ?>
            <?php else: ?>
                <?= Yii::$app->user->identity->username ?>
                <?= Html::a('Выход',
                    ['site/logout'],
                    [
                        'class' => 'butLog-profile',
                        'style' => 'min-width: 140px; height: 30px; line-height: 30px; padding: 0 15px;',
                        'data' => ['method' => 'post']
                    ]) ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="content">
    <?php if (!empty($this->params['breadcrumbs'])): ?>
        <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
    <?php endif ?>
    <?= Alert::widget() ?>
    <?= $content ?>
</div>

<footer id="footer" class="mt-auto py-3 bg-light">
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
