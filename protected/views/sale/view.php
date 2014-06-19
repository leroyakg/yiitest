<?php
/* @var $this SaleController */
/* @var $model Sale */

$this->breadcrumbs=array(
	'Sales'=>array('index'),
	$model->seqNo,
);

$this->menu=array(
	array('label'=>'List Sale', 'url'=>array('index')),
	array('label'=>'Create Sale', 'url'=>array('create')),
	array('label'=>'Update Sale', 'url'=>array('update', 'id'=>$model->seqNo)),
	array('label'=>'Delete Sale', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->seqNo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sale', 'url'=>array('admin')),
);
?>

<h1>View Sale #<?php echo $model->seqNo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'seqNo',
		'date_sale',
		'userSeqNo',
		'clientSeqNo',
		'prod',
		'payout',
	),
)); ?>
