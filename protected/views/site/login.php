<?php ob_start() ?>

<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-5">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Log In</h3>
                </div>
                <div class="panel-body">
                    <?php
                    if (Yii::app()->user->hasFlash("error"))
                        echo Yii::app()->user->getFlash("error");
                    ?>
                    <?php
                    if (Yii::app()->user->hasFlash("msg"))
                        echo Yii::app()->user->getFlash("msg");
                    ?>
                    <fieldset>
                        <div class="form">
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'login-form',
                                'enableClientValidation' => true,
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                ),
                            ));
                            ?>
                            <table>
                                <tr>
                                    <td colspan="2"><p class="note">Fields with <span class="required">*</span> are required.</p></td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->labelEx($model, 'username', array('style' => 'color:gray')); ?>
                                    </td>
                                    &nbsp;&nbsp;
                                    <td>
                                        <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => 'Username','autofocus')); ?>
                                        <?php echo $form->error($model, 'username'); ?><br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->labelEx($model, 'password', array('style' => 'color:gray')); ?>
                                    </td>
                                    &nbsp;&nbsp;
                                    <td>
                                        <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Password')); ?>
                                        <?php echo $form->error($model, 'password'); ?><br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group buttons">
                                            <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-lg btn-success btn-block')); ?>
                                        </div>
                                        <?php echo CHtml::link('SIGNUP', array('/users/create'), array('onclick' => '$("#signup").dialog("open"); return false;')); ?>
                                        <?php
                                        //            echo Yii::app()->user->name;
                                        $this->endWidget();
                                        ?>
                                    </td>
                                </tr>
                            </table>
                    </fieldset>
                </div>
            </div>
        </div>
    </div><!-- form -->
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
</script>=
