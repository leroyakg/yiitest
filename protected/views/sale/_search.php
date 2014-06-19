<?php
/* @var $this SaleController */
/* @var $model Sale */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'seqNo'); ?>
		<?php echo $form->textField($model,'seqNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_sale'); ?>
		<?php echo $form->textField($model,'date_sale'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userSeqNo'); ?>
		<?php echo $form->textField($model,'userSeqNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clientSeqNo'); ?>
		<?php echo $form->textField($model,'clientSeqNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prod'); ?>
		<?php echo $form->textField($model,'prod'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payout'); ?>
		<?php echo $form->textField($model,'payout'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->