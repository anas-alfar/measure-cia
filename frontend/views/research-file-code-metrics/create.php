<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ResearchFileCodeMetrics */

$this->title = 'Create Research File Code Metrics';
$this->params['breadcrumbs'][] = ['label' => 'Research File Code Metrics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-file-code-metrics-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
