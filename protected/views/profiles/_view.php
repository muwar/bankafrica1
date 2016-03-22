<?php
/* @var $this ProfilesController */
/* @var $data Profiles */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->profile_id), array('view', 'id'=>$data->profile_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_name')); ?>:</b>
	<?php echo CHtml::encode($data->profile_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cdate')); ?>:</b>
	<?php echo CHtml::encode($data->cdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lmdate')); ?>:</b>
	<?php echo CHtml::encode($data->lmdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('muser')); ?>:</b>
	<?php echo CHtml::encode($data->muser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />


</div>