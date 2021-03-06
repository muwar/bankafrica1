<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<style>
input, textarea, label {
  font: 12px/20px 'Lucida Grande', Verdana, sans-serif;
  font-size: 12px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.contact, #yw0 {
  position: relative;
  margin: 50px auto;
  margin-top: 10px;
  padding: 5px;
  width: auto;
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

.contact:before, .contact:after, .contact-inner:before, .contact-inner:after, #yw0:before, #yw0:after,  {
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

.contact:before, #yw0:before {
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
.contact-submit > input {
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
.contact-submit > input:active {
  color: #6a95a9;
  text-shadow: 0 1px rgba(255, 255, 255, 0.3);
  background: #c9dfe9;
  border-color: #a3bed0 #b5ccda #b5ccda;
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px rgba(255, 255, 255, 0.2), 0 0 0 4px #eef7f9;
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px rgba(255, 255, 255, 0.2), 0 0 0 4px #eef7f9;
}

.title{
	text-align: center;
    color: white;
}
</style>

<div id="page-wrapper">
	<div class="col-md-8" style="float:none;margin:0 auto">
		<div id="Zone_Milieu">
			<h1 class="title">Contact Us</h1>
			<p style="color:white">If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.</p>
			<div id="contain-contact-us">
				<?php 
					$form=$this->beginWidget('CActiveForm', array(
						'enableClientValidation'=>true,
						'clientOptions'=>array(
							'validateOnSubmit'=>true
						),
					)); 
				?>
				<fieldset class="contact-inner">
					<p class="contact-input">
						<?php echo $form->textField($model,'name', array('required' => 'required', 'autocomplete' => 'off', 'placeholder'=>'Your Name...')); ?>
						<?php echo $form->error($model,'name'); ?>
					</p>
					<p class="contact-input">
						<?php echo $form->textField($model,'email', array('required' => 'required', 'type' => 'email', 'autocomplete' => 'off', 'placeholder'=>'Your Email...')); ?>
						<?php echo $form->error($model,'email'); ?>
					</p>
					<p class="contact-input">
						<?php echo $form->textField($model,'subject', array('required' => 'required', 'autocomplete' => 'off', 'size'=>60,'maxlength'=>128, 'placeholder'=>'Your Subject...')); ?>
						<?php echo $form->error($model,'subject'); ?>
					</p>
					<p class="contact-input">
						<?php echo $form->textArea($model,'body', array('required' => 'required', 'autocomplete' => 'off', 'rows'=>6, 'cols'=>50, 'placeholder'=>'Your Message...')); ?>
						<?php echo $form->error($model,'body'); ?>
					</p>
					<?php if(CCaptcha::checkRequirements()): ?>
					<p class="contact-input">
						<?php echo $form->labelEx($model,'verifyCode'); ?>
						<?php $this->widget('CCaptcha'); ?>
						<?php echo $form->textField($model,'verifyCode', array('required' => 'required', 'autocomplete' => 'off', 'style'=>'width:40%;display:inline')); ?>
						<div class="hint">Please enter the letters as they are shown in the image above.<br/>Letters are not case-sensitive.</div>
						<?php echo $form->error($model,'verifyCode'); ?>
					</p>
					<?php endif; ?>
					<p class="contact-submit">
						<?php echo CHtml::submitButton('Submit'); ?>
					</p>
				</fieldset>
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>