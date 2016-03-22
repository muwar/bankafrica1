<div id="page-wrapper">
    <?php
    /* @var $this ProfilesController */
    /* @var $model Profiles */

    $this->breadcrumbs = array(
        'Profiles' => array('index'),
        'Manage',
    );
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <p align="center">Manage Profiles</p>
        </div>
        <p align="right"><?php echo CHtml::link('Add a new record', array(''), array('onClick' => '$("#nprof").dialog("open"); return false;')); ?></p>
        <?php
        if (Yii::app()->user->hasFlash("error"))
            echo Yii::app()->user->getFlash("error");
        ?>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table  align="center" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Profile Name</th>
                            <th>Date of creation</th>
                            <th>Created by</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($profiles as $profile) {
                            echo "<tr><td>" . $i . "</td>";
                            echo "<td>" . $profile->profile_name . "</td>";
                            echo "<td>" . $profile->cdate . "</td>";
                            if ($profile->muser == 0)
                                echo "<td>" . " System administrator" . "</td>";
                            else
                                echo "<td>" . Users::model()->findByPk($profile->muser)->username . "</td>";
                            echo "<td>" . $profile->remark . "</td></tr>";
             $i++;
                            }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->


<!-- jQuery -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!-- DataTables JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<!-- Morris Charts JavaScript -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/raphael/raphael-min.js"></script>
-->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/js/morris-data.js"></script>-->
<!-- Custom Theme JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/dist/js/sb-admin-2.js"></script>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>   
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'nprof',
    // additional javascript options for the dialog plugin
    'options' => array(
        'title' => 'New profile record',
        'autoOpen' => false,
        'width' => '400',
        'height' => '250',
        'modal' => true,
    ),
));
$model = new Profiles;
$this->renderpartial('create', array('model' => $model));
$this->endWidget('zii.widgets.jui.CJuiDialog');

//end
?>
