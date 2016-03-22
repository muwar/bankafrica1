<?php
/* @var $this BqadcusController */
/* @var $model Bqadcus */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cdos'); ?>
		<?php echo $form->textField($model,'cdos',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cus'); ?>
		<?php echo $form->textField($model,'cus',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'typ'); ?>
		<?php echo $form->textField($model,'typ',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'val'); ?>
		<?php echo $form->textField($model,'val',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uti'); ?>
		<?php echo $form->textField($model,'uti',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'utimo'); ?>
		<?php echo $form->textField($model,'utimo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dou'); ?>
		<?php echo $form->textField($model,'dou'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dmo'); ?>
		<?php echo $form->textField($model,'dmo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->