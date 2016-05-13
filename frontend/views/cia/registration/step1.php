<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use beastbytes\wizard\WizardMenu;

$this->title = 'Data Collection';

echo '<br />';
echo WizardMenu::widget(['options'=>['class' => 'btn-group btn-group-justified'], 'step' => $event->step, 'wizard' => $event->sender]);
?>

<div class="cve-details-index">

<h1><?= Html::encode($this->title) ?></h1>

</div>
<?php
$form = ActiveForm::begin();
echo $form->field($model, 'product_name');
echo $form->field($model, 'url_1');
echo $form->field($model, 'url_2');
echo $form->field($model, 'url_3');
echo $form->field($model, 'url_4');
echo $form->field($model, 'url_5');
echo $form->field($model, 'url_6');
echo $form->field($model, 'url_7');
echo $form->field($model, 'url_8');
echo $form->field($model, 'url_9');
echo $form->field($model, 'url_10');

echo Html::beginTag('div', ['class' => 'form-row buttons btn-group']);
echo Html::submitButton('Next', ['class' => 'btn btn-lg btn-primary', 'name' => 'next', 'value' => 'next']);
echo Html::endTag('div');
ActiveForm::end();
