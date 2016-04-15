<style>
#button{
	position:absolute;
	top:13.5%;
	left:45%;
}
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Securities Trading
                    </h4>
                </div>

                <?php
                $loggedusers = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
                $loggeduser = current($loggedusers);
                ?><!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                         <button class="btn  btn-success btn1" id="button">Export</button>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%;overflow:hidden">
                            <thead>
                                <tr>
                                    <th> Type</th>
                                    <th>Issuer</th>
                                    <th>Qty</th>
                                    <th>Issue Date</th>
                                    <th>Maturity Date</th>
                                    <th>Face Value</th>
                                    <th>Return rate</th>
                                    <th>Discount</th>
                                    <th>Price</th>
                                    <th>Biddable? </th>
                                    <th>Contact Us</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($secrecords as $sec) {
                                    ?>
                                    <tr >
                                        <td><?php echo SecurityTypes::model()->findByPk($sec->sectype)->name; ?></td>
                                        <td><?php echo $sec->issuer; ?></td>
                                        <td><?php echo $sec->qty; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($sec->issuedate)); ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($sec->matdate)); ?></td>
                                        <td>
                                            <?php echo $sec->facevalue . " " . $sec->currency; ?>
                                        </td>
                                        <td><?php echo $sec->return_rate; ?></td>
                                        <td><?php echo $sec->discount . " %"; ?></td>
                                        <td><?php echo ($sec->facevalue - ($sec->discount / 100) * $sec->facevalue) . " " . $sec->currency; ?></td>                               
                                        <td><?php
                                            if ($sec->biddable == 1) {
                                                echo 'Yes';
                                            } else {
                                                echo 'No';
                                            }
                                            ?></td>
                                        <td class="tooltip-demo">
                                            <?php  if(Yii::app()->user->name=='admin'){ ?>
                                                <label  data-toggle="tooltip" data-placement="top" title="Click to Bid for this security">
                                                    Contact Us
                                                </label>
                                            <?php }
                                            else{
                                            ?>
											<label  data-toggle="tooltip" data-placement="top" title="Click to Bid for this security" onclick="contactus(<?php echo $sec->id . "," . $loggeduser->id . "," . $sec->owner; ?>)">
												Contact Us
											</label>
                                            <?php  } ?>
                                        </td>
                                    </tr>
                                <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <div class="panel-footer">
                    Securities Trading
                </div>
            </div>    
        </div>
    </div>
</div>
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" align="center">Security Buyer's Form</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">                
                    <fieldset>
                        <p align="center">
                        <div class="form-group">
                            <div class="tooltip-demo">
                                <label  class="col-sm-4 control-label" >Proposed Discount rate</label>
                                <div class="col-sm-8">
                                    <input style='border-radius: 0px 10px 0px 10px;' data-toggle="tooltip" data-placement="top" title="What discount rate do you propose?" class="form-control" placeholder="XXX %" name="discount" id="discount" type="text" value="" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" style="width:400px;" id="idd"><!--      This holds the rate id         -->
                            <input class="form-control" type="hidden" style="width:400px;" id="user">
                        </div>
                        </p>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer"><p align="center">
                    <button style='border-radius: 0px 10px 0px 10px;' type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button style='border-radius: 0px 10px 0px 10px;' type="submit" onclick="event.preventDefault();
                                                        sendrequest();" class="btn btn-primary">Send</button></p>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="cformModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" align="center">Contact Form</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">                
                    <fieldset>
                        <p align="center">
                        <p align='center'>
                            If this security interests you, contact us for preliminary information on the purchase procedure. Or email us directly at <<<
                        </p>
                        <hr>
                        <p align='center'> Please leave us your contact and any message</p>
                        <hr>
                        <div class="form-group">
                            <div class="tooltip-demo">
                                <label class="col-sm-4 control-label">Name</label>
                                <div class="col-sm-8">
                                    <input data-toggle="tooltip" data-placement="top" title="Your name; if it's different from that used for signup" class="form-control" style='border-radius: 0px 10px 0px 10px;' placeholder="Name" name="name" id="name" type="text" value="" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="tooltip-demo">
                                <label class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input data-toggle="tooltip" data-placement="top" title="Your email; if it's different from that used for signup" class="form-control" style='border-radius: 0px 10px 0px 10px;' placeholder="Email" name="email" id="email" type="text" value="" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="tooltip-demo">
                                <label class="col-sm-4 control-label">Tel</label>
                                <div class="col-sm-8">
                                    <input data-toggle="tooltip" data-placement="top" title="Your telephone contact; it's different from that used for signup" class="form-control" style='border-radius: 0px 10px 0px 10px;' placeholder="Telephone" name="tel" id="tel" type="text" value="" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="tooltip-demo">
                                <label class="col-sm-4 control-label">address</label>
                                <div class="col-sm-8">
                                    <textarea data-toggle="tooltip" data-placement="top" title="Your name; if it's different from that used for signup" class="form-control" style='border-radius: 0px 10px 0px 10px;' placeholder="Address" name="address ..." id="address" type="text" value="" autofocus></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="tooltip-demo">
                                <label class="col-sm-4 control-label">Message</label>
                                <div class="col-sm-8">
                                    <textarea data-toggle="tooltip" data-placement="top" title="Leave us your message" class="form-control" style='border-radius: 0px 10px 0px 10px;' placeholder="Message ... " name="msg" id="msg" type="text" value="" autofocus></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" style="width:400px;" id="idd"><!--      This holds the rate id         -->
                            <input class="form-control" type="hidden" style="width:400px;" id="user">
                        </div>
                        </p>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer"><p align="center">
                    <button style='border-radius: 0px 10px 0px 10px;' type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button style='border-radius: 0px 10px 0px 10px;' type="submit" onclick="event.preventDefault();
                                                        secinterest();" class="btn btn-primary">Send</button></p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="sModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <fieldset>
            <div class="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">SUCCESS!!!</h4>
                    </div>
                    <div class="modal-body" id="msg">
                        Your interest in this security has been noted. More information will be communicated to you.
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
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/raphael/raphael-min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/dist/js/sb-admin-2.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.table2excel.js"></script>
<script>
                                                                   $(function() {
                                                                       $("#button").click(function() {
                                                                           $("#dataTables-example").table2excel({
                                                                               exclude: ".noExl",
                                                                               name: "Table of Rates"
                                                                           });
                                                                       });
                                                                   });

</script>
<script>

                                                    function loadform(id, user, owner) {
                                                        document.getElementById("user").value = user;
                                                        document.getElementById("idd").value = id;
                                                        if (user == owner)
                                                            alert('You cannot buy a security from yourself');
                                                        else {
                                                            if (user === '') {
                                                                alert("You must login in order to perform this action");
                                                                window.location = 'index.php?r=site/login';
                                                            } else
                                                                $('#formModal').modal('show');
                                                        }
                                                    }
                                                    function contactus(id, user, owner) {
                                                        document.getElementById("user").value = user;
                                                        document.getElementById("idd").value = id;
                                                        if (user == owner)
                                                            alert('You cannot buy a security from yourself');
                                                        else {
                                                            if (user === '') {
                                                                alert("You must login in order to perform this action");
                                                                window.location = 'index.php?r=site/login';
                                                            } else
                                                                $('#cformModal').modal('show');
                                                        }
                                                    }

                                                    function sendrequest() {
                                                        var discount = document.getElementById("discount").value;
                                                        var user = document.getElementById("user").value;
                                                        var idd = document.getElementById("idd").value;
                                                        //   alert(discount);
                                                        if (discount === '') {
                                                            alert("Error: You may not be allowed to propose a blank discount. Please review your form and resubmit!");
                                                        }
                                                        else {
                                                            $.ajax({
                                                                type: "GET",
                                                                url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=st/default/buysec" +
                                                                        "&discount=" + discount +
                                                                        "&user=" + user +
                                                                        "&id=" + idd
                                                                        ,
                                                                data: "", //ProposedSites
                                                                cache: false,
                                                                success: function(data) {
                                                                    if (data == 'true') {
                                                                        $('#msg').html(" Your interest to buy this security has been noted. You will be linked to the security owner to continue this transaction");
                                                                        $('#formModal').modal('hide');
                                                                        $('#sModal').modal('show');
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

                                                    function secinterest() {
//                                                        var discount = document.getElementById("discount").value;
                                                        var name = document.getElementById("name").value;
                                                        var email = document.getElementById("email").value;
                                                        var tel = document.getElementById("tel").value;
                                                        var address = document.getElementById("address").value;
                                                        var msg = document.getElementById("msg").value;
                                                        var user = document.getElementById("user").value;
                                                        var idd = document.getElementById("idd").value;
                                                        //   alert(discount);
                                                 //       alert(msg);
                                                        $.ajax({
                                                            type: "GET",
                                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=st/default/seccontact" +
                                                                    "&name=" + name +
                                                                    "&email=" + email +
                                                                    "&tel=" + tel +
                                                                    "&address=" + address +
                                                                    "&msg=" + msg +
                                                                    "&user=" + user +
                                                                    "&id=" + idd
                                                                    ,
                                                            data: "", //ProposedSites
                                                            cache: false,
                                                            success: function(data) {
                                                                if (data == 'true') {
                                                   //                 alert(data);
                                                                    $('#msg').html(" Your interest to buy this security has been noted. You will be linked to the security owner to continue this transaction");
                                                                    $('#cformModal').modal('hide');
                                                                    $('#sModal').modal('show');
                                                                } else {
                                                                    alert(data + "Failure: Data Could Not Be Saved. Try Again.");
                                                                }
                                                            },
                                                            error: function(data) {
                                                                alert("Error Sending Data.");
                                                            }
                                                        });
                                                    }

                                                    $(document).ready(function() {
                                                        $('#dataTables-example').DataTable({
                                                            responsive: true
                                                        });
                                                    });
                                                    $(document).ready(function() {
                                                        $('#dataTables-examplea').DataTable({
                                                            responsive: true
                                                        });
                                                    });
                                                    $('.tooltip-demo').tooltip({
                                                        selector: "[data-toggle=tooltip]",
                                                        container: "body"
                                                    })

                                                    $("[data-toggle=popover]")
                                                            .popover()
</script>
