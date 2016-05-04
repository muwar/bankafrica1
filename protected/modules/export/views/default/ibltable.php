<?php
//            echo Yii::app()->user->name;
$banklogged = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
$bankcus = Bqcus::model()->findAll('cus=:x', array(':x' => current($banklogged)->id));
$bankl = current($banklogged);
?>
<h1>
    <?php
    echo Yii::app()->user->name;
    ?>
    Inter-Bank Lending Rates
</h1>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Inter-Bank Lending
                    </h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">                       
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th rowspan='2'> Banks</th>
                                    <?php foreach ($terms as $tterm) { ?>
                                        <th colspan='2'><?php echo $tterm->term_name; ?></th>
                                    <?php } ?>
<!--             <th>Edit</th> -->
                                </tr>
                                <tr>
                                    <?php foreach ($terms as $tterm) { ?>
                                        <th><?php echo LR; ?></th>
                                        <th><?php echo BR; ?></th>
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
                                            <?php
                                        }
                                    }
                                }
                                $i++;
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
            </div>    
        </div>
    </div>
</div>
<!-- /.modal -->

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
        if (lamount === '') {
            alert("Error: The amount field cannot be blank!");
        }
        else {
            $.ajax({
                type: "GET",
                url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+"/index.php?r=ibl/default/lpropose" + "&lbbank=" + lbbank +
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
    function sendrequestb(button) {
        var bbbank = document.getElementById("bbbank").value;
        var bprate = document.getElementById("bprate").value;
        var bamount = document.getElementById("bamount").value;
        var rateid = document.getElementById("brateid").value;
        var bvdate = document.getElementById("bvdate").value;//document.getElementById("specialrates"+button).value;
        var bedate = document.getElementById("bedate").value;
        var blbank = document.getElementById("blbank").value;
        //  alert(rateid);
        if (bamount === '') {
            alert("Error: The amount field cannot be blank!");
        }
        else {
            $.ajax({
                type: "GET",
               url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+"/index.php?r=ibl/default/bpropose" + "&bbbank=" + bbbank +
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
                        $('#sModal').modal('show');
                        $('#bformModal').modal('hide');
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
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    $("[data-toggle=popover]")
            .popover()

</script>
