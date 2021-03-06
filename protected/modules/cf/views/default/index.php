<?php
$this->beginWidget('application.extensions.sidebar.Sidebar', array('title' => 'Corporate Finance - How to', 'collapsed' => true, 'position'=>'right'));
?>
<ul>
<i>Entrepreneurs</i>
<li>Enter and submit the following information;</li>
<ul>
<li>Company's profile alongside all relevant information as requested</li>
<li>Summary of investment project (background, main operations, financials, projections</li>
<li>Investment needs of your company</li>
</ul>
<li>Submitted information will be reviewed and published for all potential investors to access</li>
<li>You will hear from us once an investor is interested in your company or venture
</li>
<i>Investors</i>
<li>Review all published investment opportunities
<li>Indicate your interest on any particular investment by submitting an investor request form
<li>Africapital quote will get back to you, with more details about the opportunity.

</ul>
<?php
$this->endWidget();
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                                           <?php   if(Yii::app()->session['country_chosen'] =='' ){ ?>

                        AFRICAPITAL QUOTE>><< CORPORATE FINANCE (CF)                                       QUOTES                                                                          <?php
?>
                                              
<?php }else{ $country=Countries::model()->findByPk(Yii::app()->session['country_chosen']);
 ?>
<label class="flag flag-<?php echo strtolower($country->iso_alpha2);?>" align="right"></label> 
 AFRICAPITAL QUOTE>><?php  echo $country->name ?><< CORPORATE FINANCE (CF)                                                                                                                              <?php
  } ?>

                    </h4>
                </div>

                <?php
                $loggedusers = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
                $loggeduser = current($loggedusers);
                ?><!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                    <h3 align="center"><button class="btn  btn-success btn1" id="button">Export to excel</button> </h3>

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Investment Opportunity</th>
                                    <th>Executive Summary</th>
                                    <th>Investment need</th>
                                    <th>Investment Type</th>
                                    <th>Contact us</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cfrecords as $cf) {
                                    if(Yii::app()->session['country_chosen']==''){
;
                                    }
                                    else{
                                    $user_test=Evuti::model()->findByPk($cf->user);
                                    if($user_test->country_id==Yii::app()->session['country_chosen']){
                                        ;
                                    }
                                    else{
                                        continue;
                                    }
                                }

                                 ?>
                                    <tr >
                                        <td><?php echo $cf->project_name; ?></td>
                                        <td>
                                            <?php
                                            if ($cf->executive_summary == '')
                                                echo $cf->exec_sum_valid;
                                            else {
                                                echo $cf->executive_summary;
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $cf->investment_need; ?></td>
                                        <td><?php echo InvestmentType::model()->findByPk($cf->investment_type)->name; ?></td>
                                        <td>
                                            <?php if (Yii::app()->user->name == 'admin') { ?>
                                                <div class="tooltip-demo">
                                                    <label  data-toggle="tooltip" data-placement="top" title="Click to invest">
                                                        contact us                                                
                                                    </label>
                                                </div>
                                            <?php } else {
                                                ?>
                                                <div class="tooltip-demo">
                                                    <label  data-toggle="tooltip" data-placement="top" title="Click to invest" onclick="contactus(<?php echo $cf->id . "," . $loggeduser->id . ',' . $cf->company_id; ?>)">
                                                        contact us                                                
                                                    </label>
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?> </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <div class="panel-footer">
                    Corporate Finance
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
                <h4 class="modal-title" align="center">Express interest in this project</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <fieldset>
                        <p align="center">
                        <div class="form-group">
                            <div class="tooltip-demo">
                                <label class="col-sm-4 control-label">Worth of investment</label>
                                <div class="col-sm-8">
                                    <input data-toggle="tooltip" data-placement="top" title="How Much can you contribute to this project?" class="form-control" style='border-radius: 0px 10px 0px 10px;' placeholder="XXXFCFA" name="amount" id="amount" type="text" value="" autofocus>
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
                <h4 class="modal-title" align="center">Express interest in this project</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <fieldset>
                        <p align="center">
                        <p align='center'>
                            If this investment opportunity interests you, contact us for preliminary information on any possible participation. Or email us directly at <<<
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
                                                            contactinterest();" class="btn btn-primary">Send</button></p>
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
                        Your interest in this project has been noted. More information will be communicated to you.
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
                                                        function contactus(id, user, owner) {
                                                            document.getElementById("user").value = user;
                                                            document.getElementById("idd").value = id;
                                                            if (owner == user) {
                                                                alert("You are not allowed to invest in your project this way");
                                                            }
                                                            else {
                                                                if (user === '') {
                                                                    alert("You must login in order to perform this action");
                                                                    window.location = 'index.php?r=site/login';
                                                                } else
                                                                    $('#cformModal').modal('show');
                                                            }
                                                        }

                                                        function loadform(id, user, owner) {
                                                            document.getElementById("user").value = user;
                                                            document.getElementById("idd").value = id;
                                                            if (owner == user) {
                                                                alert("You are not allowed to invest in your project this way");
                                                            }
                                                            else {
                                                                if (user === '') {
                                                                    alert("You must login in order to perform this action");
                                                                    window.location = 'index.php?r=site/login';
                                                                } else
                                                                    $('#formModal').modal('show');
                                                            }
                                                        }
                                                        function sendrequest() {
                                                            var amount = document.getElementById("amount").value;
                                                            var user = document.getElementById("user").value;
                                                            var idd = document.getElementById("idd").value;
                                                            if (amount === '') {
                                                                alert("Error: You may not be allowed to invest this amount to this project. Please review your form and resubmit!");
                                                            }
                                                            else {
                                                                $.ajax({
                                                                    type: "GET",
                                                                    url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+"/index.php?r=cf/default/invest" +
                                                                            "&amount=" + amount +
                                                                            "&user=" + user +
                                                                            "&id=" + idd
                                                                            ,
                                                                    data: "", //ProposedSites
                                                                    cache: false,
                                                                    success: function(data) {
                                                                        if (data == 'true') {
                                                                            $('#msg').html(" Your interest to sponsor this project has been noted. You will be communicated on how to participate in this project");
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

                                                        function contactinterest() {

                                                            //                           var amount = document.getElementById("amount").value;
                                                            var name = document.getElementById("name").value;
                                                            var email = document.getElementById("email").value;
                                                            var tel = document.getElementById("tel").value;
                                                            var address = document.getElementById("address").value;
                                                            var msg = document.getElementById("msg").value;
                                                            var user = document.getElementById("user").value;
                                                            var idd = document.getElementById("idd").value;

                                                            $.ajax({
                                                                type: "GET",
                                                                url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+"/index.php?r=cf/default/investcontact" +
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
                                                                        $('#msg').html(" Your interest to sponsor this project has been noted. You will be communicated on how to participate in this project");
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
