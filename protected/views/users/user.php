<div id="page-wrapper">
    <div class="row">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'Bqcus-form',
            'enableAjaxValidation' => false,
//        'action' => Yii::app()->request->baseUrl . '/index.php?r=persons/create',
        ));
        ?>
        <?php
$pro=Evuti::model()->findByPk($model->cus)->pro;
if(Evprof::model()->findByPk($pro)->lib=='Personal'){
//if ($model->tcus == 'pe') {
            ?>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'sur'); ?>
                <?php echo $form->textField($model, 'sur', array('size' => 50, 'class' => 'form-control', 'placeholder' => 'Surname', 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'sur'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'mid'); ?>
                <?php echo $form->textField($model, 'mid', array('size' => 50, 'class' => 'form-control', 'placeholder' => 'Middle Name', 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'mid'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'otn'); ?>
                <?php echo $form->textField($model, 'otn', array('size' => 50, 'class' => 'form-control', 'placeholder' => 'Other Name', 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'otn'); ?>
            </div>


            <div class="form-group">
                <?php // echo $form->labelEx($model, 'dbir'); ?>
                <?php // echo $form->textField($model, 'dbir'); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'attribute' => 'dbir',
                    'model' => $model,
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'yy-mm-dd',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'yearRange' => '1900:'
                    ),
                    'htmlOptions' => array(
                        'style' => 'height:30px;',
                        'placeholder' => 'Date of Birth',
                        'class' => 'form-control',
                    ),
                ));
                ?>

                <?php echo $form->error($model, 'dbir'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'mna'); ?>
                <?php echo $form->textField($model, 'mna', array('size' => 60, 'class' => 'form-control', 'placeholder' => 'Mother' . "'s" . ' Name', 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'mna'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'fna'); ?>
                <?php echo $form->textField($model, 'fna', array('size' => 60, 'class' => 'form-control', 'placeholder' => 'Father' . "'s" . ' Name', 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'fna'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'sex'); ?>
                <?php echo $form->dropDownList($model, 'sex', array('Fe' => 'Female', 'Ma' => 'Male'), array('empty' => 'Select Gender')); ?>
                <?php echo $form->error($model, 'sex'); ?>
            </div>
            <div class="form-group">
                <?php // // echo $form->labelEx($model, 'tcus'); ?>
                <?php echo $form->hiddenField($model, 'tcus', array('size' => 2, 'class' => 'form-control', 'maxlength' => 2, 'id' => 'typepe')); ?>
                <?php echo $form->error($model, 'tcus'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'sal'); ?>
                <?php echo $form->textField($model, 'sal', array('size' => 5, 'class' => 'form-control', 'maxlength' => 5, 'placeholder' => 'Annual Salary')); ?>
                <?php echo $form->error($model, 'sal'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'tbir'); ?>
                <?php echo $form->textField($model, 'tbir', array('size' => 50, 'class' => 'form-control', 'maxlength' => 50, 'placeholder' => 'Town of Birth')); ?>
                <?php echo $form->error($model, 'tbir'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'pro'); ?>
                <?php echo $form->textField($model, 'pro', array('size' => 50, 'class' => 'form-control', 'maxlength' => 50, 'placeholder' => 'Profession')); ?>
                <?php echo $form->error($model, 'pro'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'id'); ?>
                <?php echo $form->textField($model, 'id', array('size' => 60, 'class' => 'form-control', 'maxlength' => 20, 'placeholder' => 'Identity Card Number')); ?>
                <?php echo $form->error($model, 'id'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'idis'); ?>
                <?php echo $form->textField($model, 'idis', array('size' => 20, 'class' => 'form-control', 'maxlength' => 20, 'placeholder' => 'Place of issue')); ?>
                <?php echo $form->error($model, 'idis'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'idid'); ?>
                <?php // echo $form->textField($model, 'idid'); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'attribute' => 'idid',
                    'model' => $model,
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'yy-mm-dd',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'yearRange' => '1900:'
                    ),
                    'htmlOptions' => array(
                        'style' => 'height:35px;width:300px',
                        'placeholder' => 'Date of Issue',
                        'class' => 'form-control',
                    ),
                ));
                ?>

                <?php echo $form->error($model, 'idid'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'ided'); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'attribute' => 'ided',
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
                        'placeholder' => 'Date of Expiration',
                        'class' => 'form-control',
                    ),
                ));
                ?>
                <?php // echo $form->textField($model, 'ided'); ?>
                <?php echo $form->error($model, 'ided'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'psp'); ?>
                <?php echo $form->textField($model, 'psp', array('size' => 20, 'class' => 'form-control', 'maxlength' => 20, 'placeholder' => 'Passport Number')); ?>
                <?php echo $form->error($model, 'psp'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'pspis'); ?>
                <?php echo $form->textField($model, 'pspis', array('size' => 20, 'class' => 'form-control', 'maxlength' => 20, 'placeholder' => 'Place of Issue')); ?>
                <?php echo $form->error($model, 'pspis'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'pspid'); ?>
                <?php // echo $form->textField($model, 'pspid'); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'attribute' => 'pspid',
                    'model' => $model,
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'yy-mm-dd',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'yearRange' => '1900:'
                    ),
                    'htmlOptions' => array(
                        'style' => 'height:20px;',
                        'placeholder' => 'Date of Issue',
                        'class' => 'form-control',
                    ),
                ));
                ?>

                <?php echo $form->error($model, 'pspid'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'psped'); ?>
                <?php // echo $form->textField($model, 'psped'); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'attribute' => 'psped',
                    'model' => $model,
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'yy-mm-dd',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'yearRange' => '1900:'
                    ),
                    'htmlOptions' => array(
                        'style' => 'height:20px;',
                        'placeholder' => 'Date of Expiration',
                        'class' => 'form-control',
                    ),
                ));
                ?>
                <?php echo $form->error($model, 'psped'); ?>
            </div>
        <?php } else {
            ?>
            <div class="form-group">
                <?php // // echo $form->labelEx($model, 'tcus'); ?>
                <?php echo $form->hiddenField($model, 'tcus', array('size' => 2, 'class' => 'form-control', 'maxlength' => 2, 'id' => 'typein')); ?>
                <?php echo $form->error($model, 'tcus'); ?>
            </div>
            <!--                Institution -->
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'nam'); ?>
                <?php echo $form->textField($model, 'nam', array('size' => 50, 'class' => 'form-control', 'placeholder' => 'Name', 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'nam'); ?>
            </div>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'res'); ?>
                <?php echo $form->dropDownList($model, 'res', CHtml::listData(Countries::model()->findAll(), 'id_countries', 'name'), array('empty' => 'Country of Residence'), array('data-image' => 'images/msdropdown/icons/blank.gif', 'style' => array('height:600px;'), 'size' => '600px')); ?>

                <?php // echo $form->textField($model, 'res', array('size' => 3, 'class' => 'form-control', 'maxlength' => 3));  ?>
                <?php echo $form->error($model, 'res'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'resnam'); ?>
                <?php echo $form->textField($model, 'resnam', array('size' => 60, 'class' => 'form-control', 'maxlength' => 100, 'placeholder' => 'Name to be restituted')); ?>
                <?php echo $form->error($model, 'resnam'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'rso'); ?>
                <?php echo $form->textField($model, 'rso', array('size' => 60, 'class' => 'form-control', 'maxlength' => 100, 'placeholder' => 'Official Company Name')); ?>
                <?php echo $form->error($model, 'rso'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'breg'); ?>
                <?php echo $form->textField($model, 'breg', array('size' => 50, 'class' => 'form-control', 'maxlength' => 50, 'placeholder' => 'Business register')); ?>
                <?php echo $form->error($model, 'breg'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'tpc'); ?>
                <?php echo $form->textField($model, 'tpc', array('size' => 50, 'class' => 'form-control', 'maxlength' => 50, 'placeholder' => 'Tax payers card number')); ?>
                <?php echo $form->error($model, 'tpc'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'qua'); ?>
                <?php echo $form->textField($model, 'qua', array('size' => 5, 'class' => 'form-control', 'maxlength' => 5, 'placeholder' => 'Quality note')); ?>
                <?php echo $form->error($model, 'qua'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'ca'); ?>
                <?php echo $form->textField($model, 'ca', array('size' => 60, 'class' => 'form-control', 'maxlength' => 5, 'placeholder' => 'Annual Gross domestic product(GDP)')); ?>
                <?php echo $form->error($model, 'ca'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'town'); ?>
                <?php echo $form->textField($model, 'town', array('size' => 50, 'class' => 'form-control', 'maxlength' => 50, 'placeholder' => 'Town of recidence/ Head office')); ?>
                <?php echo $form->error($model, 'town'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'sec'); ?>
                <?php echo $form->textField($model, 'sec', array('size' => 60, 'class' => 'form-control', 'maxlength' => 100, 'placeholder' => 'Sector Of Activity')); ?>
                <?php echo $form->error($model, 'sec'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'dcre'); ?>
                <?php //echo $form->textField($model, 'dcre', array('placeholder' => 'Date of Creation', 'class' => 'form-control')); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'attribute' => 'dcre',
                    'model' => $model,
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'yy-mm-dd',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'yearRange' => '1900:'
                    ),
                    'htmlOptions' => array(
                        'style' => 'height:35px;width:300px',
                        'placeholder' => 'Date of Creation',
                        'class' => 'form-control',
                    ),
                ));
                ?>
                <?php echo $form->error($model, 'dcre'); ?>
            </div>
        <?php }
        ?>
        <div class="form-group buttons">
            <p align="center"><?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => 'btn btn-md-default')); ?></p>
        </div>

        <?php $this->endWidget(); ?>


    </div>
</div>
<!-- /#page-wrapper -->
<!-- jQuery -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!-- Morris Charts JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/raphael/raphael-min.js"></script>

<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/js/morris-data.js"></script>-->
<!-- Custom Theme JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/dist/js/sb-admin-2.js"></script>
<!-- DataTables JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
