<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ResearchFileCodeMetrics */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Research File Code Metrics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-file-code-metrics-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'filename',
            'name',
            'loc',
            'logicalLoc',
            'volume',
            'length',
            'vocabulary',
            'effort',
            'difficulty',
            'time:datetime',
            'bugs',
            'intelligentContent',
            'maintainabilityIndexWithoutComment',
            'maintainabilityIndex',
            'commentWeight',
            'instability',
            'afferentCoupling',
            'efferentCoupling',
            'noc',
            'noca',
            'nocc',
            'noc-anon',
            'noi',
            'nom',
            'cyclomaticComplexity',
            'myerInterval',
            'myerDistance',
            'operators',
            'lcom',
            'sysc',
            'rsysc',
            'dc',
            'rdc',
            'sc',
            'rsc',
        ],
    ]) ?>

</div>
