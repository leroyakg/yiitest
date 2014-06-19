<?php
/* @var $this SaleController */
/* @var $model Sale */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sale-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date_sale'); ?>
		<?php echo $form->textField($model,'date_sale'); ?>
		<?php echo $form->error($model,'date_sale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userSeqNo'); ?>
		<?php echo $form->textField($model,'userSeqNo'); ?>
		<?php echo $form->error($model,'userSeqNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clientSeqNo'); ?>
		<?php echo $form->textField($model,'clientSeqNo'); ?>
		<?php echo $form->error($model,'clientSeqNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prod'); ?>
		<?php echo $form->textField($model,'prod'); ?>
		<?php echo $form->error($model,'prod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payout'); ?>
		<?php echo $form->textField($model,'payout'); ?>
		<?php echo $form->error($model,'payout'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->