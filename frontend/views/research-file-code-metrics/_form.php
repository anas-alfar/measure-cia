<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ResearchFileCodeMetrics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="research-file-code-metrics-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loc')->textInput() ?>

    <?= $form->field($model, 'logicalLoc')->textInput() ?>

    <?= $form->field($model, 'volume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'vocabulary')->textInput() ?>

    <?= $form->field($model, 'effort')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'difficulty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'bugs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intelligentContent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maintainabilityIndexWithoutComment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maintainabilityIndex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'commentWeight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instability')->textInput() ?>

    <?= $form->field($model, 'afferentCoupling')->textInput() ?>

    <?= $form->field($model, 'efferentCoupling')->textInput() ?>

    <?= $form->field($model, 'noc')->textInput() ?>

    <?= $form->field($model, 'noca')->textInput() ?>

    <?= $form->field($model, 'nocc')->textInput() ?>

    <?= $form->field($model, 'noi')->textInput() ?>

    <?= $form->field($model, 'nom')->textInput() ?>

    <?= $form->field($model, 'cyclomaticComplexity')->textInput() ?>

    <?= $form->field($model, 'myerInterval')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'myerDistance')->textInput() ?>

    <?= $form->field($model, 'operators')->textInput() ?>

    <?= $form->field($model, 'lcom')->textInput() ?>

    <?= $form->field($model, 'sysc')->textInput() ?>

    <?= $form->field($model, 'rsysc')->textInput() ?>

    <?= $form->field($model, 'dc')->textInput() ?>

    <?= $form->field($model, 'rdc')->textInput() ?>

    <?= $form->field($model, 'sc')->textInput() ?>

    <?= $form->field($model, 'rsc')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
