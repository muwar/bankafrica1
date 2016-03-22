<script>
    function toggle1(id) {
        $("#the_rest" + id).toggle();
    }
    $(document).ready(function() {
        $(".sub1").hide();
        $(".sub2").hide();
    });
    function toggle2(id) {
//        alert(id);
        $("#the_restinner" + id).toggle();
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Operations on rates
                </div>
                <!-- .panel-heading -->
                <div class="panel-body">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Configurable rates</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th> Operation</th>
                                                    <?php foreach ($terms as $tterm) { ?>
                                                        <th><?php echo $tterm->term_name; ?></th>
                                                    <?php } ?>
                       <!--             <th>Edit</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($rates as $rate) {
                                                    echo "<tr class='odd gradeX'>";
                                                    echo "<td>" . $rate->rt_name . "</td>";
                                                    foreach ($terms as $term1) {
                                                        $instrates = InstitutionsQuotation::model()->findAll('quotation_id=:x and term_id=:y', array(':x' => $rate->rt_id, ':y' => $term1->term_id));
                                                        rsort($instrates);

                                                        if (count($instrates) == 0)
                                                            echo "<td>NA</td>";
                                                        else
                                                            echo "<td>" . current($instrates)->lrate . "  %</td>";
                                                    }
                                                    $i++;
                                                    //               echo "<td>".CHtml::link('', array('#'), array('class' => 'fa fa-edit fa-2x', 'data-toggle' => 'modal', 'data-target' => '#editModal'))."</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Configure your rates</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <?php
                                    $i = 1;
                                    foreach ($rates as $rate) {
                                        ?>
                                        <form class="form-inline" >
                                            <div class="main1" id="det<?php echo $i; ?>">
                                                <div class="checkbox" >
                                                    <label style="color:navy;font-size: 22px;"><input type="checkbox"  value="<?php echo $rate->rt_id; ?>" onclick="toggle1(this.value)"><?php  echo $rate->rt_name ?></label>
                                                </div>
                                            </div>
                                            <div id="the_rest<?php echo $i; ?>" class="sub1">
                                                <?php
                                                $useris = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
                                                foreach ($useris as $useri)
                                                    ;
                                                $j = 0;
                                                foreach ($terms as $term) {
                                                    ?>
                                                    <br>
                                                    <label style="color:mediumblue;font-size: 15px;"><input type="checkbox"  value="<?php echo $i . $j; ?>" onclick="toggle2(this.value)"><?php echo $term->term_name; ?></label>
                                                    <div id="the_restinner<?php echo $i . $j; ?>" class="sub2">    
                                                        <input type="hidden" class="form-control" id="institution<?php echo $i . $j; ?>" value="<?php echo $useri->cdos; ?>" name="institution" placeholder="Institution">
                                                        <input type="hidden" class="form-control" id="rateT<?php echo $i . $j; ?>" value="<?php echo $rate->rt_id; ?>" name="rateT" placeholder="rate type ">
                                                        <input type="text" class="form-control" id="lrate<?php echo $i . $j; ?>" name="lrate" placeholder="Lending rate ">
                                                        <input type="text" class="form-control" id="brate<?php echo $i . $j; ?>" name="brate" placeholder="Borrowing rate ">
                                                        <?php //echo CHtml::checkbox("specialrates".$i . $j,array('id'=>'specialrates'. $i . $j,'checked'=>false, 'name'=>'specialrates'. $i . $j, 'value'=>0,'onClick'=>'alert("hi");'));?>
                                                        <!--<label>Special Rates?</label>-->
                                                        <input type="hidden" value=0 id="state<?php echo $i . $j; ?>">

                                                        <label><input value='<?php echo $i . $j; ?>' type="checkbox" id="specialrates<?php echo $i . $j; ?>" name="specialrates<?php echo $i . $j; ?>" onclick="switcher(this.value)"> 
                                                            <script>
            function switcher(id) {
                //alert(id);
                if (document.getElementById('state' + id).value == 1) {
                    document.getElementById('state' + id).value = 0;
                }
                else {
                    document.getElementById('state' + id).value = 1;
                }
            }
                                                            </script>
                                                            Special Rates?</label>
                                                        <input type="hidden" class="form-control" id="term<?php echo $i . $j; ?>" name="term" value="<?php echo $term->term_id; ?>" placeholder="Term"><!--This will automatically be populated from the options-->
                                                        <input type="text" class="form-control" id="minamount<?php echo $i . $j; ?>" name="minamount" placeholder="Minimum amt ">
                                                        <input type="text" class="form-control" id="scharges<?php echo $i . $j; ?>" name="scharges" placeholder="Setup charges ">
                                                        <input type="text" class="form-control" id="ofees<?php echo $i . $j; ?>" name="ofees" placeholder="Other fees ">
                                                        <button type="submit" value="<?php echo $i . $j; ?>" id="<?php echo $i . $j; ?>" class="btn btn-primary" onclick="event.preventDefault();
                saverate(this.value)">Save</button>
                                                    </div>   
                                                    <br>
                                                    <?php
                                                    $j++;
                                                }
                                                ?>
                                            </div>
                                        </form>
                                        <br>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Collapsible Group Item #3</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->


</div>

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
                        Configuration data has been saved successfully
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
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
<script>
    $(document).ready(function() {
    });
    function saverate(button) {
        var institution = document.getElementById("institution" + button).value;
        var rateT = document.getElementById("rateT" + button).value;
        var lrate = document.getElementById("lrate" + button).value;
        var brate = document.getElementById("brate" + button).value;
        var specialrates = document.getElementById("state" + button).value;//document.getElementById("specialrates"+button).value;
        var term = document.getElementById("term" + button).value;
        var minamount = document.getElementById("minamount" + button).value;
        var scharges = document.getElementById("scharges" + button).value;
        var ofees = document.getElementById("ofees" + button).value;
        //           alert(scharges);
        if (lrate === '') {
            alert("Error: The rate must be stated. Please refill the form!");
        }
        else {
            $.ajax({
                type: "GET",
                url: "http://localhost/bankafrica1/index.php?r=business/default/addrate" +
                        "&institution=" + institution +
                        "&rateT=" + rateT +
                        "&lrate=" + lrate +
                        "&brate=" + brate +
                        "&specialrates=" + specialrates +
                        "&term=" + term +
                        "&minamount=" + minamount +
                        "&scharges=" + scharges +
                        "&ofees=" + ofees,
                data: "", //ProposedSites
                cache: false,
                success: function(data) {
                    if (data == 'true') {
                        $('#sModal').modal('show');
                        setTimeout(function() {
                            location.reload();
                            ;
                        }, 500);
                    } else {
                        alert(data + "Failure: Data Could Not Be Saved. Try Again.");
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
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataTables-examplea').DataTable({
            responsive: true
        });
    });
</script>