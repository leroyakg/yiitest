<?php
/* @var $this SaleController */
/* @var $data Sale */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('seqNo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->seqNo), array('view', 'id'=>$data->seqNo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_sale')); ?>:</b>
	<?php echo CHtml::encode($data->date_sale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userSeqNo')); ?>:</b>
	<?php echo CHtml::encode($data->userSeqNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clientSeqNo')); ?>:</b>
	<?php echo CHtml::encode($data->clientSeqNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod')); ?>:</b>
	<?php echo CHtml::encode($data->prod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payout')); ?>:</b>
	<?php echo CHtml::encode($data->payout); ?>
	<br />


</div>