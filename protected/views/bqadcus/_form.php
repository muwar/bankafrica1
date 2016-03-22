<?php
/* @var $this BqadcusController */
/* @var $model Bqadcus */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bqadcus-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cdos'); ?>
		<?php echo $form->textField($model,'cdos',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'cdos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cus'); ?>
		<?php echo $form->textField($model,'cus',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'cus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'typ'); ?>
		<?php echo $form->textField($model,'typ',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'typ'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'val'); ?>
		<?php echo $form->textField($model,'val',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'val'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uti'); ?>
		<?php echo $form->textField($model,'uti',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'uti'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'utimo'); ?>
		<?php echo $form->textField($model,'utimo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'utimo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dou'); ?>
		<?php echo $form->textField($model,'dou'); ?>
		<?php echo $form->error($model,'dou'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dmo'); ?>
		<?php echo $form->textField($model,'dmo'); ?>
		<?php echo $form->error($model,'dmo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->