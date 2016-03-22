<?php
/* @var $this InstitutionsController */
/* @var $model Institutions */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'institutions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'institution_name'); ?>
		<?php echo $form->textField($model,'institution_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'institution_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution_officialname'); ?>
		<?php echo $form->textField($model,'institution_officialname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'institution_officialname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution_sector'); ?>
		<?php echo $form->textField($model,'institution_sector',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'institution_sector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution_tel1'); ?>
		<?php echo $form->textField($model,'institution_tel1',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'institution_tel1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution_tel2'); ?>
		<?php echo $form->textField($model,'institution_tel2',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'institution_tel2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution_email'); ?>
		<?php echo $form->textField($model,'institution_email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'institution_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution_website'); ?>
		<?php echo $form->textField($model,'institution_website',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'institution_website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution_cr'); ?>
		<?php echo $form->textField($model,'institution_cr',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'institution_cr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution_tr'); ?>
		<?php echo $form->textField($model,'institution_tr',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'institution_tr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution_dc'); ?>
		<?php echo $form->textField($model,'institution_dc',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'institution_dc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution_dlm'); ?>
		<?php echo $form->textField($model,'institution_dlm',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'institution_dlm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo_pic_data'); ?>
		<?php echo $form->textField($model,'logo_pic_data'); ?>
		<?php echo $form->error($model,'logo_pic_data'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo_filename'); ?>
		<?php echo $form->textField($model,'logo_filename',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'logo_filename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo_filesize'); ?>
		<?php echo $form->textField($model,'logo_filesize'); ?>
		<?php echo $form->error($model,'logo_filesize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo_filetype'); ?>
		<?php echo $form->textField($model,'logo_filetype',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'logo_filetype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gdp_ly'); ?>
		<?php echo $form->textField($model,'gdp_ly'); ?>
		<?php echo $form->error($model,'gdp_ly'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bizdate_creation'); ?>
		<?php echo $form->textField($model,'bizdate_creation'); ?>
		<?php echo $form->error($model,'bizdate_creation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tpcn'); ?>
		<?php echo $form->textField($model,'tpcn',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tpcn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'countries_id'); ?>
		<?php echo $form->textField($model,'countries_id'); ?>
		<?php echo $form->error($model,'countries_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->