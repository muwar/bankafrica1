<?php
/* @var $this EvutiController */
/* @var $data Evuti */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cdos')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cdos), array('view', 'id'=>$data->cdos)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uti')); ?>:</b>
	<?php echo CHtml::encode($data->uti); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom')); ?>:</b>
	<?php echo CHtml::encode($data->nom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sur')); ?>:</b>
	<?php echo CHtml::encode($data->sur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pswd')); ?>:</b>
	<?php echo CHtml::encode($data->pswd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pro')); ?>:</b>
	<?php echo CHtml::encode($data->pro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rmk')); ?>:</b>
	<?php echo CHtml::encode($data->rmk); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('utic')); ?>:</b>
	<?php echo CHtml::encode($data->utic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('utimo')); ?>:</b>
	<?php echo CHtml::encode($data->utimo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dou')); ?>:</b>
	<?php echo CHtml::encode($data->dou); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dmo')); ?>:</b>
	<?php echo CHtml::encode($data->dmo); ?>
	<br />

	*/ ?>

</div>