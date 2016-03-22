<style>
    /* The max width is dependant on the container (more info below) */
    .popover{
        max-width: 100%; /* Max Width of the popover (depending on the container!) */
        width: 60%;
    }
    .box {
        border-radius: 10px;
        padding: 25px;
        background-color: #fff;
        text-align: center;
    }
    #progressbar {
        border: 1px solid #333;
        border-radius: 2px;
        padding: 2px;
    }
    #progressbar > div {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        background-color:currentColor;
        width: 11%;  
        height: 8px;
        border: 1px solid #333;
        border-radius: 0px;
    }
    .text {
        color: #000;
        margin-top: 15px;
        font-size: 9px;
        font-weight: bold;
    }
</style>

<div id="page-wrapper">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Securities Trading
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">New Securities</a>
                        </li>
                        <li><a href="#mreq" data-toggle="tab">My Requests</a>
                        </li>
                        <li><a href="#creq" data-toggle="tab">Customer Requests</a>
                        </li>
                        <li><a href="#messages" data-toggle="tab">Evolution of Securities</a>
                        </li>
                        <li><a href="#interest" data-toggle="tab">Interest Panel</a>
                        </li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <button type="submit" onclick="event.preventDefault();
                                    registerneed(<?php echo $userid ?>);" class="btn btn-primary">Register New Securities</button>
                                    <?php // echo CHtml::link('Register new investment needs',array('registerneeds','onclick'=>'event.preventDefault();sendrequest()'))  ?>
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Issuer</th>
                                            <th>Issue date</th>
                                            <th>Maturity</th>
                                            <th>Type</th>
                                            <th>Face Value</th>
                                            <th>Discount</th>
                                            <th>Reg Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (SecurityList::model()->findAll('owner=:x', array(':x' => $userid)) as $security) { ?>
                                            <tr>
                                                <td><?php echo $security->issuer; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($security->issuedate)); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($security->matdate)); ?></td>
                                                <td><?php echo SecurityTypes::model()->findByPk($security->sectype)->name; ?></td>
                                                <td><?php echo $security->facevalue . " " . $security->currency; ?></td>
                                                <td><?php echo $security->discount; ?></td>
                                                <td><?php echo $security->cdate; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="messages">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-examplesechis">
                                    <thead>
                                        <tr>
                                            <th>Type </th>
                                            <th>Issuer </th>
                                            <th>Issue Date </th>
                                            <th>Maturity </th>

                                            <th>Date</th>
                                            <th>Discount</th>
                                            <th>Face Value</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (SecurityList::model()->findAll('owner=:x', array(':x' => $userid)) as $evolutionlist) { ?>
                                            <tr>    
                                                <td><?php echo SecurityTypes::model()->findByPk($evolutionlist->sectype)->name; ?></td>
                                                <td><?php echo $evolutionlist->issuer; ?></td>
                                                <td><?php echo $evolutionlist->issuedate; ?></td>
                                                <td><?php echo $evolutionlist->matdate; ?></td>
                                                <td><?php echo $evolutionlist->cdate; ?></td>
                                                <td><?php echo $evolutionlist->discount . " %"; ?></td>
                                                <td><?php echo $evolutionlist->facevalue . " " . $evolutionlist->currency; ?></td>
                                                <td><?php echo $evolutionlist->facevalue . ($evolutionlist->discount / 100) . " " . $evolutionlist->currency; ?></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mreq">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-examplemyreqsec">
                                    <thead>
                                        <tr>
                                            <th>Sent to </th>
                                            <th>Date</th>
                                            <th>Set Discount</th>
                                            <th>Discount</th>
                                            <th>Face Value</th>

                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Respond</th>
                                            <th>Complete</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($myreqsecs as $myreqsec) {
                                            $securityproper = SecurityList::model()->findByPk($myreqsec->ref);
                                            $dsecs = Bqdsec::model()->findAll('refsec_id=:x', array(':x' => $myreqsec->cdos));
                                            ?>
                                            <tr>
                                                <td><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $securityproper->owner)))->resnam; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($myreqsec->dou)); ?></td>
                                                <td><?php echo $securityproper->discount . " %"; ?></td>
                                                <td><?php echo $myreqsec->discount . " %"; ?></td>
                                                <td><?php echo $securityproper->facevalue . " " . $securityproper->currency; ?></td>
                                                <td><?php echo ($securityproper->facevalue - ($securityproper->facevalue * ($myreqsec->discount / 100))) . " " . $securityproper->currency; ?></td>

                                                <td>
                                                    <?php
                                                    if ($myreqsec->proc == 0)
                                                        echo "New";
                                                    else {
                                                        if ($myreqsec->proc == 9)
                                                            echo "Completed";
                                                        else
                                                            echo "Pending";
                                                    }
                                                    ?>
                                                </td>
                                                <td>

                                                    <?php if ($myreqsec->proc == 9) { ?>
                                                        Approved<?php
                                                    } if (($myreqsec->proc == 0) || ( $myreqsec->proc == 3) || ($myreqsec->proc == 1)) {
                                                        ?><label>
                                                            Pending reply
                                                        </label><?php
                                                    }
                                                    if (($myreqsec->proc == 5) || ($myreqsec->proc == 4)) {
                                                        ?>
                                                        Approved<?php
                                                    }
                                                    if ($myreqsec->proc == 8) {
                                                        ?>
                                                        Rejected
                                                    <?php } ?>
                                                </td>

                                                <td>
                                                    <?php if ($myreqsec->proc == 5) { ?>
                                                        Already approved<?php
                                                    }
                                                    if ($myreqsec->proc == 8) {
                                                        ?>
                                                        Rejected<?php
                                                    } if (( $myreqsec->proc == 0) || ( $myreqsec->proc == 3) || ( $myreqsec->proc == 1)) {
                                                        ?>
                                                        <label>...</label>
                                                        <?php
                                                    }
                                                    if ($myreqsec->proc == 4) {
                                                        ?>
                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                            complete(<?php echo $myreqsec->cdos ?>);">Complete</button>
                                                            <?php } if ($myreqsec->proc == 9) {
                                                                ?>
                                                        <label>Completed</label>
                                                    <?php } ?>            
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-default" data-container="body" data-html="true" data-toggle="popover" data-placement="bottom"  
                                                            data-content="<?php foreach ($dsecs as $dsec) { ?>
                                                                <div class='panel-body'>
                                                                <ul class='chat'>
                                                                <?php if ($dsec->proc == 0) { ?>
                                                                    <li class='left clearfix'>                                                                        
                                                                    <div class='timeline-badge info'><i class='fa fa-user'><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqsec->cus)))->resnam; ?></i>&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4><strong>Request Sent</strong> </h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqsec->cus)))->resnam; ?>   request for a security of facevalue <?php echo $securityproper->facevalue; ?> At a discount of <?php echo $securityproper->discount . " %"; ?> 
                                                                    <a href='<?php echo '/bankafrica1/index.php?r=cbr/default/printrequest&cus_id=' . current(Bqcus::model()->findAll($myreqsec->cus))->cus . "&allcb_id=" . $allcb->cdos; ?>'>Print Request</a>
                                                                    <?php // echo CHtml::link('Print',array('printrequest','cus_id'=>current($clients)->cdos, 'allbl_id'=>                                            $allcb->cdos));   ?>
                                                                    <?php // echo CHtml::link('print',array('print'));    ?>
                                                                    </p>
                                                                    </div>

                                                                    </div>    
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 1) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>Successful View</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>You have seen this request <?php echo current($clients)->resnam; ?>.</p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 2) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'> A Quote Modification Request Has been sent</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>The modifications sent: <?php echo $dsec->remark; ?>.</p><br>
                                                                    <p>proposed rate: <?php echo $dsec->rate; ?></p><br>
                                                                    <p>Proposed amount: <?php
                                                                    if ($dsec->amount == 0)
                                                                        echo "The Suggested amount is OK";
                                                                    else
                                                                        echo $dsec->amount;
                                                                    ?></p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 3) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($clients)->resnam; ?></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>Modification Made and resent</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>Request modifications made: <?php echo $dsec->remark; ?>.</p>
                                                                    <p>proposed rate: <?php echo $dsec->rate; ?></p><br>
                                                                    <p>Proposed amount: <?php echo $dsec->amount; ?></p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 4) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-check'><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqsec->cus)))->resnam; ?></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>

                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>Quote approval made</h4>
                                                                    <a href='<?php // echo '/bankafrica1/index.php?r=cbr/default/printapproval&cus_id=' . current($clients)->cus . "&allcb_id=" . $allcb->cdos;         ?>'>Print Approval</a>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>Request Accepted.</p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 5) { ?>  
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-refresh'></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-badge'>Transaction in progress...
                                                                    </div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>...</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 8) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge'> <i class='fa fa-user'>&nbsp;Me</i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-badge info'>Quote Rejected
                                                                    </div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'>
                                                                    <h4 class='timeline-title'>...</h4><i class='fa fa-times'></i>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p><?php echo $allcb->rejmot; ?></p>
                                                                    <p><?php echo $dsec->remark; ?></p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 9) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge'><i class='fa fa-check fa-2x'></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-badge info'>Transaction completed
                                                                    </div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>.</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>Transaction completed</p>
                                                                    </div>

                                                                    </li>
                                                                <?php } ?>
                                                                </ul>
                                                                </div>
                                                            <?php } ?>">
                                                        Details 
                                                    </button>            
                                                </td>

                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table> 
                            </div> 
                        </div>
                        <div class="tab-pane fade" id="creq">

                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-examplemreqsec">
                                    <thead>
                                        <tr>
                                            <th>From</th>
                                            <th>Date</th>
                                            <th>Qty</th>
                                            <th>Set Discount</th>
                                            <th>Discount</th>
                                            <th>Face Value</th>

                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Respond</th>
                                            <th>Complete</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($creqsecs as $creqsec) {
                                            $securityproper = SecurityList::model()->findByPk($creqsec->ref);
                                            $dsecs = Bqdsec::model()->findAll('refsec_id=:x', array(':x' => $creqsec->cdos));
                                            ?>
                                            <tr>
                                                <td><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $creqsec->cus)))->resnam; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($creqsec->dou)); ?></td>
                                                <td><?php  echo $creqsec->qty; ?></td>
                                                <td><?php echo $securityproper->discount . " %"; ?></td>
                                                <td><?php echo $creqsec->discount . " %"; ?></td>
                                                <td><?php echo $securityproper->facevalue . " " . $securityproper->currency; ?></td>
                                                <td><?php echo ($securityproper->facevalue - ($securityproper->facevalue * ($creqsec->discount / 100))) . " " . $securityproper->currency; ?></td>

                                                <td>
                                                    <?php
                                                    if ($creqsec->proc == 0)
                                                        echo "New";
                                                    else {
                                                        if ($creqsec->proc == 9)
                                                            echo "Completed";
                                                        else
                                                            echo "Pending";
                                                    }
                                                    ?>
                                                </td>
                                                <td>

                                                    <?php if ($creqsec->proc == 9) { ?>
                                                        Approved<?php
                                                    } if (($creqsec->proc == 0) || ( $myreqsec->proc == 3) || ($creqsec->proc == 1)) {
                                                        ?>
                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                            accept(<?php echo $creqsec->cdos ?>);">Accept</button><?php
                                                            }
                                                            if (($creqsec->proc == 5)) {
                                                                ?>
                                                        Approved<?php } ?>
                                                </td>

                                                <td>
                                                    <?php if ($myreqsec->proc == 5) { ?>
                                                        Already approved<?php
                                                    }
                                                    if ($creqsec->proc == 8) {
                                                        ?>
                                                        Rejected<?php
                                            } if (( $creqsec->proc == 0) || ( $creqsec->proc == 3) || ( $creqsec->proc == 1)) {
                                                        ?>
                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                            reject(<?php echo $creqsec->cdos; ?>);">Reject</button> <?php } ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-default" data-container="body" data-html="true" data-toggle="popover" data-placement="bottom"  
                                                            data-content="<?php foreach ($dsecs as $dsec) { ?>
                                                                <div class='panel-body'>
                                                                <ul class='chat'>
                                                                <?php if ($dsec->proc == 0) { ?>
                                                                    <li class='left clearfix'>                                                                        
                                                                    <div class='timeline-badge info'><i class='fa fa-user'><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $creqsec->cus)))->resnam; ?></i>&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4><strong>Request Sent</strong> </h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $creqsec->cus)))->resnam; ?>   request for a security of facevalue <?php echo $securityproper->facevalue; ?> At a discount of <?php echo $securityproper->discount . " %"; ?> 
                                                                    <a href='<?php echo '/bankafrica1/index.php?r=cbr/default/printrequest&cus_id=' . current(Bqcus::model()->findAll($creqsec->cus))->cus . "&allcb_id=" . $allcb->cdos; ?>'>Print Request</a>
                                                                    <?php // echo CHtml::link('Print',array('printrequest','cus_id'=>current($clients)->cdos, 'allbl_id'=>                                            $allcb->cdos));    ?>
                                                                    <?php // echo CHtml::link('print',array('print'));     ?>
                                                                    </p>
                                                                    </div>

                                                                    </div>    
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 1) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>Successful View</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>You have seen this request <?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqsec->cus)))->resnam; ?>.</p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 2) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'> A Quote Modification Request Has been sent</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>The modifications sent: <?php echo $dsec->remark; ?>.</p><br>
                                                                    <p>proposed rate: <?php echo $dsec->rate; ?></p><br>
                                                                    <p>Proposed amount: <?php
                                                        if ($dsec->amount == 0)
                                                            echo "The Suggested amount is OK";
                                                        else
                                                            echo $dsec->amount;
                                                                    ?></p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 3) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-user'><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $creqsec->cus)))->resnam; ?></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>Modification Made and resent</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>Request modifications made: <?php echo $dsec->remark; ?>.</p>
                                                                    <p>proposed rate: <?php echo $dsec->rate; ?></p><br>
                                                                    <p>Proposed amount: <?php echo $dsec->amount; ?></p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 4) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-check'><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqsec->cus)))->resnam; ?></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>

                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>Quote approval made</h4>
                                                                    <a href='<?php // echo '/bankafrica1/index.php?r=cbr/default/printapproval&cus_id=' . current($clients)->cus . "&allcb_id=" . $allcb->cdos;          ?>'>Print Approval</a>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>Request Accepted.</p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 5) { ?>  
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-refresh'></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-badge'>Transaction in progress...
                                                                    </div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>...</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 8) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge'> <i class='fa fa-user'>&nbsp;Me</i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-badge info'>Quote Rejected
                                                                    </div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'>
                                                                    <h4 class='timeline-title'>...</h4><i class='fa fa-times'></i>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p><?php echo $allcb->rejmot; ?></p>
                                                                    <p><?php echo $dsec->remark; ?></p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dsec->proc == 9) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge'><i class='fa fa-check fa-2x'></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dsec->dou; ?></small></div>
                                                                    <div class='timeline-badge info'>Transaction completed
                                                                    </div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>.</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>Transaction completed</p>
                                                                    </div>

                                                                    </li>
                                                                <?php } ?>
                                                                </ul>
                                                                </div>
                                                            <?php } ?>">
                                                        Details 
                                                    </button>            
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table> 
                            </div> 
                        </div>
                        <div class="tab-pane fade" id="interest">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-examplemyreqcfint">
                                    <thead>
                                        <tr>
                                            <th>Security</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$myreqsecs = Bqhseccontact::model()->findAll('cus=:x', array(':x' => $userid));
if (count($myreqsecs) > 0) {
    foreach ($myreqsecs as $myreqsec) {
        ?>
                                                <tr>
                                                    <td><?php
                                        echo SecurityList::model()->findByPk($myreqsec->ref)->name;

//current(Bqcus::model()->findAll('cus=:x', array(':x' => $cfproper->company_id)))->resnam;  
        ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($myreqsec->dou)); ?></td>
                                                    <td><?php
                                                if ($myreqsec->valid == 0) {
                                                    echo 'Pending Approaval';
                                                } else {
                                                    echo 'Approved';
                                                }
        ?></td>
                                                </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    
                                                }
                                                ?>
                                    </tbody>
                                </table> 
                            </div> 
                        </div>

                    </div>
                </div>
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
                    </div>
                    <h4 class="modal-title" id="myModalLabel">SUCCESS!!!</h4>
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

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" align="center">
                    <label id="theTitle"></label>
                    <input  type="text" readonly style="-webkit-appearance: none; border:none;width:100%; "></input>
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">                

                    <p align="center">Fields with * are required fields</p>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name *</label>
                        <div class="col-sm-9">
                            <input class="form-control"  style='border-radius: 0px 10px 0px 10px;' placeholder="Name" name="namme" id="namme" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Issuer *</label>
                        <div class="col-sm-9">
                            <input class="form-control"  style='border-radius: 0px 10px 0px 10px;' placeholder="Issuer" name="issuer" id="issuer" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Issue Date *</label>
                        <div class="col-sm-9">
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'attribute' => 'isdat',
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
        'id' => 'issuedate',
        'placeholder' => 'Issue Date',
        'data-toggle' => 'tooltip',
        'data-placement' => 'right',
        'title' => 'On what date does this request become invalid?',
        'class' => 'form-control',
    ),
));
?><!--
                            <input class="form-control"  style='border-radius: 0px 10px 0px 10px;' placeholder="Issue Date" name="issuedate" id="issuedate" cols="20" rows="7">
                            -->   </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Maturity Date *</label>
                        <div class="col-sm-9">
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'attribute' => 'matdat',
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
        'id' => 'matdate',
        'placeholder' => 'Maturity Date',
        'data-toggle' => 'tooltip',
        'data-placement' => 'right',
        'title' => 'When does this security mature?',
        'class' => 'form-control',
    ),
));
?>
                        <!--    <input class="form-control"  style='border-radius: 0px 10px 0px 10px;' placeholder="Maturity Date" name="matdate" id="matdate" cols="20" rows="7">-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Security Type *</label>
                        <div class="col-sm-9">
<?php echo CHtml::dropDownList('sectype', 'id', CHtml::listData(SecurityTypes::model()->findAll(), 'id', 'name'), array('empty' => 'Choose a type of Security', 'id' => 'sectype', 'style' => 'border-radius: 0px 10px 0px 10px;')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Face Value *</label>
                        <div class="col-sm-4">
                            <input class="form-control"  style='border-radius: 0px 10px 0px 10px;' placeholder="Face value" name="facevalue" id="facevalue" type="text" value="">
                        </div>
                        <div class="col-sm-5">
<?php echo CHtml::dropDownList('cur', 'id', CHtml::listData(Currency::model()->findAll(), 'iso', 'name'), array('empty' => 'Choose the currency', 'id' => 'currency', 'style' => 'border-radius: 0px 10px 0px 10px;', 'class' => 'form-control')); ?>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Discount( %)</label>
                        <div class="col-sm-9">
                            <input class="form-control"  style='border-radius: 0px 10px 0px 10px;' placeholder="Discount" name="discount" id="discount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-7 control-label">Is this discount biddable?</label>
                        <div class="col-sm-5">
                            <select name="biddable" id="biddable" style='border-radius: 0px 10px 0px 10px;'>
                                <option>Yes</option>
                                <option selected="selected">No</option>

                            </select>
                            <!--<input class="form-control" type="checkbox" style="width:400px;" name="bankacc" id="bankacc"> -->
                        </div>
                    </div>
                    <!--<label>Lending</label>-->&nbsp;&nbsp;<input class="form-control" style="width:400px;" name="userid" id="userid" type="hidden" value="">
                </form>
            </div>

            <div class="modal-footer"><p align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style='border-radius: 0px 10px 0px 10px;'>Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--                    <button type="submit" value="<?php echo $i . $j; ?>" id="<?php echo $i . $j; ?>" class="btn btn-primary" onclick="event.preventDefault();saverate(this.value);">Save</button> -->
                    <button style='border-radius: 0px 10px 0px 10px;' type="submit" onclick="event.preventDefault();
                                    submitrequest();" class="btn btn-primary">Submit</button></p>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
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

                                    if (loggedbankid == '')
                                        alert("You must signup in order to perform this action");
                                    else {
                                        if (loggedbankid === userid)
                                            alert("You cannot make a deposit to yourself. Please choose some other bank.");
                                        else
                                            $('#formModal').modal('show');

                                    }
                                }
                                function registerneed(id) {
                                    $('#theTitle').html("Register New Securities");

                                    document.getElementById("userid").value = id;
                                    $('#formModal').modal('show');
                                }
                                function submitrequest() {
                                    var namme = document.getElementById("namme").value;
                                    var issuer = document.getElementById("issuer").value;
                                    var issuedate = document.getElementById("issuedate").value;
                                    var matdate = document.getElementById("matdate").value;
                                    var facevalue = document.getElementById("facevalue").value;
                                    var sectype = document.getElementById("sectype").value;
                                    var discount = document.getElementById("discount").value;
                                    var id = document.getElementById("userid").value;
                                    var currency = document.getElementById("currency").value;
//                                   alert(currency);
//                                    exit;
                                    if (document.getElementById("biddable").value === 'No')
                                        var biddable = 0;
                                    else
                                        var biddable = 1;
                                    if (currency === '') {
                                        alert("Error: You have failed to provide the currency used. Please refill and try again.");
                                    }
                                    if (biddable === '') {
                                        alert("Error: You have failed indicate that the quote is biddable. Please refill and try again.");
                                    }


                                    if (issuer === '') {
                                        alert("Error: You have failed to provide the security issuer. Please refill and try again.");
                                    }
                                    if (issuedate === '') {
                                        alert("Error: You have failed to fill the 'Date of issue'. Please refill and try again.");
                                    }
                                    if (matdate === '') {
                                        alert("Error: You have failed to fill the 'Maturity Date'. Please refill and try again.");
                                    }
                                    if (sectype === '') {
                                        alert("Error: You have failed to fill the 'Security type'. Please refill and try again.");
                                    }
                                    if (facevalue === '') {
                                        alert("Error: You have failed to fill the 'Face Value'. Please refill and try again.");
                                    }
                                    else {
                                        $.ajax({
                                            type: "GET",
                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=st/default/submitrequest" +
                                                    "&issuer=" + issuer +
                                                    "&issuedate=" + issuedate +
                                                    "&matdate=" + matdate +
                                                    "&facevalue=" + facevalue +
                                                    "&discount=" + discount +
                                                    "&namme=" + namme +
                                                    "&id=" + id +
                                                    "&currency=" + currency +
                                                    "&biddable=" + biddable +
                                                    "&sectype=" + sectype
                                                    ,
                                            data: "", //ProposedSites
                                            cache: false,
                                            success: function(data) {
                                                if (data == 'true') {
                                                    $('#msg').html(" Your Security has been registered successfully");
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
                                function accept(id) {
                                    $.ajax({
                                        type: "GET",
                                        url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=st/default/accept&id=" + id
                                                ,
                                        data: "", //ProposedSites
                                        cache: false,
                                        success: function(data) {
                                            if (data == 'true') {
                                                $('#msg').html("Acceptance statement sent");
                                                $('#sModal').modal('show');


                                            } else {

                                                alert(data + "Failure: Change could not be effected.");
                                            }
                                        },
                                        error: function(data) {
                                            alert("Error effecting view.");
                                        }
                                    });

                                }
                                function reject(id) {
                                    $.ajax({
                                        type: "GET",
                                        url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=st/default/reject&id=" + id
                                                ,
                                        data: "", //ProposedSites
                                        cache: false,
                                        success: function(data) {
                                            if (data == 'true') {
                                                $('#msg').html("Rejection statement sent");
                                                $('#sModal').modal('show');


                                            } else {

                                                alert(data + "Failure: Change could not be effected.");
                                            }
                                        },
                                        error: function(data) {
                                            alert("Error effecting view.");
                                        }
                                    });

                                }
                                function complete(id) {
                                    $.ajax({
                                        type: "GET",
                                        url:  "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=st/default/complete&id=" + id
                                                ,
                                        data: "", //ProposedSites
                                        cache: false,
                                        success: function(data) {
                                            if (data == 'true') {
                                                $('#msg').html("Confirmation of completeion noted");
                                                $('#sModal').modal('show');


                                            } else {

                                                alert(data + "Failure: Change could not be effected.");
                                            }
                                        },
                                        error: function(data) {
                                            alert("Error effecting view.");
                                        }
                                    });

                                }


                                $(document).ready(function() {
                                    $('#dataTables-example').DataTable({
                                        responsive: true
                                    });
                                });

                                $(document).ready(function() {
                                    $('#dataTables-examplemreqsec').DataTable({
                                        responsive: true
                                    });
                                });

                                $(document).ready(function() {
                                    $('#dataTables-examplemyreqsec').DataTable({
                                        responsive: true
                                    });
                                });

                                $(document).ready(function() {
                                    $('#dataTables-examplea').DataTable({
                                        responsive: true
                                    });
                                });
                                $(document).ready(function() {
                                    $('#dataTables-examplesechis').DataTable({
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
<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
            .popover()
</script>
