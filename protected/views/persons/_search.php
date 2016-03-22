<?php
/* @var $this PersonsController */
/* @var $model Persons */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'person_id'); ?>
		<?php echo $form->textField($model,'person_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_surname'); ?>
		<?php echo $form->textField($model,'person_surname',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_middlename'); ?>
		<?php echo $form->textField($model,'person_middlename',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'persons_othername'); ?>
		<?php echo $form->textField($model,'persons_othername',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_dob'); ?>
		<?php echo $form->textField($model,'person_dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_pob'); ?>
		<?php echo $form->textField($model,'person_pob',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_mname'); ?>
		<?php echo $form->textField($model,'person_mname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_fname'); ?>
		<?php echo $form->textField($model,'person_fname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_gender'); ?>
		<?php echo $form->textField($model,'person_gender',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_tel1'); ?>
		<?php echo $form->textField($model,'person_tel1',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_tel2'); ?>
		<?php echo $form->textField($model,'person_tel2',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_email'); ?>
		<?php echo $form->textField($model,'person_email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_rcountry'); ?>
		<?php echo $form->textField($model,'person_rcountry'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_profession'); ?>
		<?php echo $form->textField($model,'person_profession'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_dc'); ?>
		<?php echo $form->textField($model,'person_dc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'person_dlm'); ?>
		<?php echo $form->textField($model,'person_dlm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profession_id'); ?>
		<?php echo $form->textField($model,'profession_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countries_id'); ?>
		<?php echo $form->textField($model,'countries_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->