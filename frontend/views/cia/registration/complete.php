<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Registration Wizard Complete';

$session = Yii::$app->session;
$stats = $session->get('stats');
$data = $session->get('data');

echo Html::beginTag('div', ['class' => 'cve-details-index']);
echo Html::beginTag('div', ['class' => 'section']);
echo Html::tag('h2', 'Product Details');
?>
<div class="panel panel-default">
  <div class="panel-body">
    <?php echo $stats['product']; ?>
  </div>
</div>
<?php
echo Html::endTag('div');

echo Html::beginTag('div', ['class' => 'section']);
echo Html::tag('h2', 'CVE Entries Reprot');
?>
<ul class="list-group">
	<li class="list-group-item"><span class="badge"><?php echo $stats['total_rows']; ?></span>Total number of records</li>
	<li class="list-group-item"><span class="badge"><?php echo $stats['imported_rows']; ?></span>Imported records</li>
	<li class="list-group-item"><span class="badge"><?php echo $stats['invalid_rows']; ?></span>Invalid records</li>
</ul>
<?php
echo Html::endTag('div');

echo Html::beginTag('div', ['class' => 'section']);
echo Html::tag('h2', 'Vulnerable Files Report');
?>
<ul class="list-group">
	<li class="list-group-item"><span class="badge"><?php echo $data['total_cve']; ?></span>Number of Processed CVE Entries</li>
	<li class="list-group-item"><span class="badge"><?php echo $data['matched_cve']; ?></span>Number of CVE Entries With Files</li>
	<li class="list-group-item"><span class="badge"><?php echo $data['matched_files']; ?></span>Number of Matched Files</li>
	<li class="list-group-item"><span class="badge"><?php echo $data['invalid_cve']; ?></span>Number of CVE Entries Without Files</li>
</ul>
<?php
echo Html::endTag('div');
echo Html::endTag('div');
?>
<ul class="nav nav-pills nav-stacked">
  <li role="presentation" class="active"><a href="measure-cia/frontend/web/index.php?r=cia/registration">Import More CVEs</a></li>
</ul>
