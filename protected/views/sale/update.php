<?php
/* @var $this SaleController */
/* @var $model Sale */

$this->breadcrumbs=array(
	'Sales'=>array('index'),
	$model->seqNo=>array('view','id'=>$model->seqNo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sale', 'url'=>array('index')),
	array('label'=>'Create Sale', 'url'=>array('create')),
	array('label'=>'View Sale', 'url'=>array('view', 'id'=>$model->seqNo)),
	array('label'=>'Manage Sale', 'url'=>array('admin')),
);
?>

<h1>Update Sale <?php echo $model->seqNo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>