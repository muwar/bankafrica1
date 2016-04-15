<style>
input, textarea, label {
  font: 12px/20px 'Lucida Grande', Verdana, sans-serif;
  font-size: 12px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.contact, #evuti-form {
  position: relative;
  margin: 50px auto;
  padding: 5px;
  width: 320px;
  background: #eef5f7;
  border: 1px solid #cfd5da;
  border-bottom-color: #ccd1d6;
  border-radius: 3px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}

.contact-inner {
  padding: 25px;
  background: white;
  border-radius: 2px;
}

.contact:before, .contact:after, .contact-inner:before, .contact-inner:after, #evuti-form:before, #evuti-form:after,  {
  content: '';
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -6px;
  width: 1px;
  height: 1px;
  border: outset transparent;
  border-width: 12px 14px 0;
  border-top-style: solid;
  -webkit-transform: rotate(360deg);
}

.contact:before, #evuti-form:before {
  margin-top: 1px;
  border-top-color: #d8e1e6;
}

.contact-inner:before {
  border-top-color: #ccd1d6;
}

.contact-inner:after {
  margin-top: -1px;
  border-top-color: #eef5f7;
}
.contact-input {
  overflow: hidden;
  margin-bottom: 20px;
  padding: 5px;
  background: #eef7f9;
  border-radius: 2px;
}
.contact-input > input, .contact-input > textarea {
  display: block;
  width: 100%;
  height: 29px;
  padding: 0 9px;
  color: #4d5a5e;
  background: white;
  border: 1px solid #cfdfe3;
  border-bottom-color: #d2e2e7;
  border-radius: 2px;
  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05), 0 1px rgba(255, 255, 255, 0.2);
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05), 0 1px rgba(255, 255, 255, 0.2);
}
.contact-input > input:focus, .contact-input > textarea:focus {
  border-color: #93c2ec;
  outline: 0;
  -webkit-box-shadow: 0 0 0 8px #e1ecf5;
  box-shadow: 0 0 0 8px #e1ecf5;
}
.lt-ie9 .contact-input > input, .lt-ie9 .contact-input > textarea {
  line-height: 27px;
}
.contact-input > textarea {
  padding: 4px 8px;
  height: 90px;
  line-height: 20px;
  resize: none;
}

.select {
  display: block;
  position: relative;
  overflow: hidden;
  background: white;
  border: 1px solid #d2e2e7;
  border-bottom-color: #c5d4d9;
  border-radius: 2px;
  background-image: -webkit-linear-gradient(top, #fcfdff, #f2f7f7);
  background-image: -moz-linear-gradient(top, #fcfdff, #f2f7f7);
  background-image: -o-linear-gradient(top, #fcfdff, #f2f7f7);
  background-image: linear-gradient(to bottom, #fcfdff, #f2f7f7);
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.06);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.06);
}
.select:before, .select:after {
  content: '';
  position: absolute;
  right: 11px;
  width: 0;
  height: 0;
  border-left: 3px outset transparent;
  border-right: 3px outset transparent;
}
.select:before {
  top: 10px;
  border-bottom: 3px solid #7f9298;
}
.select:after {
  top: 16px;
  border-top: 3px solid #7f9298;
}
.select > select {
  position: relative;
  z-index: 2;
  width: 112%;
  height: 29px;
  line-height: 17px;
  padding: 5px 9px;
  padding-right: 0;
  color: #80989f;
  background: transparent;
  background: rgba(0, 0, 0, 0);
  border: 0;
  -webkit-appearance: none;
}
.select > select:focus {
  color: #4d5a5e;
  outline: 0;
}

.contact-submit {
  text-align: right;
}
.contact-submit > button {
  display: inline-block;
  vertical-align: top;
  padding: 0 14px;
  height: 29px;
  font-weight: bold;
  color: #729fb2;
  text-shadow: 0 1px rgba(255, 255, 255, 0.5);
  background: #deeef4;
  border: 1px solid #bed6e3;
  border-bottom-color: #accbd9;
  border-radius: 15px;
  cursor: pointer;
  background-image: -webkit-linear-gradient(top, #e6f2f7, #d0e6ee);
  background-image: -moz-linear-gradient(top, #e6f2f7, #d0e6ee);
  background-image: -o-linear-gradient(top, #e6f2f7, #d0e6ee);
  background-image: linear-gradient(to bottom, #e6f2f7, #d0e6ee);
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px 1px rgba(0, 0, 0, 0.06), 0 0 0 4px #eef7f9;
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px 1px rgba(0, 0, 0, 0.06), 0 0 0 4px #eef7f9;
}
.contact-submit > button:active {
  color: #6a95a9;
  text-shadow: 0 1px rgba(255, 255, 255, 0.3);
  background: #c9dfe9;
  border-color: #a3bed0 #b5ccda #b5ccda;
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px rgba(255, 255, 255, 0.2), 0 0 0 4px #eef7f9;
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px rgba(255, 255, 255, 0.2), 0 0 0 4px #eef7f9;
}
</style>

<div id="page-wrapper">
	<div class="col-md-9" style="float:none;margin:0 auto">
		<div class="form">
			<div class="tab-content">
				<div id="signup" style="display:block;">   
					<h1>Sign Up</h1>
					<?php
					$form = $this->beginWidget('CActiveForm', array(
						'id' => 'evuti-form',
						'enableAjaxValidation' => false,
					));
					?>
					<p class="note">Fields with <span class="required">*</span> are required.</p>
					<?php echo $form->errorSummary($model); ?>
					<?php
					if (Yii::app()->user->hasFlash("error"))
						echo Yii::app()->user->getFlash("error");
					?>
					
					<p class="contact-input">
						<?php echo $form->dropDownList($model, 'pro', CHtml::listData(Evprof::model()->findAll('lib !=:x',array(':x'=>'Administrator')), 'id', 'lib'), array('style' => 'color:gray', 'prompt' => 'Choose account type *')); ?>
						<?php echo $form->error($model, 'pro'); ?>
					</p>
					
					<div class="field-wrap">
						<?php echo $form->dropDownList($model, 'pro', CHtml::listData(Evprof::model()->findAll('lib !=:x',array(':x'=>'Administrator')), 'id', 'lib'), array('style' => 'color:gray', 'prompt' => 'Choose account type *')); ?>
						<?php echo $form->error($model, 'pro'); ?>
					</div>
					<div class="top-row">
						<div class="field-wrap">
							<?php echo $form->labelEx($model1, 'resnam', array('style' => 'color:gray')); ?>
							<?php echo $form->textField($model1, 'resnam', array('size' => 45, 'maxlength' => 45, 'required' => 'required', 'autocomplete' => 'off')); ?>
							<?php echo $form->error($model1, 'resnam'); ?>
						</div>
						<div class="field-wrap">
							<?php echo $form->labelEx($model, 'nom', array('style' => 'color:gray')); ?>
							<?php echo $form->textField($model, 'nom', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
							<?php echo $form->error($model, 'nom'); ?>
						</div>
					</div>
					<div class="top-row">
						<div class="field-wrap">
							<?php echo $form->labelEx($model1, 'telephone', array('style' => 'color:gray;margin-left:13%')); ?>
							<?php echo $form->textField($model1, 'telephone', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control','type'=>'tel','id'=>'mobile-number')); ?>
							<?php echo $form->error($model1, 'telephone'); ?>
						</div>
						<div class="field-wrap">
							<?php echo $form->labelEx($model1, 'email', array('style' => 'color:gray')); ?>
							<?php echo $form->textField($model1, 'email', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
							<?php echo $form->error($model1, 'email'); ?>
						</div>
					</div>
					<div class="top-row">
						<div class="field-wrap">
							<?php echo $form->labelEx($model, 'pswd', array('style' => 'color:gray')); ?>
							<?php echo $form->passwordField($model, 'pswd', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
							<?php echo $form->error($model, 'pswd'); ?>
						</div>
						<div class="field-wrap">
							<?php echo $form->labelEx($model, 'confirm_your_password', array('style' => 'color:gray')); ?>
							<?php echo $form->passwordField($model, 'confirm_your_password', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
							<?php echo $form->error($model, 'confirm_your_password'); ?>
						</div>
					</div>
					<div class="top-row">
						<div class="field-wrap">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => 'button button-block')); ?>
						</div>
						<div class="field-wrap">
							<input type="reset" value="Reset!" class="button button-block">
						</div>
					</div>
					<p>
						<?php echo CHtml::link('LOGIN', array('site/login'), array('onclick' => '$("#signup").dialog("open"); return false;')); ?>
					</p>
					<?php
					$this->endWidget();
					?>
				</div>
			</div><!-- tab-content -->
		</div> <!-- /form -->
	</div>
</div>