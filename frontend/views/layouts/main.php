<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'CIA Thesis - Measuring CIA For Enterprise Applications Based on Errors Classification',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        ['label' => 'Wizard', 'url' => ['/cia/registration']],
        ['label' => 'Research Management', 'url' => ['#'],
            'items' => [
                ['label' => 'CVE Details', 'url' => ['/research-cve-details']],
                ['label' => 'File Details', 'url' => ['/research-cve-file']],
                ['label' => 'Code Metrics Details', 'url' => ['/research-file-code-metrics']],
            ]
        ],
        ['label' => 'Tool Management', 'url' => ['#'],
            'items' => [
                ['label' => 'CVE Details', 'url' => ['/cve-details']],
                ['label' => 'Files Details', 'url' => ['/cve-file']],
            ]
        ],
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; CIA Thesis - Measuring CIA For Enterprise Applications Based on Errors Classification (<?= date('Y') ?>)</p>
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar navbar-fixed-bottom',
        ],
    ]);
    $menuItems = [
        ['label' => 'Wizard', 'url' => ['/cia/registration']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
