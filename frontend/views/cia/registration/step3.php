<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use beastbytes\wizard\WizardMenu;

$session = Yii::$app->session;
$stats = $session->get('stats');

$this->title = 'Data Prosessing';
echo WizardMenu::widget(['options'=>['class' => 'btn-group btn-group-justified'], 'step' => $event->step, 'wizard' => $event->sender]);
?>
<br />

<div class="cve-details-index">

<h1><?= Html::encode($this->title) ?></h1>

<div class="progress" style="height: 30px;">
  <div id="cia-progress-bar" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; height: 30px;">
    <span class="sr-only">40% Complete (success)</span>
  </div>
</div>
</div>

<div id="div-ajax-total-cve" class="alert alert-info hide" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Number of Processed CVE Entries:&nbsp;<strong id="ajax-total-cve"></strong></div>
<div id="div-ajax-matched-cve" class="alert alert-success hide" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Number of CVE Entries With Files:&nbsp;<strong id="ajax-matched-cve"></strong></div>
<div id="div-ajax-matched-files" class="alert alert-success hide" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Number of Matched Files:&nbsp;<strong id="ajax-matched-files"></strong></div>
<div id="div-ajax-invalid-cve" class="alert alert-danger hide" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Number of CVE Entries Without Files:&nbsp;<strong id="ajax-invalid-cve"></strong></div>


<?php
$form = ActiveForm::begin();
$model->token = 'ajshd68179puohlkwbadfd';
echo $form->field($model, 'token',['options' => ['class' => ''],'template' => '{input}'])->input('hidden');
echo Html::beginTag('div', ['class' => 'form-row buttons btn-group']);
echo Html::submitButton('Next', ['id' => 'btn-next-id', 'class' => 'btn btn-lg btn-primary disabled', 'name' => 'next', 'value' => 'next']);
//echo Html::submitButton('Cancel', ['class' => 'btn btn-lg btn-danger', 'name' => 'cancel', 'value' => 'pause']);
echo Html::endTag('div');
ActiveForm::end();

$this->registerJs("jQuery(document).ready(function () {
	$.ajax({
	    url: '". \Yii::$app->getUrlManager()->createUrl('cia/process-data') ."',
	    type: 'POST',
	     data: { process: 1 },
	     success: function(data) {
	     	var result = $.parseJSON(data);
	     	if (result.data.total_cve > 0) {
	     		$('#div-ajax-total-cve').removeClass('hide');
	     		$('#ajax-total-cve').text(result.data.total_cve)
	     	}
	     	if (result.data.matched_cve > 0) {
	     		$('#div-ajax-matched-cve').removeClass('hide');
	     		$('#ajax-matched-cve').text(result.data.matched_cve)
	     	}
	     	if (result.data.matched_files > 0) {
	     		$('#div-ajax-matched-files').removeClass('hide');
	     		$('#ajax-matched-files').text(result.data.matched_files)
	     	}
	     	if (result.data.invalid_cve > 0) {
	     		$('#div-ajax-invalid-cve').removeClass('hide');
	     		$('#ajax-invalid-cve').text(result.data.invalid_cve)
	     	}
	     	$('#btn-next-id').removeClass('disabled');
	     	//$('#cia-progress-bar').removeClass('active').removeClass('progress-bar-striped');
	     }
	})
})", \Yii\Web\View::POS_END);?>


