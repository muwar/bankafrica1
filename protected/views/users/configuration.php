<div id="page-wrapper">
    <?php
    $users = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
    foreach ($users as $user)
        ;
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <p align="center"><strong>Account Configuration  For User   </strong><?php echo "<i>" . $user->nom . "</i>" ?></p>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="col-md-10">
                <?php
//                echo Yii::app()->user->name;
                $model=new Bqcus;
                $this->renderpartial('users', array('model' => $model));
                ?>
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
  