<?php
/* @var $this PersonsController */
/* @var $data Persons */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->person_id), array('view', 'id'=>$data->person_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_surname')); ?>:</b>
	<?php echo CHtml::encode($data->person_surname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_middlename')); ?>:</b>
	<?php echo CHtml::encode($data->person_middlename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('persons_othername')); ?>:</b>
	<?php echo CHtml::encode($data->persons_othername); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_dob')); ?>:</b>
	<?php echo CHtml::encode($data->person_dob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_pob')); ?>:</b>
	<?php echo CHtml::encode($data->person_pob); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('person_mname')); ?>:</b>
	<?php echo CHtml::encode($data->person_mname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_fname')); ?>:</b>
	<?php echo CHtml::encode($data->person_fname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_gender')); ?>:</b>
	<?php echo CHtml::encode($data->person_gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_tel1')); ?>:</b>
	<?php echo CHtml::encode($data->person_tel1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_tel2')); ?>:</b>
	<?php echo CHtml::encode($data->person_tel2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_email')); ?>:</b>
	<?php echo CHtml::encode($data->person_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_rcountry')); ?>:</b>
	<?php echo CHtml::encode($data->person_rcountry); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_profession')); ?>:</b>
	<?php echo CHtml::encode($data->person_profession); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_dc')); ?>:</b>
	<?php echo CHtml::encode($data->person_dc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('person_dlm')); ?>:</b>
	<?php echo CHtml::encode($data->person_dlm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profession_id')); ?>:</b>
	<?php echo CHtml::encode($data->profession_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countries_id')); ?>:</b>
	<?php echo CHtml::encode($data->countries_id); ?>
	<br />

	*/ ?>

</div>