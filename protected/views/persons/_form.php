<?php
/* @var $this PersonsController */
/* @var $model Persons */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'persons-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_surname'); ?>
		<?php echo $form->textField($model,'person_surname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'person_surname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_middlename'); ?>
		<?php echo $form->textField($model,'person_middlename',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'person_middlename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'persons_othername'); ?>
		<?php echo $form->textField($model,'persons_othername',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'persons_othername'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_dob'); ?>
		<?php echo $form->textField($model,'person_dob'); ?>
		<?php echo $form->error($model,'person_dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_pob'); ?>
		<?php echo $form->textField($model,'person_pob',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'person_pob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_mname'); ?>
		<?php echo $form->textField($model,'person_mname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'person_mname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_fname'); ?>
		<?php echo $form->textField($model,'person_fname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'person_fname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_gender'); ?>
		<?php echo $form->textField($model,'person_gender',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'person_gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_tel1'); ?>
		<?php echo $form->textField($model,'person_tel1',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'person_tel1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_tel2'); ?>
		<?php echo $form->textField($model,'person_tel2',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'person_tel2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_email'); ?>
		<?php echo $form->textField($model,'person_email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'person_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_rcountry'); ?>
		<?php echo $form->textField($model,'person_rcountry'); ?>
		<?php echo $form->error($model,'person_rcountry'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_profession'); ?>
		<?php echo $form->textField($model,'person_profession'); ?>
		<?php echo $form->error($model,'person_profession'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_dc'); ?>
		<?php echo $form->textField($model,'person_dc'); ?>
		<?php echo $form->error($model,'person_dc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_dlm'); ?>
		<?php echo $form->textField($model,'person_dlm'); ?>
		<?php echo $form->error($model,'person_dlm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profession_id'); ?>
		<?php echo $form->textField($model,'profession_id'); ?>
		<?php echo $form->error($model,'profession_id'); ?>
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