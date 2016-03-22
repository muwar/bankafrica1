<form role="form"> 
    <div class="form-group">
        <?php
        /* @var $this UsersController */
        /* @var $model Users */
        /* @var $form CActiveForm */
        ?>

        <div class="form">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'users-form',
                'enableAjaxValidation' => false,
            ));
            ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

                <?php echo $form->errorSummary($model); ?>

            <div class="row">
                <?php echo $form->labelEx($model, 'username'); ?>
<?php echo $form->textField($model, 'username', array('size' => 45, 'maxlength' => 45)); ?>
<?php echo $form->error($model, 'username'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'password'); ?>
<?php echo $form->passwordField($model, 'password', array('size' => 45, 'maxlength' => 45)); ?>
<?php echo $form->error($model, 'password'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'profile_id'); ?>
<?php echo $form->textField($model, 'profile_id'); ?>
<?php echo $form->error($model, 'profile_id'); ?>
            </div>

            <div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
            </div>

<?php $this->endWidget(); ?>

        </div><!-- form -->    

    </div>
</form>