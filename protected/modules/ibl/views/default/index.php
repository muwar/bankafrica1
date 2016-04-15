<style>
#button{
	position:absolute;
	top:14.5%;
	left:45%;
}
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <?php
            $banklogged = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
            $bankcus = Bqcus::model()->findAll('cus=:x', array(':x' => current($banklogged)->id));
            $bankl = current($banklogged);
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Inter-Bank Lending
                    </h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                       
                        <button class="btn  btn-success btn1" id="button">Export</button>

                        <table class="table table-striped table-bordered table-hover table2excel tableresults" id="dataTables-example1">
                            <thead>
                                <tr>
                                    <th rowspan='2'> Banks</th>
                                    <?php foreach ($terms as $tterm) { ?>
                                        <th colspan='2'><?php echo $tterm->term_name; ?></th>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <?php foreach ($terms as $tterm) { ?>
                                        <th><?php echo 'LR'; ?></th>
                                        <th><?php echo 'BR'; ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $bankprofile = Evprof::model()->findAll('lib=:x', array(':x' => 'Bank'));
                                $bankprof = current($bankprofile);
                                $surveyusers = Evuti::model()->findAll('pro=:x', array(':x' => $bankprof->id));

                                foreach ($surveyusers as $susers) {
                                    $types = RateTypes::model()->findAll('rt_name=:a or rt_name=:b', array(':a' => 'Inter-Bank Lending', ':b' => 'Inter-Bank Borrowing'));
                                    $bankrates = InstitutionsQuotation::model()->findAll('quotation_id=:x and institution_id=:y', array(':x' => current($types)->rt_id, ':y' => $susers->id));

                                    if (count($bankrates) == 0) {
                                        $nusers = Bqcus::model()->findAll('cus=:x', array(':x' => $susers->id));
                                        foreach ($nusers as $nuser)
                                            ;
                                        echo "<tr class='odd gradeX'><td>" . $nuser->resnam . "</td>";
                                        foreach ($terms as $term) {
                                            echo "<td><div class='tooltip-demo'><div data-toggle='tooltip' data-placement='top' title='This value has not been set'>NA</div><div></td>";
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

                                        foreach ($terms as $term1) {
                                            $lending = RateTypes::model()->findAll('rt_name=:x', array(':x' => 'Inter-Bank Lending'));
                                            $borrow = RateTypes::model()->findAll('rt_name=:x', array(':x' => 'Inter-Bank Borrowing'));
                                            $linstrates = InstitutionsQuotation::model()->findAll('institution_id=:x and term_id=:y and quotation_id=:z', array(':x' => $susers->id, ':y' => $term1->term_id, ':z' => current($lending)->rt_id));
                                            $binstrates = InstitutionsQuotation::model()->findAll('institution_id=:x and term_id=:y and quotation_id=:z', array(':x' => $susers->id, ':y' => $term1->term_id, ':z' => current($borrow)->rt_id));
                                            //        echo count($linstrates)."<br>";
                                            rsort($linstrates);
                                            rsort($binstrates);
                                            if (count($linstrates) == 0) {
                                                ?>
                                            <td><div class="tooltip-demo">
                                                    <label type="label" class="" data-toggle="tooltip" data-placement="top" title="This value has not been set" >
                                                        NA
                                                    </label>
                                                </div>
                                            </td>
                                            <?php
                                        } else {
                                            ?>
                                            <?php if (Yii::app()->user->name == 'admin') { ?>
                                                <td><div class="tooltip-demo">
                                                        <label type="label" data-html="true" class="" data-toggle="tooltip" data-placement="top" title="Click to send your request &#013;
                                                               Special rate: <?php
                            if (current($linstrates)->special_rate == 0)
                                echo "No<br>";
                            if (current($linstrates)->special_rate == 1)
                                echo "Yes<br>";
                                                ?>
                                                               Minimum amount:<?php
                                           if (current($linstrates)->minimum_amount == '')
                                               echo "0";
                                           else
                                               echo current($linstrates)->minimum_amount;
                                                ?><br>
                                                               Setup Charges:<?php
                                           if (current($linstrates)->setup_charges == '')
                                               echo '0';
                                           else
                                               echo current($linstrates)->setup_charges;
                                                ?> <br>
                                                               Other Fees: <?php
                                           if (current($linstrates)->other_fees == '')
                                               echo '0';
                                           else
                                               echo current($linstrates)->other_fees;
                                                ?><br>

                                                               " value="<?php echo current($linstrates)->institutions_quotation_id; ?>"  >
                                                                   <?php echo current($linstrates)->lrate . " %" ?>
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
                            if (current($linstrates)->special_rate == 0)
                                echo "No<br>";
                            if (current($linstrates)->special_rate == 1)
                                echo "Yes<br>";
                                                ?>
                                                               Minimum amount:<?php
                                           if (current($linstrates)->minimum_amount == '')
                                               echo "0";
                                           else
                                               echo current($linstrates)->minimum_amount;
                                                ?><br>
                                                               Setup Charges:<?php
                                           if (current($linstrates)->setup_charges == '')
                                               echo '0';
                                           else
                                               echo current($linstrates)->setup_charges;
                                                ?> <br>
                                                               Other Fees: <?php
                                           if (current($linstrates)->other_fees == '')
                                               echo '0';
                                           else
                                               echo current($linstrates)->other_fees;
                                                ?><br>

                                                               " value="<?php echo current($linstrates)->institutions_quotation_id; ?>" onclick="loadlform(<?php echo current($linstrates)->lrate . ",'" . $user->resnam . "','" . $term1->term_name . "','" . $user->cus . "'," . current($linstrates)->institutions_quotation_id . ",'" . $bankl->id . "'"; ?>)" >
                                                                   <?php echo current($linstrates)->lrate . " %" ?>
                                                        </label>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            <?php
                                        }
                                        if (count($binstrates) == 0) {
                                            ?>
                                            <td><div class="tooltip-demo">
                                                    <label type="label" class="" data-toggle="tooltip" data-placement="top" title="This value has not been set" >
                                                        NA
                                                    </label>
                                                </div>
                                            </td>
                                        <?php } else {
                                            ?>
                                            <?php if (Yii::app()->user->name == 'admin') { ?>
                                                <td><div class="tooltip-demo">
                                                        <label type="label" class="" data-html="true" data-toggle="tooltip" data-placement="top" title="Click to send your request
                                                               Special rate :&nbsp;<?php
                            if (current($binstrates)->special_rate == 0)
                                echo "No<br>";
                            if (current($binstrates)->special_rate == 1)
                                echo "Yes<br>";
                                                ?>
                                                               Minimum amount :&nbsp;<?php
                                           if (current($binstrates)->minimum_amount == '')
                                               echo "0";
                                           else
                                               echo current($binstrates)->minimum_amount;
                                                ?><br>
                                                               Setup Charges :&nbsp;<?php
                                           if (current($binstrates)->setup_charges == '')
                                               echo '0';
                                           else
                                               echo current($binstrates)->setup_charges;
                                                ?> <br>
                                                               Other Fees :&nbsp; <?php
                                           if (current($binstrates)->other_fees == '')
                                               echo '0';
                                           else
                                               echo current($binstrates)->other_fees;
                                                ?><br>
                                                               " value="<?php echo current($binstrates)->institutions_quotation_id; ?>" >
                                                                   <?php echo current($binstrates)->lrate . " %" ?>
                                                        </label>
                                                    </div>
                                                </td>
                                                <?php
                                            }
                                            else {
                                                ?>
                                                <td><div class="tooltip-demo">
                                                        <label type="label" class="" data-html="true" data-toggle="tooltip" data-placement="top" title="Click to send your request
                                                               Special rate :&nbsp;<?php
                            if (current($binstrates)->special_rate == 0)
                                echo "No<br>";
                            if (current($binstrates)->special_rate == 1)
                                echo "Yes<br>";
                                                ?>
                                                               Minimum amount :&nbsp;<?php
                                           if (current($binstrates)->minimum_amount == '')
                                               echo "0";
                                           else
                                               echo current($binstrates)->minimum_amount;
                                                ?><br>
                                                               Setup Charges :&nbsp;<?php
                                           if (current($binstrates)->setup_charges == '')
                                               echo '0';
                                           else
                                               echo current($binstrates)->setup_charges;
                                                ?> <br>
                                                               Other Fees :&nbsp; <?php
                                           if (current($binstrates)->other_fees == '')
                                               echo '0';
                                           else
                                               echo current($binstrates)->other_fees;
                                                ?><br>
                                                               " value="<?php echo current($binstrates)->institutions_quotation_id; ?>" onclick="loadbform(<?php echo current($binstrates)->lrate . ",'" . $user->resnam . "','" . $term1->term_name . "','" . $user->cus . "'," . current($binstrates)->institutions_quotation_id . ",'" . $bankl->id . "'"; ?>)">
                                                                   <?php echo current($binstrates)->lrate . " %" ?>
                                                        </label>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            <?php
                                        }
                                    }
                                }

                                unset($binstrates);
                                unset($linstrates);
                                unset($bankrates);
                            }
//               echo "<td>".CHtml::link('', array('#'), array('class' => 'fa fa-edit fa-2x', 'data-toggle' => 'modal', 'data-target' => '#editModal'))."</td>";
                            echo "</tr>";
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    Inter-Bank Lending
                </div>
            </div>    
        </div>
    </div>
</div>
<div class="modal fade" id="lformModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" align="center"><input id="thelTitle" type="text" readonly style="-webkit-appearance: none; border:none;width:100%; "></input></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <fieldset>
                        <p align="center">
                            &nbsp;&nbsp;<input class="form-control" style="border-radius: 5px 10px 5px 10px;width:400px;" placeholder="Borrowing  Bank" name="bbank" id="lbbank" type="hidden" >
                        <div class="form-group form-group-md">
                            <label class="col-sm-3 control-label" >Proposed rate (%)</label>
                            <div class="col-sm-9">
                                <input class="form-control" style='border-radius: 0px 10px 0px 10px;' type="text" placeholder="Proposed Rate" name="prate" id="lprate" type="text" value="" autofocus>
                            </div>
                        </div>
                        <div class="form-group form-group-md">
                            <label class="col-sm-3 control-label">Amount</label>
                            <div class="col-sm-9">
                                <input class="form-control" style='border-radius: 0px 10px 0px 10px;' type="text" placeholder="Amount" name="amount" id="lamount" type="text">
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
                                            'id' => 'lvdate',
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
                                            'id' => 'ledate',
                                            'placeholder' => 'Date',
                                            'data-toggle' => 'tooltip',
                                            'data-placement' => 'right',
                                            'title' => 'On what date does this request become invalid?',
                                            'class' => 'form-control',
                                        ),
                                    ));
                                    ?>
    <!--<input class="form-control" style="border-radius: 5px 10px 5px 10px;width:400px;" placeholder="Expiry Date (yyyy-mm-dd)" name="edate" id="ledate" type="text" value="" data-toggle="tooltip" data-placement="right" title="On what date does this request become invalid?">-->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <!--<label>Lending</label>-->&nbsp;&nbsp;<input class="form-control" style="border-radius: 5px 10px 5px 10px;width:400px;" placeholder="Lending Bank" name="lbank" id="llbank" type="hidden" value="">
                        </div>
                        <input class="form-control" type="hidden" style="border-radius: 5px 10px 5px 10px;width:400px;" id="lrateid"><!--      This holds the rate id         -->

                    </fieldset>
                </form>
            </div>
            <div class="modal-footer"><p align="center">
                    <button style='border-radius: 0px 10px 0px 10px;' type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button style='border-radius: 0px 10px 0px 10px;' type="submit" onclick="event.preventDefault();
                                                                       sendrequestl();" class="btn btn-primary">Send Request</button></p>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<div class="modal fade" id="bformModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" align="center"><input id="thebTitle" type="text" readonly style="-webkit-appearance: none; border:none;width:100%;"></input></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <fieldset>

                        <p align="center">
                            <!--                        <label>Borrowing Bank</label>-->&nbsp;&nbsp;<input class="form-control" style="width:400px;" placeholder="Borrowing  Bank" name="bbank" id="bbbank" type="hidden" >

                        <div class="form-group form-group-md">
                            <label class="col-sm-3 control-label" >Proposed rate (%)</label>
                            <div class="col-sm-9">
                                <input class="form-control" style='border-radius: 0px 10px 0px 10px;' type="text" placeholder="Proposed Rate" name="prate" id="bprate" type="text" value="" autofocus>
                            </div>
                        </div>
                        <div class="form-group form-group-md">
                            <label class="col-sm-3 control-label">Amount</label>
                            <div class="col-sm-9">
                                <input class="form-control" style='border-radius: 0px 10px 0px 10px;' type="text" placeholder="Amount" name="amount" id="bamount" type="text">
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
                                            'id' => 'bvdate',
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
                                            'id' => 'bedate',
                                            'placeholder' => 'Date',
                                            'data-toggle' => 'tooltip',
                                            'data-placement' => 'right',
                                            'title' => 'On what date does this request become invalid?',
                                            'class' => 'form-control',
                                        ),
                                    ));
                                    ?>
    <!--<input class="form-control" style="border-radius: 5px 10px 5px 10px;width:400px;" placeholder="Expiry Date (yyyy-mm-dd)" name="edate" id="ledate" type="text" value="" data-toggle="tooltip" data-placement="right" title="On what date does this request become invalid?">-->
                                </div>
                            </div>
                        </div>
                        <!--                        <label>Lending</label>-->&nbsp;&nbsp;<input class="form-control" style="width:400px;" placeholder="Lending Bank" name="bbank" id="blbank" type="hidden" value="">
                        <input class="form-control" style="width:400px;" id="brateid" type="hidden"><!--      This holds the rate id from InstitutionsQuotations        -->
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer"><p align="center">
                    <button style='border-radius: 0px 10px 0px 10px;' type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button style='border-radius: 0px 10px 0px 10px;' type="submit" onclick="event.preventDefault();
                                                                       sendrequestb();" class="btn btn-primary">Send Request</button></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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
                        Your request has been sent. You will be notified when it has been processed
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
                                                                           $("#dataTables-example1").table2excel({
                                                                               exclude: ".noExl",
                                                                               name: "Table of Rates"
                                                                           });
                                                                       });
                                                                   });

</script>

<script>
    $(document).ready(function() {
        $('#dataTables-example1').DataTable({
            responsive: true
        });
    });
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
            .popover()

    function closesuccessdialog() {
        setTimeout(function() {
            location.reload();
            ;
        }, 5);
    }

    function loadlform(lendingrate, bankname, term, userid, id, loggedbankid) {
        //        alert(loggedbankid);
        //      alert(userid);
        var msg = bankname + " @ " + lendingrate + "  " + term + " Lending Rate";
        document.getElementById("thelTitle").value = msg;
        document.getElementById("lbbank").value = loggedbankid;
        document.getElementById("lprate").value = lendingrate;
        document.getElementById("llbank").value = userid;
        document.getElementById("lrateid").value = id;
        if (loggedbankid === '') {
            alert("You must login in order to perform this action");
            window.location = 'index.php?r=site/login';
        }
        else {
            if (loggedbankid === userid)
                alert("You cannot lend form yourself.Please choose some other Bank");
            else
                $('#lformModal').modal('show');
        }
    }
    function loadbform(lendingrate, bankname, term, userid, id, loggedbankid) {
        var msg = bankname + " @ " + lendingrate + "  " + term + " Borrowing Rate";
        document.getElementById("thebTitle").value = msg;
        document.getElementById("bbbank").value = userid;
        document.getElementById("bprate").value = lendingrate;
        document.getElementById("blbank").value = loggedbankid;
        document.getElementById("brateid").value = id;
        if (loggedbankid == '') {
            alert("You must login in order to perform this action");
            window.location = 'index.php?r=site/login';
        }
        else {
            if (loggedbankid === userid)
                alert("You cannot Borrow form yourself.Please choose some other Bank");
            else
                $('#bformModal').modal('show');
        }
    }
    function sendrequestl(button) {
        var lbbank = document.getElementById("lbbank").value;
        var lprate = document.getElementById("lprate").value;
        var lamount = document.getElementById("lamount").value;
        var rateid = document.getElementById("lrateid").value;
        var lvdate = document.getElementById("lvdate").value;//document.getElementById("specialrates"+button).value;
        var ledate = document.getElementById("ledate").value;
        var llbank = document.getElementById("llbank").value;
        if ((lamount === '') || (lamount == 0)) {
            alert("Error: The amount field cannot be blank!, zero too is not an acceptable amount");
        }
        else {

            if ((Number.isInteger(lamount)) === 'false') {
                alert("The amount provided is not valid");
            }
            else {

                $.ajax({
                    type: "GET",
                    url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=ibl/default/lpropose" + "&lbbank=" + lbbank +
                            "&lprate=" + lprate +
                            "&lamount=" + lamount +
                            "&rate=" + rateid +
                            "&lvdate=" + lvdate +
                            "&ledate=" + ledate +
                            "&llbank=" + llbank
                            ,
                    data: "", //ProposedSites
                    cache: false,
                    success: function(data) {
                        if (data == 'true') {
                            $('#sModal').modal('show');
                            var lbbank = '';
                            var lprate = '';
                            var lamount = '';
                            var rateid = '';
                            var lvdate = '';//document.getElementById("specialrates"+button).value;
                            var ledate = '';
                            var llbank = '';

                            $('#lformModal').modal('hide');

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
    }
    function sendrequestb(button) {
        var bbbank = document.getElementById("bbbank").value;
        var bprate = document.getElementById("bprate").value;
        var bamount = document.getElementById("bamount").value;
        var rateid = document.getElementById("brateid").value;
        var bvdate = document.getElementById("bvdate").value;//document.getElementById("specialrates"+button).value;
        var bedate = document.getElementById("bedate").value;
        var blbank = document.getElementById("blbank").value;
        //  alert(rateid);
        if ((bamount === '') || (bamount == 0)) {
            alert("Error: The amount field cannot be blank!, zero too is not an acceptable amount");
        }
        else {

            if ((Number.isInteger(bamount)) === 'false') {
                alert("The amount provided is not valid");
            }
            else {
                $.ajax({
                    type: "GET",
                    url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=ibl/default/bpropose" + "&bbbank=" + bbbank +
                            "&bprate=" + bprate +
                            "&bamount=" + bamount +
                            "&rate=" + rateid +
                            "&bvdate=" + bvdate +
                            "&bedate=" + bedate +
                            "&blbank=" + blbank
                            ,
                    data: "", //ProposedSites
                    cache: false,
                    success: function(data) {
                        if (data == 'true') {
                            var bbbank = '';
                            var bprate = '';
                            var bamount = '';
                            var rateid = '';
                            var bvdate = '';//document.getElementById("specialrates"+button).value;
                            var bedate = '';
                            var blbank = '';

                            $('#sModal').modal('show');
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
    }
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    $("[data-toggle=popover]")
            .popover()

</script>
