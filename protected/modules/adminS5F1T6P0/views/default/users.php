
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Profile</th>
                            <th>Account state</th>
                            <th>(De)Activate</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach (Evuti::model()->findAll() as $user) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <?php   ?>
                                <td><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $user->id)))->resnam ?></td>
                                <td><?php echo Evprof::model()->findByPk($user->pro)->lib; ?></td>
                                <td><?php
                                    if ($user->user_status == 0)
                                        echo "Inactive";
                                    else
                                        echo "Active";
                                    ?></td>
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'class-council-form',
                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // There is a call to performAjaxValidation() commented in generated controller code.
                                    // See class documentation of CActiveForm for details on this.
                                    'enableAjaxValidation' => true,
                                    'action' => Yii::app()->request->baseUrl . '/index.php',
                                ));
                                ?>

                                <td><?php echo $form->dropDownList($user, 'user_status', array('1' => 'Activate', '0' => 'Deactivate'), array('id' => 'value' . $user->id, 'style' =>'color:black', 'onchange' => 'changestate(' . $user->id . ')')); ?></td>
                                <?php $this->endWidget(); ?>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
                   <input class="form-control" type="hidden"   value="<?php // echo Yii::app()->request->base ;  ?>" name="url" id="url" autofocus>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <fieldset>
            <div class="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Account activated</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> 
                                Account state saved
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                                $('#dataTables-example1').DataTable({
                                    responsive: true
                                });
                            });

                            function changestate(id) {
                     //           alert(id);
                                var statevalue = document.getElementById("value" + id).value;
//alert(statevalue);
                                $.ajax({
                                    type: "GET",
                                    url: "http://"+document.getElementById('url').value+"/"+document.getElementById("base").value+ "/index.php?r=adminS5F1T6P0/default/manageusers" +
                                            "&id=" + id +
                                            "&statevalue=" + statevalue,
                                    data: "", //ProposedSites
                                    cache: false,
                                    success: function(data) {
                                        //              alert(data);
                                        if (data == 'true') {
                                            $('#sModal').modal('show');
                                        }
                                        else if (data == 'false') {
                                            alert("Failure: Data Could Not Be Saved. Try Again.");
                                        }
                                    },
                                    error: function(data) {
                                        alert("Error Sending Data.");
                                    }
                                });


                            }

</script>