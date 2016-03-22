<?php
/* @var $this BqadcusController */
/* @var $data Bqadcus */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cdos')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cdos), array('view', 'id'=>$data->cdos)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cus')); ?>:</b>
	<?php echo CHtml::encode($data->cus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typ')); ?>:</b>
	<?php echo CHtml::encode($data->typ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('val')); ?>:</b>
	<?php echo CHtml::encode($data->val); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uti')); ?>:</b>
	<?php echo CHtml::encode($data->uti); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('utimo')); ?>:</b>
	<?php echo CHtml::encode($data->utimo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dou')); ?>:</b>
	<?php echo CHtml::encode($data->dou); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('dmo')); ?>:</b>
	<?php echo CHtml::encode($data->dmo); ?>
	<br />

	*/ ?>

</div>