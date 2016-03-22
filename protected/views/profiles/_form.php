<?php
/* @var $this ProfilesController */
/* @var $model Profiles */
/* @var $form CActiveForm */
?>
<div class="form-group">

    <div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'profiles-form',
            'enableAjaxValidation' => false,
            'action' => Yii::app()->request->baseUrl . '/index.php?r=profiles/create',
        ));
        ?>
        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>
        <!--
                <div class="form-group">
        <?php echo $form->labelEx($model, 'profile_id'); ?>
        <?php echo $form->textField($model, 'profile_id', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'profile_id'); ?>
                </div>
        -->
        <div class="form-group">
            <?php // echo $form->labelEx($model,'profile_name'); ?>
            <?php echo $form->textField($model, 'profile_name', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Type Profile Name')); ?>
            <?php echo $form->error($model, 'profile_name'); ?>
        </div>
        <div
                <div class="form-group">
        <?php echo $form->labelEx($model, 'cdate'); ?>
        <?php echo $form->textField($model, 'cdate'); ?>
        <?php echo $form->error($model, 'cdate'); ?>
                </div>
        
                <div class="form-group">
        <?php echo $form->labelEx($model, 'lmdate'); ?>
        <?php echo $form->textField($model, 'lmdate'); ?>
        <?php echo $form->error($model, 'lmdate'); ?>
                </div>
        
                <div class="form-group">
        <?php echo $form->labelEx($model, 'muser'); ?>
        <?php echo $form->textField($model, 'muser'); ?>
        <?php echo $form->error($model, 'muser'); ?>
                </div>
        -->
        <div class="form-group">
            <?php // echo $form->labelEx($model,'remark'); ?>
            <?php echo $form->textField($model, 'remark', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Type Remark')); ?>
            <?php echo $form->error($model, 'remark'); ?>
        </div>

        <div class="form-group buttons">
            <p align="center"><?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => 'btn btn-default btn-lg active">')); ?></p>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>
