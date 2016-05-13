<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use beastbytes\wizard\WizardMenu;

use yii\grid\GridView;
use yii\widgets\Pjax;

$session = Yii::$app->session;
$stats = $session->get('stats');

if (!empty($stats['modelIds'])) { 
    $searchModel = new \frontend\models\CveDetailsSearch();
    $query = \frontend\models\CveDetailsSearch::find()->where(['id' => $stats['modelIds'] ]);
    $dataProvider = new yii\data\ActiveDataProvider([
        'query' => $query,
    ]);
}

$this->title = 'Data Validation';
echo WizardMenu::widget(['options'=>['class' => 'btn-group btn-group-justified'], 'step' => $event->step, 'wizard' => $event->sender]);
?>
<br />

<div class="cve-details-index">

<h1><?= Html::encode($this->title) ?></h1>

<?php if(!empty($stats['total_rows'])) { ?>
<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Total number of records:&nbsp;<strong><?php echo $stats['total_rows']; ?></strong></div>
<?php } ?>
<?php if(!empty($stats['imported_rows'])) { ?>
<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Imported records:&nbsp;<strong><?php echo $stats['imported_rows']; ?></strong></div>
<?php } ?>
<?php if(!empty($stats['invalid_rows'])) { ?>
<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Invalid records:&nbsp;<strong><?php echo $stats['invalid_rows']; ?></strong></div>
<?php } ?>

<?php 
if (!empty($stats['modelIds'])) { 
Pjax::begin(); 
?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product',
            'cve',
            'vulnerability',
            'conf',
            'integrity',
            'availability',
            //'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php 
    Pjax::end(); 
}
?>

</div>

<?php
$form = ActiveForm::begin();
$model->token = 'ajshd68179puohlkwbadfd';
echo $form->field($model, 'token',['options' => ['class' => ''],'template' => '{input}'])->input('hidden');
echo Html::beginTag('div', ['class' => 'form-row buttons btn-group']);
echo Html::submitButton('Next', ['class' => 'btn btn-lg btn-primary', 'name' => 'next', 'value' => 'next']);
//echo Html::submitButton('Cancel', ['class' => 'btn btn-lg btn-danger', 'name' => 'cancel', 'value' => 'pause']);
echo Html::endTag('div');
ActiveForm::end();
