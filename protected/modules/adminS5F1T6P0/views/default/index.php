<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <i class="fa fa-users fa-2x"></i>
                    <div class="panel-body">
                        #system users
                        <span class="badge"><?php echo count(Evuti::model()->findAll()); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <i class="fa fa-users fa-2x"></i>
                    <div class="panel-body">
                        <?php echo CHtml::link('Manage users', array('users'), array('onclick' => '$("#signup").dialog("open"); return false;')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <i class="fa fa-bell-o fa-2x"></i>
                <div class="panel-body">
                    #Banks Registered
                    <?php
                    $getbankprof = Evprof::model()->findAll('lib=:x', array(':x' => 'Bank'));
                    foreach ($getbankprof as $bankprof)
                        ;
                    $getbanks = Evuti::model()->findAll('pro=:x', array(':x' => $bankprof->pro));
                    ?>
                    <span class="badge"><?php echo count($getbanks); ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <i class="fa fa-thumbs-o-up fa-2x"></i>
                <div class="panel-body">
                    #Completed transactions&nbsp;
                    <?php
                    $tibl = Bqibl::model()->findall('sta=:x', array(':x' => 'VA'));
                    $tfd = Bqfd::model()->findAll('sta=:x', array(':x' => 'VA'));
                    $tcf = Bqcf::model()->findAll('sta=:x', array(':x' => 'VA'));
                    $tcb = Bqcb::model()->findAll('sta=:x', array(':x' => 'VA'));
                    $tdsec = Bqdsec::model()->findAll('sta=:x', array(':x' => 'VA'));
                    ?>
                    <span class="badge"><?php echo count($tibl) + count($tfd) + count($tcf) + count($tcb) + count($tdsec); ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <i class="fa fa-gears fa-2x"></i>
                <div class="panel-body">
                    #New Requests&nbsp;
                    <?php
                    $nibl = Bqibl::model()->findall('proc=:x', array(':x' => '0'));
                    $nfd = Bqfd::model()->findAll('proc=:x', array(':x' => '0'));
                    $ncf = Bqcf::model()->findAll('proc=:x', array(':x' => '0'));
                    $ncb = Bqcb::model()->findAll('proc=:x', array(':x' => '0'));
                    $ndsec = Bqdsec::model()->findAll('proc=:x', array(':x' => '0'));
                    ?>
                    <span class="badge"><?php echo count($nibl) + count($nfd) + count($ncf) + count($ncb) + count($ndsec); ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">

                        <li class="active"><a href="#ibl" data-toggle="tab">Inter-Bank Lending</a>
                        </li>
                        <li><a href="#fd" data-toggle="tab">Fixed Deposits</a>
                        </li>
                        <li><a href="#cb" data-toggle="tab">Commercial Borrowing</a>
                        </li>
                        <li ><a href="#cf" data-toggle="tab">Corporate Finance</a>
                        </li>
                        <li><a href="#st" data-toggle="tab">Securities Trading</a>
                        </li>
                        <li><a href="#eb" data-toggle="tab">Electronic Banking</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="ibl">
                            <h4>Home Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="tab-pane fade" id="fd">
                            <h4>Profile Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="tab-pane fade" id="cb">
                            <h4>Messages Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="tab-pane fade" id="cf">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th> Owner</th>
                                            <th>Project</th>
                                            <th>Executive Summary</th>
                                            <th>Investment need</th>
                                            <th>Investment Type</th>
                                            <th>Validate</th>
                                            <th>Visibility</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($comrecords as $cf) { ?>
                                            <tr>
                                                <td id="company<?php echo $cf->id ?>"><?php echo Bqcus::model()->findByPk($cf->company_id)->resnam; ?></td>
                                                <td id="proj<?php echo $cf->id ?>"><?php echo $cf->project_name; ?></td>
                                                <td id="sum<?php echo $cf->id ?>"><?php echo $cf->executive_summary; ?></td>
                                                <td id="need<?php echo $cf->id ?>"><?php echo $cf->investment_need ?></td>
                                                <td id="needtype<?php echo $cf->id ?>"><?php echo InvestmentType::model()->findByPk($cf->investment_type)->name; ?></td>
                                                <td ><label style="color:blue" onclick="
                                                            crosscheck(<?php
                                                    echo $cf->id .
                                                    "," . $cf->company_id .
                                                    ",'" . $cf->project_name .
                                                    "','" . $cf->executive_summary .
                                                    "'," . $cf->investment_need .
                                                    "," . $cf->investment_type;
                                                    ?>);">
                                                        Validate
                                                    </label>
                                                </td>
                                                <td><?php if ($cf->valid == 0) { ?>
                                                        <label style="color:blue" onclick="showit(<?php echo $cf->id ?>)">Show</label>
                                                    <?php } else { ?>
                                                        <label style="color:blue" onclick="hideit(<?php echo $cf->id ?>)">Hide</label>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <h3 align='center'>Manage Interests</h3>
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                    <thead>
                                        <tr>
                                            <th> Owner</th>
                                            <th>Project</th>
                                            <th>Investment need</th>
                                            <th>Investment Type</th>
                                            <th>Investor</th>
                  <!--                          <th>Amount</th>  -->
                                            <th>Alert</th>
                                            <th>Permit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($cfcontacts as $cf) {
                                            $com = Cominvest::model()->findByPk($cf->num);
                                            ?>
                                            <tr>
                                                <td ><?php echo Bqcus::model()->findByPk($com->company_id)->resnam; ?></td>
                                                <td><?php echo $com->project_name; ?></td>
                                                <td><?php echo $com->investment_need ?></td>
                                                <td><?php echo InvestmentType::model()->findByPk($com->investment_type)->name; ?></td>
                                                <td><?php echo Bqcus::model()->findByPk($cf->cus)->resnam; ?></td>
                                             <!--   <td><?php // echo $cf->amo;            ?></td>  -->

                                                <td><?php if ($cf->alert_owner == 0) { ?>
                                                        <label style="color:blue" onclick="alertparties(<?php echo $cf->cdos . "," . "'CF'" . "," . "'owner'"; ?>)">Alert Owner</label>
                                                    <?php } else { ?>
                                                        <label style="color:blue" >Done|</label>
                                                    <?php } ?>
                                                    <?php if ($cf->alert_investor == 0) { ?>
                                                        <label style="color:blue" onclick="alertparties(<?php echo $cf->cdos . "," . "'CF'" . "," . "'investor'"; ?>);">| Alert Investor</label>
                                                    <?php } else { ?>
                                                        <label style="color:blue" >Done</label>
                                                    <?php } ?>

                                                </td>
                                                <td>
                                                    <?php if ($cf->valid == 0) { ?>
                                                        <label style="color:blue" onclick="fillamtcf(<?php echo $cf->cdos . ',' . $cf->num . ',' . $cf->cus; ?>)">
                                                            Permit
                                                        </label>
                                                    <?php } else {
                                                        ?>
                                                        <label>    Permitted</label>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="st">
                            <h3 align="center">Registered Securities</h3>
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-examplesecr">
                                    <thead>
                                        <tr>
                                            <th> Owner</th>
                                            <th>Security</th>
                                            <th>Issuer</th>
                                            <th>Issue Date</th>
                                            <th>Maturity date</th>

                                            <th>Face value</th>
                                            <th>Discount</th>
                                            <th>Reg date</th>
                                            <th>Validate</th>
                                            <th>Visibility</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($secrecords as $sec1) { ?>
                                            <tr>
                                                <td><?php echo Bqcus::model()->findByPk($sec1->owner)->resnam; ?></td>
                                                <td><?php echo current(SecurityTypes::model()->findAll('id=:x', array(':x' => $sec1->sectype)))->name; ?></td>
                                                <td><?php echo $sec1->issuer; ?></td>
                                                <td><?php echo $sec1->issuedate; ?></td>
                                                <td><?php echo $sec1->matdate; ?></td>
                                                <td><?php echo $sec1->facevalue; ?></td>
                                                <td><?php echo $sec1->discount . " %"; ?></td>
                                                <td><?php echo $sec1->cdate; ?></td>
                                                <td>
                                                    <?php if ($sec1->valid == 0) { ?>
                                                        <label style='color:blue' onclick='crosschecksec(<?php
                                                        echo
                                                        $sec1->id .
                                                        ',' . $sec1->owner .
                                                        ',"' . $sec1->issuer .
                                                        '",' . $sec1->facevalue .
                                                        ',' . $sec1->discount;
                                                        ?>);'>
                                                            Validate
                                                        </label>
                                                    <?php } else { ?>
                                                        valid
                                                    <?php } ?>

                                                </td>
                                                <td><?php if ($sec1->valid == 0) { ?>
                                                        <label style="color:blue" onclick="showitsec(<?php echo $sec1->id ?>)">H &nbsp;Show</label>
                                                    <?php } else { ?>
                                                        <label style="color:blue" onclick="hideitsec(<?php echo $sec1->id ?>)">V &nbsp;Hide</label>
                                                    <?php } ?>
                                                </td>  
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <h3 align='center'>Manage Interests</h3>
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-examplesecm">
                                    <thead>
                                        <tr>
                                            <th> Owner</th>
                                            <th>Buyer</th>
                                            <th>Security Type</th>
                                            <th>Face Value</th>
                                            <th>Discount</th>
                                            <th>Alert parties</th>
                                            <th>Permit Communication</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($hseccontacts as $hsecrec) {
                                            $sec = SecurityList::model()->findByPk($hsecrec->ref);
                                            ?>
                                            <tr>
                                                <td ><?php
                                                    echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $sec->owner)))->resnam;
                                                    ;
                                                    ?></td>
                                                <td><?php
                                                    echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $hsecrec->cus)))->resnam;
                                                    ;
                                                    ?></td>
                                                <td><?php echo SecurityTypes::model()->findByPk($sec->sectype)->name; ?></td>
                                                <td><?php echo $sec->facevalue . " " . $sec->currency; ?></td>
                                                <td><?php echo $sec->discount . " %"; ?></td>

                                                <td><?php if ($hsecrec->alert_owner == 0) { ?>
                                                        <label style="color:blue" onclick="alertparties(<?php echo $hsecrec->cdos . "," . "'SEC'" . "," . "'owner'"; ?>);">Alert Owner</label>
                                                    <?php } else { ?>
                                                        <label style="color:blue" >Done|</label>
                                                    <?php } ?>
                                                    <?php if ($hsecrec->alert_investor == 0) { ?>
                                                        <label style="color:blue" onclick="alertparties(<?php echo $hsecrec->cdos . "," . "'SEC'" . "," . "'investor'"; ?>);">| Alert Buyer</label>
                                                    <?php } else { ?>
                                                        <label style="color:blue" >Done</label>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($hsecrec->valid == 0) { ?>
                                                        <label style="color:blue" onclick="fillamtst(<?php echo $hsecrec->cdos . ',' . $hsecrec->ref . ',' . $hsecrec->cus, ',' . $sec->discount; ?>);">
                                                            Permit
                                                        </label>
                                                    <?php } else {
                                                        ?>
                                                        <label>    Permitted</label>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="eb">
                            <h4>Settings Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

        </div>

    </div>
</div>
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" align="center"><input id="thelTitle" type="text" readonly style="-webkit-appearance: none; border:none;width:100%; "></input></h4>
            </div>
            <div class="modal-body">
                <fieldset>
                    <p align="center">

                    <div class="form-group">
                        <label>Project Name</label>&nbsp;&nbsp;<input class="form-control" style="width:400px;" placeholder="Proposed Rate" name="proj" id="proj" type="text" value="" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Executive Summary</label>&nbsp;&nbsp;<textarea class="form-control"  style="width:400px;" placeholder="Amount" name="sum" id="sum" type="text" value="" cols="50" rows="7"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="tooltip-demo">
                            <label>Investment Need</label>&nbsp;&nbsp;<input class="form-control" style="width:400px;" placeholder="" name="need" id="need" type="text" value="" data-toggle="tooltip" data-placement="right" title="From what date is this request valid?">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="tooltip-demo">
                            <!--                            <label>Investment Type</label>&nbsp;&nbsp;---><input class="form-control" style="width:400px;" placeholder="" name="needtype" id="needtype" type="hidden" value="" data-toggle="tooltip" data-placement="right" title="On what date does this request become invalid?">
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" style="width:400px;" id="idd"><!--      This holds the rate id         -->
                        <input class="form-control" type="hidden" style="width:400px;" id="company"><!--      This holds the rate id         -->
                    </div>
                    </p>
                </fieldset>
            </div>
            <div class="modal-footer"><p align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button type="submit" onclick="event.preventDefault();
                                                        saverequest();" class="btn btn-primary">Save</button></p>
            </div>
        </div>
    </div>
</div>
<!-- Securities formmodal -->
<div class="modal fade" id="secformModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" align="center">Validate security</h4>
            </div>
            <div class="modal-body">
                <fieldset>
                    <p align="center">

                    <div class="form-group">
                        <label>Issuer</label>&nbsp;&nbsp;<input class="form-control" style="width:400px;" placeholder="Proposed Rate" name="issuer" id="issuer" type="text" value="" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Facevalue</label>&nbsp;&nbsp;<input class="form-control" style="width:400px;" placeholder="Proposed Rate" name="facevalue" id="facevalue" type="text" value="" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Discount</label>&nbsp;&nbsp;<input class="form-control" style="width:400px;" placeholder="Proposed Rate" name="discount" id="discount" type="text" value="" autofocus>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" style="width:400px;" id="idsec"><!--      This holds the rate id         -->
                        <input class="form-control" type="hidden" style="width:400px;" id="owner"><!--      This holds the rate id         -->
                    </div>

                </fieldset>
            </div>
            <div class="modal-footer"><p align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" onclick="event.preventDefault();
                                                        validatesec();" class="btn btn-primary">Validate</button></p>
            </div>
        </div>
    </div>
</div>
<!-- end securities formmodal  -->
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
                        <label id="contentid"></label>
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
<div class="modal fade" id="cfformModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" align="center">Contact Form</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">                
                    <fieldset>
                        <div class="form-group">
                            <div class="tooltip-demo">
                                <label class="col-sm-4 control-label">Amount for investment</label>
                                <div class="col-sm-8">
                                    <input data-toggle="tooltip" data-placement="top" title="The amount the investor is putting in" class="form-control" style='border-radius: 0px 10px 0px 10px;' placeholder="Amount" name="cfamt" id="cfamt" type="text" value="" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="hidden" style="width:400px;" id="cfcontactid"><!--      This holds the rate id         -->
                            <input class="form-control" type="hidden" style="width:400px;" id="cfprojref">
                            <input class="form-control" type="hidden" style="width:400px;" id="cfinvestor">
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
                                                        permitcf();" class="btn btn-primary">Send</button></p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="stformModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" align="center">Contact Form</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">                
                    <fieldset>
                        <div class="form-group">
                            <div class="tooltip-demo">
                                <label class="col-sm-4 control-label">Quantity</label>
                                <div class="col-sm-8">
                                    <input data-toggle="tooltip" data-placement="top" title="The amount the investor is putting in" class="form-control" style='border-radius: 0px 10px 0px 10px;' placeholder="Quantity" name="stqty" id="stqty" type="text" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="tooltip-demo">
                                <label class="col-sm-4 control-label">Discount (%)</label>
                                <div class="col-sm-8">
                                    <input data-toggle="tooltip" data-placement="top" title="Discount" class="form-control" style='border-radius: 0px 10px 0px 10px;' placeholder="Discount proposed" name="stdiscount" id="stdiscount" type="text" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="hidden" style="width:400px;" id="stcontactid"><!--      This holds the rate id         -->
                            <input class="form-control" type="hidden" style="width:400px;" id="stref">
                            <input class="form-control" type="hidden" style="width:400px;" id="stbuyer">
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
                                                        permitst();" class="btn btn-primary">Send</button></p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" align="center">Alert form</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">                
                    <fieldset>
                        <div class="form-group">
                            <div class="tooltip-demo">
                                <div class="col-sm-12">
                                    <textarea data-toggle="tooltip" data-placement="top" title="Message" class="form-control" style='border-radius: 0px 10px 0px 10px;' placeholder="type the message" name="alertmsg" id="alertmsg" type="text" value="">
                                    </textarea>                              
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" style="width:400px;" id="op"><!--      This holds the rate id         -->
                            <input class="form-control" type="hidden" style="width:400px;" id="opid">
                            <input class="form-control" type="hidden" style="width:400px;" id="usertype">
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
                                                        sendalert();" class="btn btn-primary">Send</button></p>
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

                                                    function sendalert() {
                                                        var op = document.getElementById("op").value;
                                                        var opid = document.getElementById("opid").value;
                                                        var usertype = document.getElementById("usertype").value;
                                                        var msg = document.getElementById("alertmsg").value;

                                                        $.ajax({
                                                            type: "GET",
                                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=adminS5F1T6P0/default/sendalert" +
                                                                    "&op=" + op +
                                                                    "&opid=" + opid +
                                                                    "&usertype=" + usertype +
                                                                    "&msg=" + msg

                                                                    ,
                                                            data: "", //ProposedSites
                                                            cache: false,
                                                            success: function(data) {
                                                                if (data == 'true') {
                                                                    $('#alertModal').modal('hide');
                                                                    $('#contentid').html("Your mail has been sent successfully.");

                                                                    //        $('#contentid')
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


                                                    function permitsec(id) {
                                                        $.ajax({
                                                            type: "GET",
                                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=adminS5F1T6P0/default/permitsec" +
                                                                    "&id=" + id
                                                                    ,
                                                            data: "", //ProposedSites
                                                            cache: false,
                                                            success: function(data) {
                                                                if (data == 'true') {
                                                                    $('#contentid').html("All transactions have been allowed.");

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

                                                    function fillamtcf(contactid, projref, investor) {
                                                        document.getElementById("cfcontactid").value = contactid;
                                                        document.getElementById("cfprojref").value = projref;
                                                        document.getElementById("cfinvestor").value = investor;
                                                        $('#cfformModal').modal('show');
                                                    }

                                                    function permitcf() {
                                                        var amount = document.getElementById("cfamt").value;
                                                        var user = document.getElementById("cfinvestor").value;
                                                        var idd = document.getElementById("cfprojref").value;
                                                        var contactid = document.getElementById("cfcontactid").value;
                                                        $.ajax({
                                                            type: "GET",
                                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=cf/default/invest" +
                                                                    "&amount=" + amount +
                                                                    "&user=" + user +
                                                                    "&id=" + idd +
                                                                    "&contactid=" + contactid
                                                                    ,
                                                            data: "", //ProposedSites
                                                            cache: false,
                                                            success: function(data) {
                                                                if (data == 'true') {
                                                                    $('#cfformModal').modal('hide');
                                                                    $('#contentid').html("All transactions have been allowed.");

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

                                                    function fillamtst(contactid, secref, buyer, discount) {
                                                        //    alert('here');
                                                        document.getElementById("stcontactid").value = contactid;
                                                        document.getElementById("stref").value = secref;
                                                        document.getElementById("stbuyer").value = buyer;
                                                        document.getElementById("stdiscount").value = discount;
                                                        $('#stformModal').modal('show');
                                                    }

                                                    function permitst() {
                                                        var qty = document.getElementById("stqty").value;
                                                        var user = document.getElementById("stbuyer").value;
                                                        var idd = document.getElementById("stref").value;
                                                        var discount = document.getElementById("stref").value;
                                                        var contactid = document.getElementById("stdiscount").value;
                                                        $.ajax({
                                                            type: "GET",
                                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=st/default/buysec" +
                                                                    "&user=" + user +
                                                                    "&id=" + idd +
                                                                    "&contactid=" + contactid +
                                                                    "&discount=" + discount +
                                                                    "&qty=" + qty
                                                                    ,
                                                            data: "", //ProposedSites
                                                            cache: false,
                                                            success: function(data) {
                                                                if (data == 'true') {
                                                                    $('#stformModal').modal('hide');
                                                                    $('#contentid').html("All transactions have been allowed.");

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



                                                    function alertparties(opid, op, usertype) {

                                                        document.getElementById("opid").value = opid;
                                                        document.getElementById("op").value = op;
                                                        document.getElementById("usertype").value = usertype;
                                                        $('#alertModal').modal('show');
                                                    }
                                                    function hideit(id) {
                                                        $.ajax({
                                                            type: "GET",
                                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=adminS5F1T6P0/default/hideit" +
                                                                    "&id=" + id
                                                                    ,
                                                            data: "", //ProposedSites
                                                            cache: false,
                                                            success: function(data) {
                                                                if (data == 'true') {
                                                                    $('#contentid').html("Contents have been hidden.");

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
                                                    function showit(id) {
                                                        $.ajax({
                                                            type: "GET",
                                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=adminS5F1T6P0/default/showit" +
                                                                    "&id=" + id
                                                                    ,
                                                            data: "", //ProposedSites
                                                            cache: false,
                                                            success: function(data) {
                                                                if (data == 'true') {

                                                                    $('#contentid').html("Contents have been made visible.");

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
                                                    function hideitsec(id) {
                                                        $.ajax({
                                                            type: "GET",
                                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=adminS5F1T6P0/default/hideitsec" +
                                                                    "&id=" + id
                                                                    ,
                                                            data: "", //ProposedSites
                                                            cache: false,
                                                            success: function(data) {
                                                                if (data == 'true') {

                                                                    $('#contentid').html("This security has been hidden.");

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
                                                    function showitsec(id) {
                                                        $.ajax({
                                                            type: "GET",
                                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=adminS5F1T6P0/default/showitsec" +
                                                                    "&id=" + id
                                                                    ,
                                                            data: "", //ProposedSites
                                                            cache: false,
                                                            success: function(data) {
                                                                if (data == 'true') {

                                                                    $('#contentid').html("This security has been made visible.");

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

                                                    function crosscheck(id, company, proj, sum, need, needtype) {
                                                        document.getElementById("idd").value = id;
                                                        document.getElementById("company").value = company;
                                                        document.getElementById("proj").value = proj;
                                                        document.getElementById("sum").value = sum;
                                                        document.getElementById("need").value = need;
                                                        document.getElementById("needtype").value = needtype;
                                                        $('#formModal').modal('show');
                                                    }
                                                    function crosschecksec(id, owner, issuer, facevalue, discount) {

                                                        document.getElementById("idsec").value = id;
                                                        document.getElementById("owner").value = owner;
                                                        document.getElementById("issuer").value = issuer;

                                                        //                document.getElementById("issuedate").value = issuedate;
                                                        //                document.getElementById("matdate").value = matdate;
                                                        document.getElementById("facevalue").value = facevalue;
                                                        document.getElementById("discount").value = discount;
                                                        $('#secformModal').modal('show');

                                                    }

                                                    function saverequest() {
                                                        var idd = document.getElementById("idd").value;
                                                        var proj = document.getElementById("proj").value;
                                                        var sum = document.getElementById("sum").value;
                                                        var need = document.getElementById("need").value;
                                                        var needtype = document.getElementById("needtype").value;
                                                        $.ajax({
                                                            type: "GET",
                                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=adminS5F1T6P0/default/projupdate" +
                                                                    "&idd=" + idd +
                                                                    "&proj=" + proj +
                                                                    "&sum=" + sum +
                                                                    "&need=" + need +
                                                                    "&needtype=" + needtype
                                                                    ,
                                                            data: "", //ProposedSites
                                                            cache: false,
                                                            success: function(data) {
                                                                if (data == 'true') {
                                                                    $('#formModal').modal('hide');
                                                                    $('#contentid').html("Your information has been save.");
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
                                                    function validatesec() {
                                                        var id = document.getElementById("idsec").value;
                                                        var issuer = document.getElementById("issuer").value;
                                                        var facevalue = document.getElementById("facevalue").value;
                                                        var discount = document.getElementById("discount").value;
                                                        $.ajax({
                                                            type: "GET",
                                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=adminS5F1T6P0/default/secupdate" +
                                                                    "&id=" + id +
                                                                    "&issuer=" + issuer +
                                                                    "&facevalue=" + facevalue +
                                                                    "&discount=" + discount
                                                                    ,
                                                            data: "", //ProposedSites
                                                            cache: false,
                                                            success: function(data) {
                                                                if (data == 'true') {
                                                                    $('#secformModal').modal('hide');
                                                                    $('#contentid').html("Validation process complete.");
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

                                                        $('#dataTables-example1').DataTable({
                                                            responsive: true
                                                        });
                                                        $('#dataTables-examplesecr').DataTable({
                                                            responsive: true
                                                        });
                                                        $('#dataTables-examplesecm').DataTable({
                                                            responsive: true
                                                        });
                                                    });

</script>