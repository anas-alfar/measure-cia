<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ResearchFileCodeMetricsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Research File Code Metrics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-file-code-metrics-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Research File Code Metrics', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'filename',
            [
                'attribute' => 'filename',
                'value' => function($model) {
                    return substr($model->filename, 47);
                }
            ],
            //'name',
            'loc',
            'logicalLoc',
            'volume',
            'length',
            // 'vocabulary',
            'effort',
            // 'difficulty',
            // 'time:datetime',
            // 'bugs',
            // 'intelligentContent',
            // 'maintainabilityIndexWithoutComment',
            // 'maintainabilityIndex',
            // 'commentWeight',
            // 'instability',
            'afferentCoupling',
            'efferentCoupling',
            // 'noc',
            // 'noca',
            // 'nocc',
            // 'noi',
            // 'nom',
            // 'cyclomaticComplexity',
            // 'myerInterval',
            // 'myerDistance',
            // 'operators',
            // 'lcom',
            // 'sysc',
            // 'rsysc',
            // 'dc',
            // 'rdc',
            // 'sc',
            // 'rsc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
