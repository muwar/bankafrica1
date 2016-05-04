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

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                                           <?php   if(Yii::app()->session['country_chosen'] =='' ){ ?>

                        AFRICAPITAL QUOTE>><< CORPORATE FINANCE (CF)                                       QUOTES                                                                          <?php
?>
                                              
<?php }else{ $country=Countries::model()->findByPk(Yii::app()->session['country_chosen']);
 ?>
<label class="flag flag-<?php echo strtolower($country->iso_alpha2);?>" align="right"></label> 
 AFRICAPITAL QUOTE>><?php  echo $country->name ?><< CORPORATE FINANCE (CF)                                                                                                                              <?php
  } ?>


              
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">My listed projects</a>
                        </li>
                        <li><a href="#mreq" data-toggle="tab">My Requests</a>
                        </li>
                        <li><a href="#creq" data-toggle="tab">Customer Requests</a>
                        </li>
                        <li><a href="#interest" data-toggle="tab">Interest Panel</a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <button type="submit" onclick="event.preventDefault();
                                    registerneed(<?php echo $userid ?>);" class="btn btn-primary">List a new investment project</button>
                                    <?php // echo CHtml::link('Register new investment needs',array('registerneeds','onclick'=>'event.preventDefault();sendrequest()'))  ?>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Executive Summary</th>
                                        <th>Investment need</th>
                                        <th>Investment Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cfrecords as $cf) { ?>
                                        <tr >
                                            <td><?php echo $cf->project_name; ?></td>
                                            <td>
                                                <div class="tooltip-demo">
                                                    <label  data-toggle="tooltip" data-placement="top" title="Click to invest" onclick="loadform(<?php echo $cf->id . "," . $loggeduser->id; ?>)">
                                                        <?php
                                                        if ($cf->executive_summary == '')
                                                            echo $cf->exec_sum_valid;
                                                        else {
                                                            echo $cf->executive_summary;
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </td>
                                            <td><?php echo $cf->investment_need; ?></td>
                                            <td><?php echo InvestmentType::model()->findByPk($cf->investment_type)->name; ?></td>
                                        </tr>
                                    <?php } ?> </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="mreq">

                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-examplemyreqcf">
                                    <thead>
                                        <tr>
                                            <th>Sent to </th>
                                            <th>Date</th>
                                            <th>Project</th>
                                            <th>Summary</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Respond</th>
                                            <th>Complete</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $myreqcfs = Bqcf::model()->findAll('cus=:x', array(':x' => $userid));
                                        foreach ($myreqcfs as $myreqcf) {
                                            $cfproper = Cominvest::model()->findByPk($myreqcf->num);
                                            if(Yii::app()->session['country_chosen']==''){

                                            }
else{                                              if(Evuti::model()->findByPk($cfproper->user)->country_id!=Yii::app()->session['country_chosen']){
    continue;
}
else{
    ;
}
}
                                            $dcfs = Bqdcf::model()->findAll('cf_id=:x', array(':x' => $myreqcf->cdos));
                                            ?>
                                            <tr>
                                                <td><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $cfproper->company_id)))->resnam; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($myreqcf->dou)); ?></td>
                                                <td><?php echo $cfproper->project_name; ?></td>
                                                <td><?php echo $cfproper->executive_summary; ?></td>
                                                <td><?php echo $myreqcf->amo; ?></td>
                                                <td>
                                                    <?php
                                                    if ($myreqcf->proc == 0)
                                                        echo "New";
                                                    else {
                                                        if ($myreqcf->proc == 9)
                                                            echo "Completed";
                                                        else
                                                            echo "Pending";
                                                    }
                                                    ?>
                                                </td>
                                                <td>

                                                    <?php if ($myreqcf->proc == 9) { ?>
                                                        Approved<?php
                                                    } if (($myreqcf->proc == 0) || ( $myreqcf->proc == 3) || ($myreqcf->proc == 1)) {
                                                        ?><label>
                                                            Pending reply
                                                        </label><?php
                                                    }
                                                    if (($myreqcf->proc == 5) || ($myreqcf->proc == 4)) {
                                                        ?>
                                                        Approved<?php
                                                    }
                                                    if ($myreqcf->proc == 8) {
                                                        ?>
                                                        Rejected
                                                    <?php } ?>
                                                </td>

                                                <td>
                                                    <?php if ($myreqcf->proc == 5) { ?>
                                                        Already approved<?php
                                                    }
                                                    if ($myreqcf->proc == 8) {
                                                        ?>
                                                        Rejected<?php
                                                    } if (( $myreqcf->proc == 0) || ( $myreqcf->proc == 3) || ( $myreqcf->proc == 1)) {
                                                        ?>
                                                        <label>...</label>
                                                        <?php
                                                    }
                                                    if ($myreqcf->proc == 4) {
                                                        ?>
                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                            complete(<?php echo $myreqcf->cdos ?>);">Complete</button>
                                                            <?php } if ($myreqcf->proc == 9) {
                                                                ?>
                                                        <label>Completed</label>
                                                    <?php } ?>            
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-default" data-container="body" data-html="true" data-toggle="popover" data-placement="bottom"  
                                                            data-content="<?php foreach ($dcfs as $dcf) { ?>
                                                                <div class='panel-body'>
                                                                <ul class='chat'>
                                                                <?php if ($dcf->proc == 0) { ?>
                                                                    <li class='left clearfix'>                                                                        
                                                                    <div class='timeline-badge info'><i class='fa fa-user'><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqcf->cus)))->resnam; ?></i>&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4><strong>Request Sent</strong> </h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqcf->cus)))->resnam; ?>   request for a security of facevalue <?php echo $projproper->facevalue; ?> At a discount of <?php echo $projproper->discount . " %"; ?> 
                                                                    <a href='<?php echo '/bankafrica1/index.php?r=cbr/default/printrequest&cus_id=' . current(Bqcus::model()->findAll($myreqcf->cus))->cus . "&allcb_id=" . $allcb->cdos; ?>'>Print Request</a>
                                                                    <?php // echo CHtml::link('Print',array('printrequest','cus_id'=>current($clients)->cdos, 'allbl_id'=>                                            $allcb->cdos));   ?>
                                                                    <?php // echo CHtml::link('print',array('print'));    ?>
                                                                    </p>
                                                                    </div>

                                                                    </div>    
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dcf->proc == 1) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>Successful View</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>You have seen this request <?php echo current($clients)->resnam; ?>.</p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dcf->proc == 2) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'> A Quote Modification Request Has been sent</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>The modifications sent: <?php echo $dcf->remark; ?>.</p><br>
                                                                    <p>proposed rate: <?php echo $dcf->rate; ?></p><br>
                                                                    <p>Proposed amount: <?php
                                                                    if ($dcf->amount == 0)
                                                                        echo "The Suggested amount is OK";
                                                                    else
                                                                        echo $dcf->amount;
                                                                    ?></p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dcf->proc == 3) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($clients)->resnam; ?></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>Modification Made and resent</h4>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>Request modifications made: <?php echo $dcf->remark; ?>.</p>
                                                                    <p>proposed rate: <?php echo $dcf->rate; ?></p><br>
                                                                    <p>Proposed amount: <?php echo $dcf->amount; ?></p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dcf->proc == 4) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-check'><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqcf->cus)))->resnam; ?></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>

                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'> 
                                                                    <h4 class='timeline-title'>Investment accepted</h4>
                                                                    <a href='<?php // echo '/bankafrica1/index.php?r=cbr/default/printapproval&cus_id=' . current($clients)->cus . "&allcb_id=" . $allcb->cdos;       ?>'>Print Approval</a>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p>Request Accepted.</p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dcf->proc == 5) { ?>  
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge info'><i class='fa fa-refresh'></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
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
                                                                <?php if ($dcf->proc == 8) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge'> <i class='fa fa-user'>&nbsp;Me</i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
                                                                    <div class='timeline-badge info'>Quote Rejected
                                                                    </div>
                                                                    <div class='timeline-panel'> 
                                                                    <div class='timeline-heading'>
                                                                    <h4 class='timeline-title'>...</h4><i class='fa fa-times'></i>
                                                                    </div>
                                                                    <div class='timeline-body'>
                                                                    <p><?php echo $allcb->rejmot; ?></p>
                                                                    <p><?php echo $dcf->remark; ?></p>
                                                                    </div>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php if ($dcf->proc == 9) { ?>
                                                                    <li class='right clearfix'>
                                                                    <div class='timeline-badge'><i class='fa fa-check fa-2x'></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <small class=' text-muted'>
                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-examplecreqcf">
                                    <thead>
                                        <tr>
                                            <th>From</th>
                                            <th>Date</th>
                                            <th>Project</th>
                                            <th>Summary</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Respond</th>
                                            <th>Complete</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $projlists = Cominvest::model()->findAll('company_id=:x', array(':x' => $userid));
                                        if (count($projlists) != 0) {
                                            foreach ($projlists as $seclists) {
                                                $myreqcfs = Bqcf::model()->findAll('num=:x and valid=:y', array(':y' => 1, ':x' => $seclists->id));
                                                if (count($myreqcfs) == 0) {
                                                    continue;
                                                } else {
                                                    foreach ($myreqcfs as $myreqcf) {
                                                        $projproper = Cominvest::model()->findByPk($myreqcf->num);
                                                        $dcfs = Bqdcf::model()->findAll('cf_id=:x', array(':x' => $myreqcf->cdos));
                                                        if(Yii::app()->session['country_chosen']==''){

                                                        }
                                                        else{   

                                                        $user_test=Evuti::model()->findByPk($myreqcf->cus);
                                                        if($user_test->country_id != Yii::app()->session['country_chosen']){
                                                            continue;
                                                        }
                                                        else{
                                                            ;
                                                        }
}
                                                        ?>
                                                        <tr>
                                                            <td><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqcf->cus)))->resnam; ?></td>
                                                            <td><?php echo date('d/m/Y', strtotime($myreqcf->dou)); ?></td>
                                                            <td><?php echo $projproper->project_name; ?></td>
                                                            <td><?php echo $myreqcf->amo; ?></td>
                                                            <td><?php echo $projproper->exec_sum_valid; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($myreqcf->proc == 0){
                                                                    echo "New";
                                                                }
                                                                else {
                                                                    if ($myreqcf->proc == 9){
                                                                        echo "Completed";
                                                                    }
                                                                    else if($myreqcf->proc == 8){
                                                                        echo "Rejected";
                                                                    }
                                                                    else if(($myreqcf->proc == 5) || ($myreqcf->proc == 4)){
                                                                        echo "Approved";
                                                                    }
                                                                        
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>

                                                                <?php if ($myreqcf->proc == 9) { ?>
                                                                 Approved<?php
                                                                } if (($myreqcf->proc == 0) || ( $myreqcf->proc == 3) || ($myreqcf->proc == 1)) {
                                                                    ?>
                                                                    <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                                        accept(<?php echo $myreqcf->cdos ?>);">Accept</button><?php
                                                                        }
                                                                        if (($myreqcf->proc == 5) || ($myreqcf->proc == 4)) {
                                                                            ?>
                                                                    Approved<?php
                                                                }
                                                                if ($myreqcf->proc == 8) {
                                                                    ?>
                                                                    Rejected
                                                                <?php } ?>
                                                            </td>

                                                            <td>
                                                                <?php if (($myreqcf->proc == 5) || ($myreqcf->proc == 4)) { ?>
                                                                    Already approved<?php
                                                                }
                                                                if ($myreqcf->proc == 8) {
                                                                    ?>
                                                                    Rejected<?php
                                                                } if (( $myreqcf->proc == 0) || ( $myreqcf->proc == 3) || ( $myreqcf->proc == 1)) {
                                                                    ?>
                                                                    <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                                        reject(<?php echo $myreqcf->cdos; ?>);">Reject</button> <?php } ?>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-default" data-container="body" data-html="true" data-toggle="popover" data-placement="bottom"  
                                                                        data-content="<?php foreach ($dcfs as $dcf) { ?>
                                                                            <div class='panel-body'>
                                                                            <ul class='chat'>
                                                                            <?php if ($dcf->proc == 0) { ?>
                                                                                <li class='left clearfix'>                                                                        
                                                                                <div class='timeline-badge info'><i class='fa fa-user'><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqcf->cus)))->resnam; ?></i>&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <small class=' text-muted'>
                                                                                <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
                                                                                <div class='timeline-panel'> 
                                                                                <div class='timeline-heading'> 
                                                                                <h4><strong>Request Sent</strong> </h4>
                                                                                </div>
                                                                                <div class='timeline-body'>
                                                                                <p><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqcf->cus)))->resnam; ?>   request to invest <?php echo $dcf->amo; ?> in this project  <?php $projproper->project_name; ?>; 
                                                                                <a href='<?php echo '/bankafrica1/index.php?r=cbr/default/printrequest&cus_id=' . current(Bqcus::model()->findAll($myreqcf->cus))->cus . "&allcb_id=" . $allcb->cdos; ?>'>Print Request</a>
                                                                                <?php // echo CHtml::link('Print',array('printrequest','cus_id'=>current($clients)->cdos, 'allbl_id'=>                                            $allcb->cdos));    ?>
                                                                                <?php // echo CHtml::link('print',array('print'));     ?>
                                                                                </p>
                                                                                </div>

                                                                                </div>    
                                                                                </li>
                                                                            <?php } ?>
                                                                            <?php if ($dcf->proc == 1) { ?>
                                                                                <li class='right clearfix'>
                                                                                <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <small class=' text-muted'>
                                                                                <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
                                                                                <div class='timeline-panel'> 
                                                                                <div class='timeline-heading'> 
                                                                                <h4 class='timeline-title'>Successful View</h4>
                                                                                </div>
                                                                                <div class='timeline-body'>
                                                                                <p>You have seen this request <?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqcf->cus)))->resnam; ?>.</p>
                                                                                </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <?php if ($dcf->proc == 2) { ?>
                                                                                <li class='right clearfix'>
                                                                                <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <small class=' text-muted'>
                                                                                <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
                                                                                <div class='timeline-panel'> 
                                                                                <div class='timeline-heading'> 
                                                                                <h4 class='timeline-title'> A Quote Modification Request Has been sent</h4>
                                                                                </div>
                                                                                <div class='timeline-body'>
                                                                                <p>The modifications sent: <?php echo $dcf->remark; ?>.</p><br>
                                                                                <p>proposed rate: <?php echo $dcf->rate; ?></p><br>
                                                                                <p>Proposed amount: <?php
                                                                                if ($dcf->amount == 0)
                                                                                    echo "The Suggested amount is OK";
                                                                                else
                                                                                    echo $dcf->amount;
                                                                                ?></p>
                                                                                </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <?php if ($dcf->proc == 3) { ?>
                                                                                <li class='right clearfix'>
                                                                                <div class='timeline-badge info'><i class='fa fa-user'><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqcf->cus)))->resnam; ?></i>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <small class=' text-muted'>
                                                                                <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
                                                                                <div class='timeline-panel'> 
                                                                                <div class='timeline-heading'> 
                                                                                <h4 class='timeline-title'>Modification Made and resent</h4>
                                                                                </div>
                                                                                <div class='timeline-body'>
                                                                                <p>Request modifications made: <?php echo $dcf->remark; ?>.</p>
                                                                                <p>proposed rate: <?php echo $dcf->rate; ?></p><br>
                                                                                <p>Proposed amount: <?php echo $dcf->amount; ?></p>
                                                                                </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <?php if ($dcf->proc == 4) { ?>
                                                                                <li class='right clearfix'>
                                                                                <div class='timeline-badge info'><i class='fa fa-check'><?php echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $myreqcf->cus)))->resnam; ?></i>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <small class=' text-muted'>
                                                                                <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>

                                                                                <div class='timeline-panel'> 
                                                                                <div class='timeline-heading'> 
                                                                                <h4 class='timeline-title'>Quote approval made</h4>
                                                                                <a href='<?php // echo '/bankafrica1/index.php?r=cbr/default/printapproval&cus_id=' . current($clients)->cus . "&allcb_id=" . $allcb->cdos;        ?>'>Print Approval</a>
                                                                                </div>
                                                                                <div class='timeline-body'>
                                                                                <p>Request Accepted.</p>
                                                                                </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <?php if ($dcf->proc == 5) { ?>  
                                                                                <li class='right clearfix'>
                                                                                <div class='timeline-badge info'><i class='fa fa-refresh'></i>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <small class=' text-muted'>
                                                                                <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
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
                                                                            <?php if ($dcf->proc == 8) { ?>
                                                                                <li class='right clearfix'>
                                                                                <div class='timeline-badge'> <i class='fa fa-user'>&nbsp;Me</i>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <small class=' text-muted'>
                                                                                <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
                                                                                <div class='timeline-badge info'>Quote Rejected
                                                                                </div>
                                                                                <div class='timeline-panel'> 
                                                                                <div class='timeline-heading'>
                                                                                <h4 class='timeline-title'>...</h4><i class='fa fa-times'></i>
                                                                                </div>
                                                                                <div class='timeline-body'>
                                                                                <p><?php echo $allcb->rejmot; ?></p>
                                                                                <p><?php echo $dcf->remark; ?></p>
                                                                                </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <?php if ($dcf->proc == 9) { ?>
                                                                                <li class='right clearfix'>
                                                                                <div class='timeline-badge'><i class='fa fa-check fa-2x'></i>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <small class=' text-muted'>
                                                                                <i class='fa fa-clock-o fa-fw'></i><?php echo $dcf->dou; ?></small></div>
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
                                                }
                                            }
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
                                            <th>Project</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $myreqcfcontacts = Bqcfcontact::model()->findAll('cus=:x', array(':x' => $userid));
                                        if (count($myreqcfcontacts) > 0) {
                                            foreach ($myreqcfcontacts as $myreqcfcontact) {
                                            $cfproperc = Cominvest::model()->findByPk($myreqcfcontact->num);
                                                
                                                    if(Yii::app()->session['country_chosen']==''){

                                                    }
                                                    else{
                                                        if($cfproperc!=Yii::app()->session['country_chosen']){
                                                            continue;
                                                        }
                                                        else{
                                                            ;
                                                        }
                                                    }

                                                ?>
                                                <tr>
                                                    <td><?php echo $cfproperc->project_name;//echo current(Bqcus::model()->findAll('cus=:x', array(':x' => $cfproperc->company_id)))->resnam;  ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($myreqcfcontact->dou)); ?></td>
                                                    <td><?php
                                                        if ($myreqcfcontact->valid == 0) {
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
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
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
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Project Name</label>
                            <div class="col-sm-9">
                                <input class="form-control"  style='border-radius: 0px 10px 0px 10px;' placeholder="Project Name" name="projname" id="projname" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Executive Summary</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"  style='border-radius: 0px 10px 0px 10px;' placeholder="Executive Summary of the project" name="execsum" id="execsum" cols="20" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Investment Type</label>
                            <div class="col-sm-9">
                                <?php echo CHtml::dropDownList('investmttype', 'id', CHtml::listData(InvestmentType::model()->findAll(), 'id', 'name'), array('empty' => 'Choose a Investment Types', 'id' => 'investtype', 'style' => 'border-radius: 0px 10px 0px 10px;')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Worth of investment need</label>
                            <div class="col-sm-9">
                                <input class="form-control"  style='border-radius: 0px 10px 0px 10px;' placeholder="Amount" name="amount" id="amount" type="text" value="">
                            </div>
                        </div>
                        <input class="form-control" style='border-radius: 0px 10px 0px 10px;' name="userid" id="userid" type="hidden" value="">


                    </fieldset>
                </form>
            </div>
            <div class="modal-footer"><p align="center">
                    <button style='border-radius: 0px 10px 0px 10px;' type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                    $('#theTitle').html("Corporate Finance-Create Company Profile");

                                    document.getElementById("userid").value = id;
                                    $('#formModal').modal('show');
                                }
                                function submitrequest() {

                                    var projname = document.getElementById("projname").value;
                                    var execsum = document.getElementById("execsum").value;
                                    var investtype = document.getElementById("investtype").value;
                                    var amount = document.getElementById("amount").value;
                                    var id = document.getElementById("userid").value;

                                    if (amount === '') {
                                        alert("Error: You have failed to fill the amount. Please refill and try again.");
                                    }
                                    else {
                                        $.ajax({
                                            type: "GET",
                                            url: "http://" + document.getElementById('url').value + "/"+document.getElementById("base").value+ "/index.php?r=cf/default/submitrequest" + "&projname=" + projname +
                                                    "&amount=" + amount +
                                                    "&execsum=" + execsum +
                                                    "&id=" + id +
                                                    "&investtype=" + investtype
                                                    ,
                                            data: "", //ProposedSites
                                            cache: false,
                                            success: function(data) {
                                                if (data == 'true') {
                                                    $('#msg').html(" Your project summary has been submitted successfully");
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
                                        url: "http://" + document.getElementById('url').value + "/"+document.getElementById("base").value+ "/index.php?r=cf/default/accept&id=" + id
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
                                        url: "http://" + document.getElementById('url').value + "/"+document.getElementById("base").value+ "/index.php?r=cf/default/reject&id=" + id
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
                                        url: "http://" + document.getElementById('url').value + "/"+document.getElementById("base").value+ "/index.php?r=cf/default/complete&id=" + id
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

                                $(document).ready(function() {
                                    $('#dataTables-examplemyreqcf').DataTable({
                                        responsive: true
                                    });
                                });
                                $(document).ready(function() {
                                    $('#dataTables-examplecreqcf').DataTable({
                                        responsive: true
                                    });
                                });
                                $(document).ready(function() {
                                    $('#dataTables-examplemyreqcfint').DataTable({
                                        responsive: true
                                    });
                                });

</script>