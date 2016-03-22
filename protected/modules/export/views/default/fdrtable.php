<?php
$banklogged = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
foreach ($banklogged as $bankl)
    ;
?><!-- /.panel-heading -->
<h1>
    <?php
    echo Yii::app()->user->name;
    ?>
    Fixed Rate Deposit Rates
</h1>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Fixed Deposit Rates
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th> Bank</th>
                                    <th>Minimum</th>
                                    <?php foreach ($terms as $tterm) { ?>
                                        <th><div class="tooltip-demo"> <label data-toggle="tooltip" data-placement="top" title="<?php echo $tterm->term_duration ?>"><?php echo $tterm->term_name; ?>
                                    </label >  </div></th>
                            <?php } ?>
                            <th>Special Rates?</th>
                            <th>Fees</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $bankprofile = Evprof::model()->findAll('lib=:x', array(':x' => 'Bank'));
                                foreach ($bankprofile as $bankprof)
                                    ;
                                $surveyusers = Evuti::model()->findAll('pro=:x', array(':x' => $bankprof->id));
                                foreach ($surveyusers as $susers) {

                                    $types = RateTypes::model()->findAll('rt_name=:a or rt_name=:b', array(':a' => 'Fixed Deposit Rates', 'b' => 'Fixed Deposits'));
                                    foreach ($types as $type)
                                        ;
                                    $bankrates = InstitutionsQuotation::model()->findAll('quotation_id=:x and institution_id=:y', array(':x' => $type->rt_id, ':y' => $susers->id));
                                    if (count($bankrates) == 0) {
                                        $nusers = Bqcus::model()->findAll('cus=:x', array(':x' => $susers->id));
                                        foreach ($nusers as $nuser)
                                            ;
                                        echo "<tr class='odd gradeX'><td>" . $nuser->resnam . "</td>";
                                        ?>
                                    <td>-</td>
                                    <?php
                                    foreach ($terms as $term) {
                                        echo "<td><div class='tooltip-demo'><div data-toggle='tooltip' data-placement='top' title='This value has not been set'>NA</div><div></td>";
                                    }
                                } else {
                                    rsort($bankrates);
                                    $bankrate = current($bankrates);
                                    echo "<tr class='odd gradeX'>";
                                    $users = Bqcus::model()->findAll('cus=:x', array(':x' => $bankrate->institution_id));
                                    //      echo $user->resnam;
                                    foreach ($users as $user)
                                        ;
                                    echo "<td>" . $user->resnam . "</td>";
                                    echo "<td>" . current($bankrates)->minimum_amount . "</td>";
                                    ?>
                                    <?php
                                    foreach ($terms as $term1) {
                                        $instrates = InstitutionsQuotation::model()->findAll('quotation_id=:x and term_id=:y and institution_id=:z', array(':x' => $type->rt_id, ':y' => $term1->term_id, ':z' => $bankrate->institution_id));
                                        //      echo count($instrates);
                                        //        exit;
                                        rsort($instrates);
                                        if (count($instrates) == 0) {
                                            echo "<td><div class='tooltip-demo'><div data-toggle='tooltip' data-placement='top' title='This value has not been set'>NA</div><div></td>";
                                        } else {
                                            ?>
                                            <td><div class="tooltip-demo">
                                                    <label type="label" data-html="true" class="" data-toggle="tooltip" data-placement="top" title="Click to send your request &#013;
                                                           Special rate: <?php
                                                           if (current($instrates)->special_rate == 0)
                                                               echo "No<br>";
                                                           if (current($instrates)->special_rate == 1)
                                                               echo "Yes<br>";
                                                           ?>
                                                           Minimum amount:<?php
                                                           if (current($instrates)->minimum_amount == '')
                                                               echo "0";
                                                           else
                                                               echo current($instrates)->minimum_amount;
                                                           ?><br>
                                                           Setup Charges:<?php
                                                           if (current($instrates)->setup_charges == '')
                                                               echo '0';
                                                           else
                                                               echo current($instrates)->setup_charges;
                                                           ?> <br>
                                                           Other Fees: <?php
                                                           if (current($instrates)->other_fees == '')
                                                               echo '0';
                                                           else
                                                               echo current($instrates)->other_fees;
                                                           ?><br>

                                                           " value="<?php echo current($instrates)->institutions_quotation_id; ?>" 
                                                           onclick="loadform(<?php echo current($instrates)->lrate . ",'" . $user->resnam . "','" . $term1->term_name . "','" . $user->cus . "'," . current($instrates)->institutions_quotation_id . ",'" . $bankl->id . "'"; ?>)" >
                                                               <?php echo current($instrates)->lrate . " %" ?>
                                                    </label>
                                                </div>
                                            </td>
                                            <!--                                
                                                                            <td><div class="tooltip-demo"><label data-toggle="tooltip" data-placement="top" title="Click to send a request" 
                                                                                                                         onclick="loadform(<?php echo current($instrates)->lrate . ",'" . $user->resnam . "','" . $term1->term_name . "','" . $user->cus . "'," . current($instrates)->institutions_quotation_id . ",'" . $bankl->cdos . "'"; ?>);">                                                                  
                                            <?php echo current($instrates)->lrate; ?></label></div></td>
                                            -->
                                            <?php
                                        }
                                        unset($instrates);
                                    }
                                }
                                if ($bankrate->special_rate == 0)
                                    echo "<td> NO</td>";
                                if ($bankrate->special_rate == 1)
                                    echo "<td> YES</td>";
                                if (count($bankrates) != 0) {
                                    echo "<td>" . $bankrate->other_fees . "</td>";
                                }
                                else
                                    echo "<td>-</td>";
                                $i++;

                                echo "</tr>";
                                unset($bankrates);
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
            </div>    
        </div>
    </div>
</div>

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

                                               function loadform(depositrate, bankname, term, userid, id, loggedbankid) {
                                                   var msg = bankname + " @ " + depositrate + "  " + term + " Deposit Rate";
                                                   document.getElementById("theTitle").value = msg;
                                                   document.getElementById("customer").value = loggedbankid;
                                                   document.getElementById("prate").value = depositrate;
                                                   document.getElementById("amount").value = '';
                                                   document.getElementById("dbank").value = userid;
                                                   document.getElementById("rateid").value = id;
                                                   if (loggedbankid === '') {
                                                       alert("You must login in order to perform this action");
                                                       window.location = 'index.php?r=site/login';
                                                   }
                                                   else {
                                                       if (loggedbankid === userid)
                                                           alert("You cannot make a deposit to yourself. Please choose some other bank.");
                                                       else
                                                           $('#formModal').modal('show');

                                                   }
                                               }
                                               function sendrequest() {
                                                   var customer = document.getElementById("customer").value;
                                                   var prate = document.getElementById("prate").value;
                                                   var amount = document.getElementById("amount").value;
                                                   var dbank = document.getElementById("dbank").value;//document.getElementById("specialrates"+button).value;
                                                   var rateid = document.getElementById("rateid").value;
                                                   if (document.getElementById("bankacc").value === 'No')
                                                       var bankacc = 0;
                                                   else
                                                       var bankacc = 1;

                                                   if (amount === '') {
                                                       alert("Error: The amount you wish to deposit cannot be nothing!");
                                                   }
                                                   else {
                                                       $.ajax({
                                                           type: "GET",
                                                           url: "http://localhost/bankafrica1/index.php?r=fdr/default/propose" + "&customer=" + customer +
                                                                   "&amount=" + amount +
                                                                   "&rate=" + rateid +
                                                                   "&dbank=" + dbank +
                                                                   "&bankacc=" + bankacc +
                                                                   "&prate=" + prate

                                                                   ,
                                                           data: "", //ProposedSites
                                                           cache: false,
                                                           success: function(data) {
                                                               if (data == 'true') {
                                                                   $('#loadform').modal('hide');

                                                                   $('#msg').html(" Your request has been sent successfully");

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
