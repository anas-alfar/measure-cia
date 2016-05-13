<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ResearchFileCodeMetrics */

$this->title = 'Update Research File Code Metrics: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Research File Code Metrics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="research-file-code-metrics-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
