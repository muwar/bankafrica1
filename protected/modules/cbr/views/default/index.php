<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Commercial Borrowing Rates
                    </h4>
                </div>

                <?php
                $banklogged = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
                foreach ($banklogged as $bankl)
                    ;
                ?><!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <button class="btn  btn-success btn1" id="button">Export</button>

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th> Bank</th>
                                    <th>Minimum</th>
                                    <?php foreach ($terms as $tterm) { ?>
                                        <th>
                                <div class="tooltip-demo"> 
                                    <label data-toggle="tooltip" data-placement="top" title="<?php echo $tterm->term_duration ?>"><?php echo $tterm->term_name; ?>
                                    </label >  
                                </div>
                                </th>
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

                                    $types = RateTypes::model()->findAll('rt_name=:a or rt_name=:b', array(':a' => 'Commercial Borrowing Rates', 'b' => 'Commercial Borrowing'));
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
                                            <?php if (Yii::app()->user->name == 'admin') { ?>
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
                                                               >
                                                                   <?php echo current($instrates)->lrate . " %" ?>
                                                        </label>
                                                    </div>
                                                </td>
                                                <?php
                                            }
                                            else {
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
                                            <?php
                                        }
                                        }
                                        unset($instrates);
                                    }
                                }
                                if(count($bankrates)==0){  ?>
                                 <td>- </td>   
                                 <td>-</td>
                         <?php       }
                                else{
                                if ($bankrate->special_rate == 0)
                                    echo "<td> NO</td>";
                                if ($bankrate->special_rate == 1)
                                    echo "<td> YES</td>";
                                if (count($bankrates) != 0) {
                                    echo "<td>" . $bankrate->other_fees . "</td>";
                                }
                                else{
                                    echo "<td>-</td>";

                                }
                                }
                                echo "</tr>";
                                unset($bankrates);
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <div class="panel-footer">
                    Commercial Borrowing Rates
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
                <h4 class="modal-title" align="center"><input id="theTitle" type="text" readonly style="-webkit-appearance: none; border:none;width:100%; "></input></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <fieldset>
                        <p align="center">
                            <input class="form-control" style="width:400px;" placeholder="Name of Customer" name="customer" id="customer" type="hidden" >

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Proposed Rate</label>
                            <div class="col-sm-9">
                                <input class="form-control" style='border-radius: 0px 10px 0px 10px;' placeholder="Proposed Rate" name="prate" id="prate" type="text" value="" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Amount</label>
                            <div class="col-sm-9">
                                <input class="form-control" style='border-radius: 0px 10px 0px 10px;' placeholder="Amount" name="amount" id="amount" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-8 control-label">Do you have an account with this bank?</label>&nbsp;&nbsp;
                            <div class="col-sm-4">
                                <select name="bankacc" id="bankacc" style='border-radius: 0px 10px 0px 10px;'>
                                    <option>Yes</option>
                                    <option selected="selected">No</option>

                                </select>
                                <!--<input class="form-control" type="checkbox" style="width:400px;" name="bankacc" id="bankacc"> -->
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="tooltip-demo">
                                <label class="col-sm-3 control-label" >Value Date</label>
                                <div class="col-sm-9">
                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'attribute' => 'vdate',
                                        'model' => $model,
                                        'options' => array(
                                            'showAnim' => 'fold',
                                            'dateFormat' => 'yy-mm-dd',
                                            'changeMonth' => true,
                                            'changeYear' => true,
                                            'yearRange' => '1800:2100'
                                        ),
                                        'htmlOptions' => array(
                                            'style' => 'height:30px;border-radius: 0px 10px 0px 10px;width:417px;',
                                            'id' => 'vdate',
                                            'placeholder' => 'Date',
                                            'data-toggle' => 'tooltip',
                                            'data-placement' => 'right',
                                            'title' => 'Earliest date on which you expect the transaction to go through?',
                                            'class' => 'form-control',
                                        ),
                                    ));
                                    ?><!--<input class="form-control" style="border-radius: 5px 10px 5px 10px;width:400px;" placeholder="Value Date (yyyy-mm-dd)" name="vdate" id="lvdate" type="text" value="" data-toggle="tooltip" data-placement="right" title="From what date is this request valid?"> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="tooltip-demo">
                                <label class="col-sm-3 control-label" >Expire Date</label>
                                <div class="col-sm-9">
                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'attribute' => 'edate',
                                        'model' => $model,
                                        'options' => array(
                                            'showAnim' => 'fold',
                                            'dateFormat' => 'yy-mm-dd',
                                            'changeMonth' => true,
                                            'changeYear' => true,
                                            'yearRange' => '1800:2100'
                                        ),
                                        'htmlOptions' => array(
                                            'style' => 'height:30px;border-radius: 0px 10px 0px 10px;width:417px;',
                                            'id' => 'edate',
                                            'placeholder' => 'Date',
                                            'data-toggle' => 'tooltip',
                                            'data-placement' => 'right',
                                            'title' => 'On what date does this request become invalid?',
                                            'class' => 'form-control',
                                        ),
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <input class="form-control" style="width:400px;" placeholder="Lending Bank" name="dbank" id="dbank" type="hidden" value="">
                        <input class="form-control" type="hidden" style="width:400px;" id="rateid"><!--      This holds the rate id         -->
                        </p>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer"><p align="center">
                    <button style='border-radius: 0px 10px 0px 10px;' type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <button style='border-radius: 0px 10px 0px 10px;' type="submit" onclick="event.preventDefault();
                                                                       sendrequest();" class="btn btn-primary">Send Request</button></p>
            </div>
        </div>
    </div>
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
                    <div class="modal-body" id="msg">

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

    function loadform(depositrate, bankname, term, userid, id, loggedbankid) {
        var msg = bankname + " @ " + depositrate + "  " + term + " Commercial Borrowing Rate";
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
                alert("You cannot make a Take a loan from yourself. Please choose some other bank.");
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
        var edate = document.getElementById("edate").value;
        var vdate = document.getElementById("vdate").value;
        if (document.getElementById("bankacc").value === 'No')
            var bankacc = 0;
        else
            var bankacc = 1;
        //  alert(vdate);
        //               alert(edate);                                              
        if (amount === '') {
            alert("Error: The amount must be stated, Please refill the form.");
        }
        else {
            $.ajax({
                type: "GET",
                url: "http://" + document.getElementById('url').value + "/bankafrica1/index.php?r=cbr/default/propose" + "&customer=" + customer +
                        "&amount=" + amount +
                        "&rate=" + rateid +
                        "&vdate=" + vdate +
                        "&edate=" + edate +
                        "&dbank=" + dbank +
                        "&bankacc=" + bankacc +
                        "&prate=" + prate

                        ,
                data: "", //ProposedSites
                cache: false,
                success: function(data) {
                    if (data == 'true') {
                        $('#msg').html(" Your request has been sent successfully");
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
