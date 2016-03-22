<?php
/* @var $this InstitutionsController */
/* @var $model Institutions */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'institution_id'); ?>
		<?php echo $form->textField($model,'institution_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institution_name'); ?>
		<?php echo $form->textField($model,'institution_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institution_officialname'); ?>
		<?php echo $form->textField($model,'institution_officialname',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institution_sector'); ?>
		<?php echo $form->textField($model,'institution_sector',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institution_tel1'); ?>
		<?php echo $form->textField($model,'institution_tel1',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institution_tel2'); ?>
		<?php echo $form->textField($model,'institution_tel2',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institution_email'); ?>
		<?php echo $form->textField($model,'institution_email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institution_website'); ?>
		<?php echo $form->textField($model,'institution_website',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institution_cr'); ?>
		<?php echo $form->textField($model,'institution_cr',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institution_tr'); ?>
		<?php echo $form->textField($model,'institution_tr',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institution_dc'); ?>
		<?php echo $form->textField($model,'institution_dc',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institution_dlm'); ?>
		<?php echo $form->textField($model,'institution_dlm',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logo_pic_data'); ?>
		<?php echo $form->textField($model,'logo_pic_data'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logo_filename'); ?>
		<?php echo $form->textField($model,'logo_filename',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logo_filesize'); ?>
		<?php echo $form->textField($model,'logo_filesize'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logo_filetype'); ?>
		<?php echo $form->textField($model,'logo_filetype',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gdp_ly'); ?>
		<?php echo $form->textField($model,'gdp_ly'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bizdate_creation'); ?>
		<?php echo $form->textField($model,'bizdate_creation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tpcn'); ?>
		<?php echo $form->textField($model,'tpcn',array('size'=>45,'maxlength'=>45)); ?>
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