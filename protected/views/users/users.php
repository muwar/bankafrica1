<div class="row">
    <script>
        $(document).ready(function() {
            $("#institution").hide();
            $("#personal").hide();

            $("#pACC").click(function() {
                $("#personal").show();
                $("#institution").hide();
                $("#typepe").val("pe");
            }
            );
            $("#bACC").click(function() {
                $("#institution").show();
                $("#personal").hide();
                $("#typein").val("in");
            }
            );
            $("#iACC").click(function() {
                $("#institution").show();
                $("#personal").hide();
                $("#typein").val("in");
            }
            );
        });
    </script>
    <div class="col-md-4" align="left">
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="pACC"
                       value="4" checked> <font style="font-weight: bolder; ">PERSONAL ACCOUNT</font>
            </label>
            <br/>
            <span style="margin-left: 23px; display: inline-block;">Personal information</span>
            <br/>
            <br/>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="bACC"
                       value="3">
                <font style="font-weight: bolder; ">BANK ACCOUNT</font>
            </label>
            <br/>
            <span style="margin-left: 23px; display: inline-block;">Bank information</span>
            <br/>
            <br/>
            <!--<span style="margin-left: 23px;">images, etc. required </span>-->
        </div> 
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="iACC"
                       value="2">
                <font style="font-weight: bolder; ">INSTITUTION ACCOUNT</font>
            </label>
            <br/>
            <span style="margin-left: 23px; display: inline-block;">Institution</span>
            <br/>
            <br/>
        </div> 
    </div>
    <div class="col-md-8" align="right">
        <div class="form">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'Bqcus-form',
                'enableAjaxValidation' => false,
//        'action' => Yii::app()->request->baseUrl . '/index.php?r=persons/create',
            ));
            ?>
            <p class="note">Fields with <span class="required">*</span> are required.</p>
            <?php echo $form->errorSummary($model); ?>

            <div class="form-group">
                <?php // echo $form->labelEx($model, 'cus'); ?>
                <?php echo $form->textField($model, 'cus', array('size' => 15, 'placeholder' => 'Customer code', 'class' => 'form-control', 'maxlength' => 15)); ?>
                <?php echo $form->error($model, 'cus'); ?>
            </div>

            <div id="personal">
                <!--                Personal -->
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'sur'); ?>
                    <?php echo $form->textField($model, 'sur', array('size' => 50, 'class' => 'form-control', 'placeholder' => 'Surname', 'maxlength' => 50)); ?>
                    <?php echo $form->error($model, 'sur'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'mid'); ?>
                    <?php echo $form->textField($model, 'mid', array('size' => 50, 'class' => 'form-control', 'placeholder' => 'Middle Name', 'maxlength' => 50)); ?>
                    <?php echo $form->error($model, 'mid'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'otn'); ?>
                    <?php echo $form->textField($model, 'otn', array('size' => 50, 'class' => 'form-control', 'placeholder' => 'Other Name', 'maxlength' => 50)); ?>
                    <?php echo $form->error($model, 'otn'); ?>
                </div>


                <div class="form-group">
                    <?php echo $form->labelEx($model, 'dbir'); ?>
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
                    <?php echo $form->labelEx($model, 'mna'); ?>
                    <?php echo $form->textField($model, 'mna', array('size' => 60, 'class' => 'form-control', 'placeholder' => 'Mother' . "'s" . ' Name', 'maxlength' => 100)); ?>
                    <?php echo $form->error($model, 'mna'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'fna'); ?>
                    <?php echo $form->textField($model, 'fna', array('size' => 60, 'class' => 'form-control', 'placeholder' => 'Father' . "'s" . ' Name', 'maxlength' => 100)); ?>
                    <?php echo $form->error($model, 'fna'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'sex'); ?>
                    <?php echo $form->dropDownList($model, 'sex', array('F' => 'Female', 'M' => 'Male'), array('empty' => 'Select Gender')); ?>
                    <?php echo $form->error($model, 'sex'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'tcus'); ?>
                    <?php echo $form->textField($model, 'tcus', array('size' => 2, 'class' => 'form-control', 'maxlength' => 2, 'id' => 'typepe')); ?>
                    <?php echo $form->error($model, 'tcus'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'sal'); ?>
                    <?php echo $form->textField($model, 'sal', array('size' => 5, 'class' => 'form-control', 'maxlength' => 5, 'placeholder' => 'Annual Salary')); ?>
                    <?php echo $form->error($model, 'sal'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'tbir'); ?>
                    <?php echo $form->textField($model, 'tbir', array('size' => 50, 'class' => 'form-control', 'maxlength' => 50, 'placeholder' => 'Town of Birth')); ?>
                    <?php echo $form->error($model, 'tbir'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'pro'); ?>
                    <?php echo $form->textField($model, 'pro', array('size' => 50, 'class' => 'form-control', 'maxlength' => 50, 'placeholder' => 'Profession')); ?>
                    <?php echo $form->error($model, 'pro'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'id'); ?>
                    <?php echo $form->textField($model, 'id', array('size' => 60, 'class' => 'form-control', 'maxlength' => 20, 'placeholder' => 'Identity Card Number')); ?>
                    <?php echo $form->error($model, 'id'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'idis'); ?>
                    <?php echo $form->textField($model, 'idis', array('size' => 20, 'class' => 'form-control', 'maxlength' => 20, 'placeholder' => 'Place of issue')); ?>
                    <?php echo $form->error($model, 'idis'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'idid'); ?>
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
                    <?php echo $form->labelEx($model, 'ided'); ?>
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
                    <?php echo $form->labelEx($model, 'psp'); ?>
                    <?php echo $form->textField($model, 'psp', array('size' => 20, 'class' => 'form-control', 'maxlength' => 20, 'placeholder' => 'Passport Number')); ?>
                    <?php echo $form->error($model, 'psp'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'pspis'); ?>
                    <?php echo $form->textField($model, 'pspis', array('size' => 20, 'class' => 'form-control', 'maxlength' => 20, 'placeholder' => 'Place of Issue')); ?>
                    <?php echo $form->error($model, 'pspis'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'pspid'); ?>
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
                    <?php echo $form->labelEx($model, 'psped'); ?>
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
                <div class="form-group buttons">
                    <p align="center"><?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => 'btn btn-md-default')); ?></p>
                </div>
            </div>
            <div id="institution">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'tcus'); ?>
                    <?php echo $form->textField($model, 'tcus', array('size' => 2, 'class' => 'form-control', 'maxlength' => 2, 'id' => 'typein')); ?>
                    <?php echo $form->error($model, 'tcus'); ?>
                </div>
                <!--                Institution -->
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'nam'); ?>
                    <?php echo $form->textField($model, 'nam', array('size' => 50, 'class' => 'form-control', 'placeholder' => 'Name', 'maxlength' => 50)); ?>
                    <?php echo $form->error($model, 'nam'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'res'); ?>
                    <?php echo $form->dropDownList($model, 'res', CHtml::listData(Countries::model()->findAll(), 'id_countries', 'name'), array('empty' => 'Country of Residence'), array('data-image' => 'images/msdropdown/icons/blank.gif', 'style' => array('height:600px;'), 'size' => '600px')); ?>

                    <?php // echo $form->textField($model, 'res', array('size' => 3, 'class' => 'form-control', 'maxlength' => 3));  ?>
                    <?php echo $form->error($model, 'res'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'resnam'); ?>
                    <?php echo $form->textField($model, 'resnam', array('size' => 60, 'class' => 'form-control', 'maxlength' => 100, 'placeholder' => 'Name to be restituted')); ?>
                    <?php echo $form->error($model, 'resnam'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'rso'); ?>
                    <?php echo $form->textField($model, 'rso', array('size' => 60, 'class' => 'form-control', 'maxlength' => 100, 'placeholder' => 'Official Company Name')); ?>
                    <?php echo $form->error($model, 'rso'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'breg'); ?>
                    <?php echo $form->textField($model, 'breg', array('size' => 50, 'class' => 'form-control', 'maxlength' => 50, 'placeholder' => 'Business register')); ?>
                    <?php echo $form->error($model, 'breg'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'tpc'); ?>
                    <?php echo $form->textField($model, 'tpc', array('size' => 50, 'class' => 'form-control', 'maxlength' => 50, 'placeholder' => 'Tax payers card number')); ?>
                    <?php echo $form->error($model, 'tpc'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'qua'); ?>
                    <?php echo $form->textField($model, 'qua', array('size' => 5, 'class' => 'form-control', 'maxlength' => 5, 'placeholder' => 'Quality note')); ?>
                    <?php echo $form->error($model, 'qua'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'ca'); ?>
                    <?php echo $form->textField($model, 'ca', array('size' => 60, 'class' => 'form-control', 'maxlength' => 5, 'placeholder' => 'Annual Gross domestic product(GDP)')); ?>
                    <?php echo $form->error($model, 'ca'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'town'); ?>
                    <?php echo $form->textField($model, 'town', array('size' => 50, 'class' => 'form-control', 'maxlength' => 50, 'placeholder' => 'Town of recidence/ Head office')); ?>
                    <?php echo $form->error($model, 'town'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'sec'); ?>
                    <?php echo $form->textField($model, 'sec', array('size' => 60, 'class' => 'form-control', 'maxlength' => 100, 'placeholder' => 'Sector Of Activity')); ?>
                    <?php echo $form->error($model, 'sec'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'dcre'); ?>
                    <?php echo $form->textField($model, 'dcre', array('placeholder' => 'Date of Creation', 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'dcre'); ?>
                </div>
                <div class="form-group buttons">
                    <p align="center"><?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => 'btn btn-md-default')); ?></p>
                </div>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'sta'); ?>
                <?php echo $form->hiddenField($model, 'sta', array('size' => 2, 'class' => 'form-control', 'maxlength' => 2, 'placeholder' => 'State')); ?>
                <?php echo $form->error($model, 'sta'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'proc'); ?>
                <?php echo $form->hiddenField($model, 'proc', array('size' => 1, 'class' => 'form-control', 'maxlength' => 1)); ?>
                <?php echo $form->error($model, 'proc'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'uti'); ?>
                <?php echo $form->hiddenField($model, 'uti', array('size' => 10, 'class' => 'form-control', 'maxlength' => 10, 'value' => Yii::app()->user->name)); ?>
                <?php echo $form->error($model, 'uti'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'utimo'); ?>
                <?php echo $form->hiddenField($model, 'utimo', array('size' => 10, 'class' => 'form-control', 'maxlength' => 10, 'value' => Yii::app()->user->name)); ?>
                <?php echo $form->error($model, 'utimo'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'dou'); ?>
                <?php echo $form->hiddenField($model, 'dou', array('value' => date('Y-m-d'), 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'dou'); ?>
            </div>
            <div class="form-group">
                <?php // echo $form->labelEx($model, 'dmo'); ?>
                <?php echo $form->hiddenField($model, 'dmo', array('value' => date('Y-m-d'), 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'dmo'); ?>
            </div>

            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
</div>