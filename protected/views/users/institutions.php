<?php
/* @var $this InstitutionsController */
/* @var $model Institutions */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'institutions-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php // // echo $form->labelEx($model,'institution_name'); ?>
        <?php echo $form->textField($model, 'institution_name', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Name of institution')); ?>
<?php echo $form->error($model, 'institution_name'); ?>
    </div>

    <div class="form-group">
        <?php // // echo $form->labelEx($model,'institution_officialname'); ?>
        <?php echo $form->textField($model, 'institution_officialname', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Official Name')); ?>
<?php echo $form->error($model, 'institution_officialname'); ?>
    </div>

    <div class="form-group">
        <?php // echo $form->labelEx($model,'tpcn'); ?>
        <?php echo $form->textField($model, 'tpcn', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Tax payers card number')); ?>
<?php echo $form->error($model, 'tpcn'); ?>
    </div>
    <div class="form-group">
        <?php // echo $form->labelEx($model,'institution_sector'); ?>
        <?php echo $form->dropDownList($model, 'institution_sector', array('Banking' => 'Banking', 'Educational' => 'Educational', 'Manufacturing' => 'Manufacturing', 'Medical' => 'Medical', 'Social welfare' => 'social welfare', 'Religious' => 'Religious', 'Political' => 'Political'), array('empty' => 'Sector Of Operation Of Institution'), array('size' => 45, 'maxlength' => 45)); ?>
<?php echo $form->error($model, 'institution_sector'); ?>
    </div>

    <div class="form-group">
        <?php // echo $form->labelEx($model,'institution_tel1'); ?>
        <?php echo $form->textField($model, 'institution_tel1', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'First Telephone')); ?>
<?php echo $form->error($model, 'institution_tel1'); ?>
    </div>

    <div class="form-group">
        <?php // echo $form->labelEx($model,'institution_tel2'); ?>
        <?php echo $form->textField($model, 'institution_tel2', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Second Telephone')); ?>
<?php echo $form->error($model, 'institution_tel2'); ?>
    </div>

    <div class="form-group">
        <?php // echo $form->labelEx($model,'institution_email'); ?>
        <?php echo $form->textField($model, 'institution_email', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Email')); ?>
<?php echo $form->error($model, 'institution_email'); ?>
    </div>

    <div class="form-group">
        <?php // echo $form->labelEx($model,'institution_website'); ?>
        <?php echo $form->textField($model, 'institution_website', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Link to company website')); ?>
<?php echo $form->error($model, 'institution_website'); ?>
    </div>

    <div class="form-group">
        <?php // echo $form->labelEx($model,'institution_cr'); ?>
        <?php // echo $form->textField($model,'institution_cr',array('size'=>45,'maxlength'=>45, 'class' => 'form-control', 'placeholder' => 'Residence of company head office')); ?>
        <?php echo $form->dropDownList($model, 'institution_cr', CHtml::listData(Countries::model()->findAll(), 'id_countries', 'name'), array('empty' => 'Residence of company head office')); ?>
<?php echo $form->error($model, 'institution_cr'); ?>
    </div>

    <div class="form-group">
        <?php // echo $form->labelEx($model,'institution_tr'); ?>
        <?php echo $form->textField($model, 'institution_tr', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control', 'placeholder' => 'Town of Residence of head office')); ?>
<?php echo $form->error($model, 'institution_tr'); ?>
    </div>

    <div class="form-group">
        <?php // echo $form->labelEx($model,'institution_dc'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'attribute' => 'institution_dc',
            'model' => $model,
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
                'changeMonth' => true,
                'changeYear' => true,
                'yearRange' => '1900:'
            ),
            'htmlOptions' => array(
                'style' => 'height:35px;',
                'placeholder' => 'Date of Business Creation',
                'class' => 'form-control',
            ),
        ));
        ?>
        <?php // echo $form->textField($model,'institution_dc',array('size'=>45,'maxlength'=>45, 'class' => 'form-control', 'placeholder' => 'Date of creation')); ?>
        <?php echo $form->error($model, 'institution_dc'); ?>
    </div>

    <div class="form-group">
        <?php // echo $form->labelEx($model,'institution_dlm'); ?>
        <?php // echo $form->textField($model,'institution_dlm',array('size'=>45,'maxlength'=>45)); ?>
        <?php echo $form->error($model, 'institution_dlm'); ?>
    </div>

    <div class="form-group">
        <?php // // echo $form->labelEx($model,'user_id'); ?>
        <?php echo $form->hiddenField($model, 'user_id', array('value' => $id)); ?>
        <?php echo $form->error($model, 'user_id'); ?>
    </div>

    <div class="form-group">
        <?php // echo $form->labelEx($model,'logo_pic_data'); ?>
        <?php // echo $form->fileField($model,'logo_pic_data',array('class'=>'form-control','placeholder'=>'Upload company logo')); ?>
        <?php echo $form->error($model, 'logo_pic_data'); ?>
        <table width="30%" border="0" cellspacing="0" cellpadding="0">

            <tr>
                <td><?php
                    if ($model->logo_pic_data == NULL)
                        echo $form->labelEx($model, 'logo_pic_data');
                    else
                        echo $form->labelEx($model, 'logo_pic_data');
                    ?>
                </td>
                <td><?php
                    if ($model->logo_pic_data == NULL) {
                        echo $form->fileField($model, 'logo_pic_data');
                        ?>
                        <?php
                        echo $form->error($model, 'logo_pic_dataa');
                    } else {
                        echo $form->fileField($model, 'logo_pic_data');
                        ?>
                        <?php
                        echo $form->error($model, 'logo_pic_data');
                        echo '<img class="imgbrder" src="' . $this->createUrl('/site/DisplaySavedImage&id=' . $model->primaryKey) . '" alt="' . $model->logo_filename . '" width="100" height="100" />';
                    }
                    ?></td>

            </tr>
        </table>

    </div>

    <!--
            <div class="form-group">
<?php // echo $form->labelEx($model,'gdp_ly');  ?>
<?php echo $form->textField($model, 'gdp_ly', array('class' => 'form-control', 'placeholder' => 'Last')); ?>
<?php echo $form->error($model, 'gdp_ly'); ?>
            </div>
    -->
    <div class="form-group buttons">
        <p align="center"><?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => 'btn btn-md-default')); ?></p>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->