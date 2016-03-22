<?php
/* @var $this InstitutionsController */
/* @var $data Institutions */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->institution_id), array('view', 'id'=>$data->institution_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_name')); ?>:</b>
	<?php echo CHtml::encode($data->institution_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_officialname')); ?>:</b>
	<?php echo CHtml::encode($data->institution_officialname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_sector')); ?>:</b>
	<?php echo CHtml::encode($data->institution_sector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_tel1')); ?>:</b>
	<?php echo CHtml::encode($data->institution_tel1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_tel2')); ?>:</b>
	<?php echo CHtml::encode($data->institution_tel2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_email')); ?>:</b>
	<?php echo CHtml::encode($data->institution_email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_website')); ?>:</b>
	<?php echo CHtml::encode($data->institution_website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_cr')); ?>:</b>
	<?php echo CHtml::encode($data->institution_cr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_tr')); ?>:</b>
	<?php echo CHtml::encode($data->institution_tr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_dc')); ?>:</b>
	<?php echo CHtml::encode($data->institution_dc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution_dlm')); ?>:</b>
	<?php echo CHtml::encode($data->institution_dlm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo_pic_data')); ?>:</b>
	<?php echo CHtml::encode($data->logo_pic_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo_filename')); ?>:</b>
	<?php echo CHtml::encode($data->logo_filename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo_filesize')); ?>:</b>
	<?php echo CHtml::encode($data->logo_filesize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo_filetype')); ?>:</b>
	<?php echo CHtml::encode($data->logo_filetype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gdp_ly')); ?>:</b>
	<?php echo CHtml::encode($data->gdp_ly); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bizdate_creation')); ?>:</b>
	<?php echo CHtml::encode($data->bizdate_creation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tpcn')); ?>:</b>
	<?php echo CHtml::encode($data->tpcn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countries_id')); ?>:</b>
	<?php echo CHtml::encode($data->countries_id); ?>
	<br />

	*/ ?>

</div>