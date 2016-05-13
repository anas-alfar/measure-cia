<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ResearchFileCodeMetricsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="research-file-code-metrics-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'filename') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'loc') ?>

    <?= $form->field($model, 'logicalLoc') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'vocabulary') ?>

    <?php // echo $form->field($model, 'effort') ?>

    <?php // echo $form->field($model, 'difficulty') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'bugs') ?>

    <?php // echo $form->field($model, 'intelligentContent') ?>

    <?php // echo $form->field($model, 'maintainabilityIndexWithoutComment') ?>

    <?php // echo $form->field($model, 'maintainabilityIndex') ?>

    <?php // echo $form->field($model, 'commentWeight') ?>

    <?php // echo $form->field($model, 'instability') ?>

    <?php // echo $form->field($model, 'afferentCoupling') ?>

    <?php // echo $form->field($model, 'efferentCoupling') ?>

    <?php // echo $form->field($model, 'noc') ?>

    <?php // echo $form->field($model, 'noca') ?>

    <?php // echo $form->field($model, 'nocc') ?>

    <?php // echo $form->field($model, 'noi') ?>

    <?php // echo $form->field($model, 'nom') ?>

    <?php // echo $form->field($model, 'cyclomaticComplexity') ?>

    <?php // echo $form->field($model, 'myerInterval') ?>

    <?php // echo $form->field($model, 'myerDistance') ?>

    <?php // echo $form->field($model, 'operators') ?>

    <?php // echo $form->field($model, 'lcom') ?>

    <?php // echo $form->field($model, 'sysc') ?>

    <?php // echo $form->field($model, 'rsysc') ?>

    <?php // echo $form->field($model, 'dc') ?>

    <?php // echo $form->field($model, 'rdc') ?>

    <?php // echo $form->field($model, 'sc') ?>

    <?php // echo $form->field($model, 'rsc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
