<style>
.table-striped>tbody>tr:nth-of-type(odd)
{
	background-color: #f0ad4e;
	color:white;
}
.table-striped>tbody>tr:nth-child(2n)
{
	background-color: #8a6d3b;
	color:white;
}
.sorting_1{
	background: #5cb85c;
}
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">                        
                    Table of defined rates
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php // echo CHtml::link('New rate type', array('users'), array('onclick' => '$("#signup").dialog("open"); return false;')); ?>
                    <?php echo CHtml::link('New rate type', array('users'), array('data-toggle' => 'modal', 'data-target' => '#myModal')); ?>

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <?php $i = 1; ?>
                                <tr style="background:blue;color:white">
                                    <th>SN</th>
                                    <th>Rate Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($rates as $rate) {
                                    echo "<tr class='odd gradeX'><td>" . $i . "</td>";
                                    echo "<td>" . $rate->rt_name . "</td></tr>";
                                    $i++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">                        
                    Table of defined terms
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php // echo CHtml::link('New rate type', array('users'), array('onclick' => '$("#signup").dialog("open"); return false;')); ?>
                    <?php echo CHtml::link('New Term', array('users'), array('data-toggle' => 'modal', 'data-target' => '#termModal')); ?>

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                            <thead>
                                <?php $i = 1; ?>
                                <tr style="background:blue;color:white">
                                    <th>SN</th>
                                    <th>Term</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($terms as $term) {
                                    echo "<tr class='odd gradeX'><td>" . $i . "</td>";
                                    echo "<td>" . $term->term_name . "</td>";
                                    echo "<td>" . $term->term_duration . "</td></tr>";
                                    $i++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="termModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <fieldset>
            <div class="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Adding new terms</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="Name of term" name="typename" id="termname" autofocus><br>
                            <input class="form-control" placeholder="Duration of term" name="typename" id="dterm" >
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="send" class="btn btn-primary" onclick="saveterm()">Save</button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </fieldset>
    </div>
</div>
<!-- /.modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <fieldset>
            <div class="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Adding new rates</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="Type Name" name="typename" id="typename" autofocus>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="send" class="btn btn-primary" onclick="propose()">Save</button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </fieldset>
    </div>
</div>
<!-- /.modal -->
<!-- Modal -->
<div class="modal fade" id="sModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <fieldset>
            <div class="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">SUCCESS!!!</h4>
                    </div>
                    <div class="modal-body">
                        The data has been saved successfully
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </fieldset>
    </div>
</div>
<!-- /.modal -->
<script>
                            $(document).ready(function() {
                                //localStorage.clear();
                                //alert(localStorage.length);
                                //$("#Formore").append("localStorage.length");
                                //document.getElementById('basket').value = localStorage.length;
                            });

                            function saveterm() {
                                var termname = document.getElementById("termname").value;
                                var dterm = document.getElementById("dterm").value;
                                if (termname === '') {
                                    alert("Error: the name of a term is a required field!");
                                }
                                else {
                                    $.ajax({
                                        type: "GET",
                                         url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+ "/index.php?r=adminS5F1T6P0/default/addterm&termname="
                                                + termname+"&dterm="+dterm,
                                        data: "", //ProposedSites
                                        cache: false,
                                        success: function(data) {
                                            if (data == 'true') {
                                                $('#termModal').modal('hide');
                                                $('#sModal').modal('show');
                                                setTimeout(function() {
                                                    location.reload();
                                                }, 500);

                                            } else {
                                                alert("Failure: Data Could Not Be Saved. Try Again.");
                                            }
                                        },
                                        error: function(data) {
                                            alert("Error Sending Data.");

                                        }
                                    });
                                }
                            }

                            function propose() {
                                var typename = document.getElementById("typename").value;
                                if (typename === '') {
                                    alert("Error: This lone field is required!");
                                }
                                else {
                                    $.ajax({
                                        type: "GET",
                                     url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+ "index.php?r=adminS5F1T6P0/default/addrate&typename="
                                                + typename,
                                        data: "", //ProposedSites
                                        cache: false,
                                        success: function(data) {
                                            if (data == 'true') {
                                                $('#myModal').modal('hide');
                                                $('#sModal').modal('show');
                                                setTimeout(function() {
                                                    location.reload();
                                                }, 500);

                                            } else {
                                                alert("Failure: Data Could Not Be Saved. Try Again.");
                                            }
                                        },
                                        error: function(data) {
                                            alert("Error Sending Data.");

                                        }
                                    });
                                }
                            }

</script>
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
   
        $('#dataTables-example1').DataTable({
            responsive: true
        });

    });
</script>