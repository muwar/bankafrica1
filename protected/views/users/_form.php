<?php
/* @var $this EvutiController */
/* @var $model Evuti */
/* @var $form CActiveForm */
?>

<div class="login-panel panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Sign Up </h3>
    </div>
    <div class="panel-body">
        <fieldset>
            <div class="form">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'evuti-form',
                    'enableAjaxValidation' => false,
                ));
                ?>
                <?php echo $form->errorSummary($model); ?>
                <?php
                if (Yii::app()->user->hasFlash("error"))
                    echo Yii::app()->user->getFlash("error");
                ?>
                <table>
                    <tr>
                        <td>
                            <?php echo $form->labelEx($model, 'pro', array('style' => 'color:gray')); ?> </td>
                        <td>
                            <?php echo $form->dropDownList($model, 'pro', CHtml::listData(Evprof::model()->findAll('lib !=:x',array(':x'=>'Administrator')), 'id', 'lib'), array('class' => 'form-control', 'prompt' => 'Choose account type')); ?>
                            <?php echo $form->error($model, 'pro'); ?><br/></td>
                    </tr>
                                        <tr>
                        <td>
                            <?php echo $form->labelEx($model1, 'resnam', array('style' => 'color:gray')); ?> </td>
                        <td>
                            <?php echo $form->textField($model1, 'resnam', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Your Name')); ?>
                            <?php echo $form->error($model1, 'resnam'); ?><br/></td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $form->labelEx($model, 'nom', array('style' => 'color:gray')); ?> </td>
                        <td>
                            <?php echo $form->textField($model, 'nom', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Login Name')); ?>
                            <?php echo $form->error($model, 'nom'); ?><br/></td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $form->labelEx($model1, 'telephone', array('style' => 'color:gray')); ?></td>
                        <td>
                            <?php echo $form->textField($model1, 'telephone', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Telephone Number','type'=>'tel','id'=>'mobile-number')); ?>
                            <?php echo $form->error($model1, 'telephone'); ?><br/></td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $form->labelEx($model1, 'email', array('style' => 'color:gray')); ?></td>

                        <td>
                            <?php echo $form->textField($model1, 'email', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Email')); ?>
                            <?php echo $form->error($model1, 'email'); ?><br/></td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $form->labelEx($model, 'pswd', array('style' => 'color:gray')); ?></td>

                        <td>  
                            <?php echo $form->passwordField($model, 'pswd', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Password')); ?>
                            <?php echo $form->error($model, 'pswd'); ?><br/></td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $form->labelEx($model, 'confirm_your_password', array('style' => 'color:gray')); ?></td>

                        <td>                                    
                            <?php echo $form->passwordField($model, 'confirm_your_password', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Retype your password')); ?>
                            <?php echo $form->error($model, 'confirm_your_password'); ?>
                            <br/> </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p align="center"><?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => 'btn btn-success')); ?>
                           <input type="reset" value="Reset!" class="btn btn-success"><br></p>
                        
                            <br/>
                          <?php echo CHtml::link('LOGIN', array('site/login'), array('onclick' => '$("#signup").dialog("open"); return false;')); ?>
                            
                                           
                        </td>
                    </tr>
                </table>
                <?php $this->endWidget(); ?>
            </div>
        </fieldset>
    </div>
</div>

