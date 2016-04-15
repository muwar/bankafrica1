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
    <div class="row">
        <div class="col-md-12">
            <?php
            $ucodes = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
            foreach ($ucodes as $ucode)
                ;
            $allcbs = Bqcb::model()->findAll('lban=:y', array(':y' => $ucode->id));

            $cbhistory = Bqcb::model()->findAll('lban=:y or cus=:x', array(':y' => $ucode->id, ':x' => $ucode->id))
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"></a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#rates" data-toggle="tab">Rates</a>
                            </li>
                            <li><a href="#conf" data-toggle="tab">Configuration</a>
                            </li>
                            <li><a href="#creq" data-toggle="tab"> Customer Requests</a>
                            </li>
                            <li><a href="#mreq" data-toggle="tab"> My Requests</a>
                            </li>
                            <li><a href="#his" data-toggle="tab"> History of Transactions</a>
                            </li>
                            <li><a href="#ratehis" data-toggle="tab"> Evolution of Rates</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="rates">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
<!--                                                <th> Operation</th> -->
                                                <th>Minimum</th>
                                                <?php foreach ($terms as $tterm) { ?>
                                                    <th><?php echo $tterm->term_name; ?></th>
                                                <?php } ?>
<!--             <th>Edit</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($rates as $rate) {
                                                if (($rate->rt_name == "Commercial Borrowing") || ($rate->rt_name == "Commercial Borrowing Rates")) {
                                                    echo "<tr class='odd gradeX'>";
                                                    //                    echo "<td>" . $rate->rt_name . "</td>"; 
                                                    $findusercode = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
                                                    $usercode = current($findusercode)->id;
                                                    $iinstrates = InstitutionsQuotation::model()->findAll('quotation_id=:x and institution_id=:z', array(':x' => $rate->rt_id, ':z' => $usercode));
                                                    rsort($iinstrates);
                                                    ?>
                                                <td><?php echo current($iinstrates)->minimum_amount; ?></td>
                                                <?php
                                                foreach ($terms as $term1) {
                                                    $instrates = InstitutionsQuotation::model()->findAll('quotation_id=:x and term_id=:y and institution_id=:z', array(':x' => $rate->rt_id, ':y' => $term1->term_id, ':z' => $usercode));
                                                    rsort($instrates);

                                                    if (count($instrates) == 0)
                                                        echo "<td ><div class='tooltip-demo' ><label type='label' class='' data-html='true' data-toggle='tooltip' data-placement='top' title='This rate has not been set'>NA</label></div></td>";
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

                                                                       " value="<?php echo current($instrates)->institutions_quotation_id; ?>" >
                                                                           <?php echo current($instrates)->lrate . " %" ?>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <?php
                                                    }
                                                }
                                             
                                                //               echo "<td>".CHtml::link('', array('#'), array('class' => 'fa fa-edit fa-2x', 'data-toggle' => 'modal', 'data-target' => '#editModal'))."</td>";
                                                echo "</tr>";
                                            }
                                            else
                                                continue;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <div class="tab-pane fade" id="conf">
                                <?php
                                $ratecount = 0;
                                foreach ($rates as $rate) {
                                    if (($rate->rt_name == "Commercial Borrowing") || ($rate->rt_name == "Commercial Borrowing Rate")) {
                                        $ratecount++
                                        ?>
                                        <div class="panel-default">
                                            <div class="panel-heading">
                                                <h3 align="center"><label style="color:navy;font-size: 22px;"><!--<input type="checkbox"  value="<?php echo $rate->rt_id; ?>" onclick="toggle1(this.value)">--><?php echo $rate->rt_name ?></label></h3>
                                            </div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-exampler">
                                                        <thead>
                                                            <tr>
                                                                <th>Term</th>
                                                                <th>Rate</th>
                                                                <th>Biddable?</th>
                                                                <th>Minimum amount</th>
                                                                <th>Setup charges</th>
                                                                <th>Other fees</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            $useris = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
                                                            foreach ($useris as $useri)
                                                                ;
                                                            $termcount = 0;
                                                            foreach ($terms as $term) {
                                                                $termcount++;
                                                                $checkrecentrecords = InstitutionsQuotation::model()->findAll('institution_id=:x and quotation_id=:y and term_id=:z', array(':x' => $useri->id, ':y' => $rate->rt_id, ':z' => $term->term_id));
                                                                rsort($checkrecentrecords);
                                                                $checkrecentrecord = current($checkrecentrecords);
                                                                if (count($checkrecentrecords) == 0) {
                                                                    ?>
                                                                    <tr>
                                                                <input type="hidden" class="form-control" id="institution<?php echo $rate->rt_id . $term->term_id; ?>" value="<?php echo $useri->id; ?>" name="institution" placeholder="Institution">
                                                                <input type="hidden" class="form-control" id="rateT<?php echo $rate->rt_id . $term->term_id; ?>" value="<?php echo $rate->rt_id; ?>" name="rateT" placeholder="rate type ">
                                                                <input type="hidden" value=0 id="state<?php echo $rate->rt_id . $term->term_id; ?>">
                                                                <input type="hidden" class="form-control" id="term<?php echo $rate->rt_id . $term->term_id; ?>" name="term" value="<?php echo $term->term_id; ?>" placeholder="Term"><!--This will automatically be populated from the options-->
                                                                <td><label><?php echo $term->term_name; ?></label></td>
                                                                <td><input type="text" class="form-control" id="rate<?php echo $rate->rt_id . $term->term_id; ?>" name="rate" placeholder="Rate "></td>
                                                                <td><input value='<?php echo $rate->rt_id . $term->term_id; ?>' type="checkbox" id="specialrates<?php echo $rate->rt_id . $term->term_id; ?>" name="specialrates<?php echo $rate->rt_id . $term->term_id; ?>" onclick="switcher(this.value)" ></td>
                                                                <td><input type="text" class="form-control" id="minamount<?php echo $rate->rt_id . $term->term_id; ?>" name="minamount" placeholder="Minimum amt "></td>
                                                                <td><input type="text" class="form-control" id="scharges<?php echo $rate->rt_id . $term->term_id; ?>" name="scharges" placeholder="Setup charges "></td>
                                                                <td><input type="text" class="form-control" id="ofees<?php echo $rate->rt_id . $term->term_id; ?>" name="ofees" placeholder="Other fees "></td>
                                                                </tr>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                <input type="hidden" class="form-control" id="institution<?php echo $rate->rt_id . $term->term_id; ?>" value="<?php echo $useri->id; ?>" name="institution" placeholder="Institution">
                                                                <input type="hidden" class="form-control" id="rateT<?php echo $rate->rt_id . $term->term_id; ?>" value="<?php echo $rate->rt_id; ?>" name="rateT" placeholder="rate type ">
                                                                <input type="hidden" value=0 id="state<?php echo $rate->rt_id . $term->term_id; ?>">
                                                                <input type="hidden" class="form-control" id="term<?php echo $rate->rt_id . $term->term_id; ?>" name="term" value="<?php echo $term->term_id; ?>" placeholder="Term"><!--This will automatically be populated from the options-->
                                                                <td><label><?php echo $term->term_name; ?></label></td>
                                                                <td><input type="text" class="form-control" id="rate<?php echo $rate->rt_id . $term->term_id; ?>" name="rate" placeholder="<?php echo $checkrecentrecord->lrate; ?> "></td>
                                                                <td><input value='<?php echo $rate->rt_id . $term->term_id; ?>' type="checkbox" id="specialrates<?php echo $rate->rt_id . $term->term_id; ?>" name="specialrates<?php echo $rate->rt_id . $term->term_id; ?>" onclick="switcher(this.value)" <?php
                                                                    if ($checkrecentrecord->special_rate == 1)
                                                                        echo "checked";
                                                                    else
                                                                        ;
                                                                    ?></td>
                                                                <td><input type="text" class="form-control" id="minamount<?php echo $rate->rt_id . $term->term_id; ?>" name="minamount" placeholder="<?php echo $checkrecentrecord->minimum_amount; ?>"></td>
                                                                <td><input type="text" class="form-control" id="scharges<?php echo $rate->rt_id . $term->term_id; ?>" name="scharges" placeholder="<?php echo $checkrecentrecord->setup_charges; ?> "></td>
                                                                <td><input type="text" class="form-control" id="ofees<?php echo $rate->rt_id . $term->term_id; ?>" name="ofees" placeholder="<?php echo $checkrecentrecord->other_fees; ?>"></td>
                                                                </tr>

                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <button type="submit" value="<?php echo $rate->rt_id; ?>" id="<?php echo $rate->rt_id; ?>" class="btn btn-primary" onclick="event.preventDefault();
                savebulkrate(this.value);">Save</button>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <input type="hidden" class="form-control" id="ratecount" name="ratecount" value="<?php echo $ratecount; ?>">
                                <input type="hidden" class="form-control" id="termcount" name="termcount" value="<?php echo $termcount; ?>">

                            </div>
                            <div class="tab-pane fade" id="creq">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-exampler1">
                                        <thead>
                                            <tr>
                                                <th>For</th>

                                                <th>Client</th>
                                                <th>Date</th>
                                                <th>Rate</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Approve</th>
                                                <th>Reject</th>
                                                <th>Modify</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($allcbs as $allcb) {
                                                $statedrate = InstitutionsQuotation::model()->findByPk($allcb->num);
                                                $ratetype = RateTypes::model()->findByPk($statedrate->quotation_id);
                                                $clients = Bqcus::model()->findAll('cus=:x', array(':x' => $allcb->cus));
                                                $dibls = Bqdcb::model()->findAll('cb_id=:x', array(':x' => $allcb->cdos));
                                                if ($allcb->proc == 0) {
//                                                                $op="CBR";
                                                    ?>
                                                    <tr style="color:purple"  onclick="vieweffected(<?php echo $allcb->cdos . "," . "'CBR'"; ?>);">
                                                        <?php
                                                    } else {
                                                        ?>
                                                    <tr>
                                                    <?php } ?>
                                                    <td><?php echo $ratetype->rt_name; ?></td>
                                                    <td><?php echo current($clients)->resnam; ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($allcb->dou)); ?></td>
                                                    <td><div class="tooltip-demo">
                                                            <label type="label" data-html="true" class="" data-toggle="tooltip" data-placement="top" title="These values were stated;
                                                                   Rate stated: <?php echo $statedrate->lrate; ?><br>
                                                                   Special rate: <?php
                                                                   if ($statedrate->special_rate == 0)
                                                                       echo "No<br>";
                                                                   if ($statedrate->special_rate == 1)
                                                                       echo "Yes<br>";
                                                                   ?>
                                                                   Minimum amount:<?php
                                                                   if ($statedrate->minimum_amount == '')
                                                                       echo "0";
                                                                   else
                                                                       echo $statedrate->minimum_amount;
                                                                   ?><br>
                                                                   Setup Charges:<?php
                                                                   if ($statedrate->setup_charges == '')
                                                                       echo '0';
                                                                   else
                                                                       echo $statedrate->setup_charges;
                                                                   ?> <br>
                                                                   Other Fees: <?php
                                                                   if ($statedrate->other_fees == '')
                                                                       echo '0';
                                                                   else
                                                                       echo $statedrate->other_fees;
                                                                   ?><br>
                                                                   " value="<?php echo $statedrate->institutions_quotation_id; ?>" >
                                                                       <?php echo $allcb->lrat . " %" ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td><div class="tooltip-demo">
                                                            <label type="label" data-html="true" class="" data-toggle="tooltip" data-placement="top" title="These values were stated;
                                                                   Rate stated: <?php echo $statedrate->lrate; ?><br>
                                                                   Special rate: <?php
                                                                   if ($statedrate->special_rate == 0)
                                                                       echo "No<br>";
                                                                   if ($statedrate->special_rate == 1)
                                                                       echo "Yes<br>";
                                                                   ?>
                                                                   Minimum amount:<?php
                                                                   if ($statedrate->minimum_amount == '')
                                                                       echo "0";
                                                                   else
                                                                       echo $statedrate->minimum_amount;
                                                                   ?><br>
                                                                   Setup Charges:<?php
                                                                   if ($statedrate->setup_charges == '')
                                                                       echo '0';
                                                                   else
                                                                       echo $statedrate->setup_charges;
                                                                   ?> <br>
                                                                   Other Fees: <?php
                                                                   if ($statedrate->other_fees == '')
                                                                       echo '0';
                                                                   else
                                                                       echo $statedrate->other_fees;
                                                                   ?><br>
                                                                   " value="<?php echo $statedrate->institutions_quotation_id; ?>" >
                                                                       <?php echo $allcb->amo; ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td><?php
                                                        if ($allcb->proc == 0)
                                                            echo "New";
                                                        else {
                                                            if ($allcb->proc == 9)
                                                                echo "Completed";
                                                            else
                                                                echo "Pending";
                                                        }
                                                        ?></td>


                                                    <td>
                                                        <?php if ($allcb->proc == 9) { ?>
                                                            Approved<?php
                                                        } if (( $allcb->proc == 0) || ( $allcb->proc == 3) || ( $allcb->proc == 1)) {
                                                            ?>
                                                            <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                accept(<?php echo $allcb->cdos . "," . "'CBR'" ?>);">Accept</button><?php
                                                                }
                                                                if (( $allcb->proc == 5)) {
                                                                    ?>
                                                            Approved
                                                            <!--    <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
        approve(<?php echo $allcb->cdos . "," . "'CBR'" ?>);">Approve</button>--><?php } ?></td>
                                                    <td>
                                                        <?php if ($allcb->proc == 5) { ?>
                                                            Already approved<?php
                                                        }
                                                        if ($allcb->proc == 8) {
                                                            ?>
                                                            Rejected<?php
                                                        } if (( $allcb->proc == 0) || ( $allcb->proc == 3) || ( $allcb->proc == 1)) {
                                                            ?>
                                                            <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                rejectl(<?php echo $allcb->cdos . "," . "'CBR'"; ?>);">Reject</button> <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (( $allcb->proc == 8)) {
                                                            ?>
                                                            Rejected <?php
                                                        }
                                                        if (( $allcb->proc == 3) || ( $allcb->proc == 4)) {
                                                            ?>
                                                            Modified<?php
                                                        }
                                                        if ($allcb->proc == 5) {
                                                            ?>
                                                            <!--        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
            complete(<?php echo $allcb->cdos . "," . "'CBR'"; ?>);">Completed?</button> 
                
                                                            -->
                                                            ...<?php
                                                        }
                                                        if ($allcb->proc == 9) {
                                                            ?>Completed
                                                            <?php
                                                        }
                                                        if (/* (                                            $allcb->proc == 2) || */( $allcb->proc == 1) || ( $allcb->proc == 0)) {
                                                            ?>  
                                                            <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                modifyl(<?php echo $allcb->cdos . "," . "'CBR'"; ?>);">Modify</button> <?php } ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-container="body" data-html="true" data-toggle="popover" data-placement="bottom"  
                                                                data-content="<?php foreach ($dibls as $dibl) { ?>
                                                                    <div class='panel-body'>
                                                                    <ul class='chat'>
                                                                    <?php if ($dibl->proc == 0) { ?>
                                                                        <li class='left clearfix'>                                                                        

                                                                        <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($clients)->resnam; ?></i>&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $dibl->dou; ?></small></div>
                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'> 
                                                                        <h4><strong>Request Sent</strong> </h4>
                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        <p><?php echo current($clients)->resnam; ?>  <?php echo Terms::model()->findByPk(InstitutionsQuotation::model()->findByPk($allcb->num)->term_id)->term_name; ?> request of  <?php echo $allcb->amo . " for rate  " . $allcb->lrat . " %"; ?> .
                                                                        <a href='<?php echo '/bankafrica1/index.php?r=cbr/default/printrequest&cus_id=' . current($clients)->cus . "&allcb_id=" . $allcb->cdos; ?>'>Print Request</a>
                                                                        <?php // echo CHtml::link('Print',array('printrequest','cus_id'=>current($clients)->cdos, 'allbl_id'=>                                            $allcb->cdos));  ?>
                                                                        <?php // echo CHtml::link('print',array('print'));  ?>
                                                                        </p>
                                                                        </div>

                                                                        </div>    
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($dibl->proc == 1) { ?>
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $dibl->dou; ?></small></div>
                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'> 
                                                                        <h4 class='timeline-title'>Successful View</h4>
                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        <p>You have seen this request <?php echo current($clients)->resnam; ?>.</p>
                                                                        </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($dibl->proc == 2) { ?>
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $dibl->dou; ?></small></div>
                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'> 
                                                                        <h4 class='timeline-title'> A Quote Modification Request Has been sent</h4>
                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        <p>The modifications sent: <?php echo $dibl->remark; ?>.</p><br>
                                                                        <p>proposed rate: <?php echo $dibl->rate; ?></p><br>
                                                                        <p>Proposed amount: <?php
                                                                        if ($dibl->amount == 0)
                                                                            echo "The Suggested amount is OK";
                                                                        else
                                                                            echo $dibl->amount;
                                                                        ?></p>
                                                                        </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($dibl->proc == 3) { ?>
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($clients)->resnam; ?></i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $dibl->dou; ?></small></div>
                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'> 
                                                                        <h4 class='timeline-title'>Modification Made and resent</h4>
                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        <p>Request modifications made: <?php echo $dibl->remark; ?>.</p>
                                                                        <p>proposed rate: <?php echo $dibl->rate; ?></p><br>
                                                                        <p>Proposed amount: <?php echo $dibl->amount; ?></p>
                                                                        </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($dibl->proc == 4) { ?>
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge info'><i class='fa fa-check'><?php echo current($clients)->resnam; ?></i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $dibl->dou; ?></small></div>

                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'> 
                                                                        <h4 class='timeline-title'>Quote approval made</h4>
                                                                        <a href='<?php echo '/bankafrica1/index.php?r=cbr/default/printapproval&cus_id=' . current($clients)->cus . "&allcb_id=" . $allcb->cdos; ?>'>Print Approval</a>
                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        <p>Request Accepted.</p>
                                                                        </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($dibl->proc == 5) { ?>  
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge info'><i class='fa fa-refresh'></i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $dibl->dou; ?></small></div>
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
                                                                    <?php if ($dibl->proc == 8) { ?>
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge'> <i class='fa fa-user'>&nbsp;Me</i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $dibl->dou; ?></small></div>
                                                                        <div class='timeline-badge info'>Quote Rejected
                                                                        </div>
                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'>
                                                                        <h4 class='timeline-title'>...</h4><i class='fa fa-times'></i>
                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        <p><?php echo $allcb->rejmot; ?></p>
                                                                        <p><?php echo $dibl->remark; ?></p>
                                                                        </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($dibl->proc == 9) { ?>
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge'><i class='fa fa-check fa-2x'></i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $dibl->dou; ?></small></div>
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
                            <div class="tab-pane fade" id="mreq">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-exampler4">
                                        <thead>
                                            <tr>
                                                <th>Sent to </th>
                                                <th>Date</th>
                                                <th>Rate</th>
                                                <th>amt requested</th>

                                                <th>Status</th>
                                                <th>Respond</th>
                                                <th>Complete</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $myreqfds = Bqcb::model()->findAll('cus=:x', array(':x' => $ucode->id));
                                            foreach ($myreqfds as $myreqfd) {
                                                $ratingibl = InstitutionsQuotation::model()->findByPk($myreqfd->num);
                                                $ratingrateibl = RateTypes::model()->findByPk($ratingibl->quotation_id);
                                                $senttoibl = Bqcus::model()->findAll('cus=:x', array(':x' => $myreqfd->lban));
                                                $detailibls = Bqdcb::model()->findAll('cb_id=:x', array(':x' => $myreqfd->cdos));
                                                ?>
                                                <tr>
                                                    <td> <?php echo current($senttoibl)->resnam; ?></td>   
                                                    <td><?php echo date('d/m/Y', strtotime($myreqfd->dou)); ?></td>
                                                    <td>
                                                        <div class="tooltip-demo">
                                                            <label type="label" data-html="true" class="" data-toggle="tooltip" data-placement="top" title="These values were stated:<br>
                                                                   Rate stated: <?php echo $ratingibl->lrate; ?><br>
                                                                   Special rate: <?php
                                                                   if ($ratingibl->special_rate == 0)
                                                                       echo "No<br>";
                                                                   if ($ratingibl->special_rate == 1)
                                                                       echo "Yes<br>";
                                                                   ?>
                                                                   Minimum amount:<?php
                                                                   if ($ratingibl->minimum_amount == '')
                                                                       echo "0";
                                                                   else
                                                                       echo $ratingibl->minimum_amount;
                                                                   ?><br>
                                                                   Setup Charges:<?php
                                                                   if ($ratingibl->setup_charges == '')
                                                                       echo '0';
                                                                   else
                                                                       echo $ratingibl->setup_charges;
                                                                   ?> <br>
                                                                   Other Fees: <?php
                                                                   if ($ratingibl->other_fees == '')
                                                                       echo '0';
                                                                   else
                                                                       echo $ratingibl->other_fees;
                                                                   ?><br>
                                                                   " value="<?php echo $ratingibl->institutions_quotation_id; ?>" >
                                                                       <?php echo $myreqfd->lrat . " %"; ?>  
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>                                                                        <div class="tooltip-demo">
                                                            <label type="label" data-html="true" class="" data-toggle="tooltip" data-placement="top" title="These values were stated:<br>
                                                                   Rate stated: <?php echo $ratingibl->lrate; ?><br>
                                                                   Special rate: <?php
                                                                   if ($ratingibl->special_rate == 0)
                                                                       echo "No<br>";
                                                                   if ($ratingibl->special_rate == 1)
                                                                       echo "Yes<br>";
                                                                   ?>
                                                                   Minimum amount:<?php
                                                                   if ($ratingibl->minimum_amount == '')
                                                                       echo "0";
                                                                   else
                                                                       echo $ratingibl->minimum_amount;
                                                                   ?><br>
                                                                   Setup Charges:<?php
                                                                   if ($ratingibl->setup_charges == '')
                                                                       echo '0';
                                                                   else
                                                                       echo $ratingibl->setup_charges;
                                                                   ?> <br>
                                                                   Other Fees: <?php
                                                                   if ($ratingibl->other_fees == '')
                                                                       echo '0';
                                                                   else
                                                                       echo $ratingibl->other_fees;
                                                                   ?><br>
                                                                   " value="<?php echo $ratingibl->institutions_quotation_id; ?>" >
                                                                       <?php echo $myreqfd->amo; ?>    
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#">
                                                            <div>
                                                                <p>
                                                                    <strong> <?php
                                                                        if ($myreqfd->proc == 0)
                                                                            echo "Request sent";
                                                                        if ($myreqfd->proc == 1)
                                                                            echo "Request seen";
                                                                        if ($myreqfd->proc == 2)
                                                                            echo "Modification requested";
                                                                        if ($myreqfd->proc == 3)
                                                                            echo "Modification made";
                                                                        if ($myreqfd->proc == 4)
                                                                            echo "Approved";
                                                                        if ($myreqfd->proc == 5)
                                                                            echo "Transaction in progress";
                                                                        if ($myreqfd->proc == 8)
                                                                            echo "Rejected";
                                                                        if ($myreqfdl->proc == 9)
                                                                            echo "Completed";
                                                                        ?></strong>
                                                                    <span class="pull-right text-muted"><?php echo round(((($myreqfd->proc) / 9) * 100), 0) . " %"; ?> Complete</span>
                                                                </p>
                                                                <div class="progress progress-striped active">
                                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo (($myreqfd->proc) / 9) * 100; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($myreqfd->proc) / 9) * 100; ?>%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (($myreqfd->proc == 1) || ($myreqfd->proc == 0) || ($myreqfd->proc == 5)) {
                                                            ?>
                                                            <h1 align='center'>    ...</h1>
                                                        <?php } if ($myreqfd->proc == 2) { ?>
                                                            <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                modifyl(<?php echo $myreqfd->cdos . "," . "'CBR'"; ?>);">Respond</button> <?php
                                                                }
                                                                if ($myreqfd->proc == 3) {
                                                                    ?>
                                                            Modified<?php
                                                        }
                                                        if ($myreqfd->proc == 4) {
                                                            ?>
                                                            Accepted<?php
                                                        }
                                                        if ($myreqfd->proc == 8) {
                                                            ?>
                                                            Rejected<?php
                                                        }
                                                        if ($myreqfd->proc == 9) {
                                                            ?>
                                                            Completed<?php
                                                        }
                                                        ?>  
                                                    </td>
                                                    <td>
                                                        <?php if ($myreqfd->proc == 5) {
                                                            ?>
                                                            <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                complete(<?php echo $myreqfd->cdos . "," . "'CBR'"; ?>);">Completed?</button> <?php
                                                                }
                                                                if ($myreqfd->proc == 9) {
                                                                    ?>Completed
                                                            <?php
                                                        } else {
                                                            echo " ... ";
                                                        }
                                                        ?>
                                                    </td>

                                                    <td><button type="button" class="btn btn-default" data-container="body" data-html="true" data-toggle="popover" data-placement="bottom"  
                                                                data-content="<?php foreach ($detailibls as $detailibl) { ?>
                                                                    <div class='panel-body'>
                                                                    <ul class='chat'>
                                                                    <?php if ($detailibl->proc == 0) { ?>
                                                                        <li class='left clearfix'>                                                                        
                                                                        <div class='timeline-badge info'><i class='fa fa-user'>Me</i>&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $detailibl->dou; ?></small></div>
                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'> 
                                                                        <h4><strong>Request Sent</strong></h4>
                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        <p>Request sent to <?php echo current($senttoibl)->resnam; ?> for <?php echo $ratingrateibl->rt_name; ?>. The quotation was done for <?php echo $myreqfd->amo . " at rate  " . $myreqfd->lrat . " %"; ?> .</p>
                                                                        <a href='<?php echo '/bankafrica1/index.php?r=cbr/default/printrequest&cus_id=' . $ucode->id . "&allcb_id=" . $myreqfd->cdos; ?>'>Print Request</a>

                                                                        </div>
                                                                        </div>    
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($detailibl->proc == 1) { ?>
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($senttoibl)->resnam; ?></i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $detailibl->dou; ?></small></div>
                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'> 
                                                                        <h4 class='timeline-title'>Successful View</h4>
                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        <p>The request sent has been seen by <?php echo current($senttoibl)->resnam; ?>.</p>
                                                                        </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($detailibl->proc == 2) { ?>
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($senttoibl)->resnam; ?></i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $detailibl->dou; ?></small></div>
                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'> 
                                                                        <h4 class='timeline-title'>Bank Modification Requested</h4>
                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        <p>The modifications sent: <?php echo $detailibl->remark; ?>.</p><br>
                                                                        <p>proposed rate: <?php echo $detailibl->rate; ?></p><br>
                                                                        <p>Proposed amount: <?php
                                                                        if ($detailibl->amount == 0)
                                                                            echo "The Suggested amount is OK";
                                                                        else
                                                                            echo $detailibl->amount;
                                                                        ?></p>
                                                                        </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($detailibl->proc == 3) { ?>
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $detailibl->dou; ?></small></div>
                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'> 
                                                                        <h4 class='timeline-title'>Modification Sent</h4>
                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        <p>Request modifications made: <?php echo $detailibl->remark; ?>.</p>
                                                                        <p>proposed rate: <?php echo $detailibl->rate; ?></p><br>
                                                                        <p>Proposed amount: <?php echo $detailibl->amount; ?></p>
                                                                        </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($detailibl->proc == 4) { ?>
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($senttoibl)->resnam; ?></i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $detailibl->dou; ?></small></div>

                                                                        </div>
                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'> 
                                                                        <p><h4 class='timeline-title'>Quote accepted by Lender</h4></p>
                                                                        <p><a href='<?php echo '/bankafrica1/index.php?r=cbr/default/printapproval&cus_id=' . $ucode->id . "&allcb_id=" . $myreqfd->cdos; ?>'>Print Approval statement</a></p>

                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        <p>Request Accepted.</p>
                                                                        </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($detailibl->proc == 5) { ?>  
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge'><i class='fa fa-refresh'></i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $detailibl->dou; ?></small></div>
                                                                        <div class='timeline-badge info'>Transaction in progress...
                                                                        </div>
                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'> 
                                                                        <h4 class='timeline-title'>...</h4>
                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($detailibl->proc == 8) { ?>
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge'> <i class='fa fa-user'>&nbsp;<?php echo current($senttoibl)->resnam; ?></i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $detailibl->dou; ?></small></div>
                                                                        <div class='timeline-badge info'>Quote Rejected
                                                                        </div>
                                                                        <div class='timeline-panel'> 
                                                                        <div class='timeline-heading'>
                                                                        <h4 class='timeline-title'>...</h4><i class='fa fa-times'></i>
                                                                        </div>
                                                                        <div class='timeline-body'>
                                                                        <p><?php echo $myreqfd->rejmot; ?></p>
                                                                        <p><?php echo $detailibl->remark; ?></p>
                                                                        </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($detailibl->proc == 9) { ?>
                                                                        <li class='right clearfix'>
                                                                        <div class='timeline-badge'><i class='fa fa-check fa-2x'></i>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <small class=' text-muted'>
                                                                        <i class='fa fa-clock-o fa-fw'></i><?php echo $detailibl->dou; ?></small></div>
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
                                                            Detail </button>
                                                        <?php echo CHtml::link(' Print', array('printhistory', 'id' => $myreqfd->cdos, 'mid' => $ucode->id)); ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table> 
                                </div>
                            </div>
                            <div class="tab-pane fade" id="his">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-exampleo">
                                        <thead>
                                            <tr>
                                                <th>Bank</th>
<!--          <th>Transaction</th> -->
                                                <th>Term</th>
                                                <th>Rate</th>
                                                <th>Amount</th>
                                                <th>Request date</th>
                                                <th>Status</th>
                                                <th>Approval date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cbhistory as $cbhis) { ?>
                                                <tr>
                                                    <?php if ($ucode->id == $cbhis->cus) { ?>
                                                        <td><?php echo Bqcus::model()->findByPk($cbhis->lban)->resnam; ?></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td><?php echo Bqcus::model()->findByPk($cbhis->cus)->resnam; ?></td>
                                                    <?php } ?>
                              <!--              <td><?php echo RateTypes::model()->findByPk(InstitutionsQuotation::model()->findByPk($cbhis->num)->quotation_id)->rt_name; ?></td> -->
                                                    <td><?php echo Terms::model()->findByPk(InstitutionsQuotation::model()->findByPk($cbhis->num)->term_id)->term_name; ?></td>
                                                    <td><?php echo $cbhis->lrat . " %"; ?></td>
                                                    <td><?php echo $cbhis->amo; ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($cbhis->dou)); ?></td>
                                                    <?php if ($cbhis->proc == 0) { ?>
                                                        <td>New</td>
                                                    <?php } else { ?>
                                                        <?php if ($cbhis->proc == 9) { ?>
                                                            <td>Completed</td>
                                                        <?php } else {
                                                            ?>
                                                            <td>Pending</td>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php if (($cbhis->proc == 4) || ($cbhis->proc == 5) || ($cbhis->proc == 9)) { ?>
                                                        <td><?php echo date('d/m/Y', strtotime(current(Bqdcb::model()->findAll('cb_id=:x and proc=:y', array(':x' => $cbhis->cdos, ':y' => 4)))->dou)); ?></td>
                                                    <?php } else { ?>
                                                        <td>Pending approval</td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id='ratehis'>
                                <?php
                                $i = 1;
                                foreach (RateTypes::model()->findAll() as $ratetypes) {
                                    if (($ratetypes->rt_name == "Commercial Borrowing") || ($ratetypes->rt_name == "Commercial Borrowing Rates")) {
                                        ?>    
                                        <div class="panel-default">
                                            <!--                                 <div class="panel-heading">
                                                                                 <h3 align="center"><label style="color:navy;font-size: 22px;"><!--<input type="checkbox"  value="<?php echo $rate->rt_id; ?>" onclick="toggle1(this.value)">--><!--<?php echo $ratetypes->rt_name ?></label></h3>
                                                                             </div>
                                            -->                              <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-examples<?php echo $i; ?>">
                                                        <thead>
                                                            <tr>
                                                                <th>Term</th>
                                                                <th>Rate</th>
                                                                <th>Biddable?</th>
                                                                <th>Minimum amount</th>
                                                                <th>Setup charges</th>
                                                                <th>Other fees</th>
                                                                <th>Date</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $inratess = InstitutionsQuotation::model()->findAll('institution_id=:x and quotation_id=:y', array(':x' => $ucode->id, ':y' => $ratetypes->rt_id));
                                                            rsort($inratess);
                                                            foreach ($inratess as $inrate) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo Fdterms::model()->findByPk($inrate->term_id)->term_name; ?></td>
                                                                    <td><?php echo $inrate->lrate . " %"; ?></td>
                                                                    <td><?php
                                                                        if ($inrate->special_rate == 0)
                                                                            echo "No";
                                                                        else
                                                                            echo "Yes";
                                                                        ?></td>
                                                                    <td><?php echo $inrate->minimum_amount; ?></td>
                                                                    <td><?php echo $inrate->setup_charges; ?></td>
                                                                    <td><?php echo $inrate->other_fees; ?></td>
                                                                    <td><?php echo date('d/m/Y', strtotime($inrate->date_set)); ?></td>
                                                                    <td><?php echo date('H:ia', strtotime($inrate->time_set)); ?></td>
                                                                </tr>
        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    else
                                        ;

                                    $i++;
                                }
                                ?>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
</div>
<!-- .panel-body -->
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
<div class="modal fade" id="modifyformModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <strong> <h4 class="modal-title" align="center"><input id="title" type="text" readonly style="-webkit-appearance: none; border:none;width:100%; "></input></h4></strong>
            </div>
            <div class="modal-body">
                <fieldset>
                    <p align="center">
                    <div class="form-group">
                        <!--      <label>Borrowing Bank</label> -->&nbsp;&nbsp;<input class="form-control" style="width:400px;" placeholder="" name="op" id="op" type="hidden" >
                    </div>
                    <div class="form-group">
                        <label>Acceptable rate</label>&nbsp;&nbsp;<input class="form-control" style="width:400px;" placeholder="Value of acceptable rate" name="rate" id="rate" type="text" value="" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Remark</label>&nbsp;&nbsp;<textarea class="form-control"  cols="20" rows="5" style="width:400px;" placeholder="Remark : This quote will be accepted if..." name="remark" id="remark" type="textarea" value=""></textarea>
                    </div>
                    <input class="form-control" placeholder="" name="id" id="id" type="hidden" value="">
                    </p>
                </fieldset>
            </div>
            <div class="modal-footer"><p align="center">
                    <button style='border-radius: 0px 10px 0px 10px;' type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button style='border-radius: 0px 10px 0px 10px;' type="submit" onclick="event.preventDefault();
        savemod();" class="btn btn-primary">Send</button></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="rejectformModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <strong> <h4 class="modal-title" align="center"><input id="title1" type="text" readonly style="-webkit-appearance: none; border:none;width:100%; "></input></h4></strong>
            </div>
            <div class="modal-body">
                <fieldset>
                    <p align="center">
                        <!--      <label>Borrowing Bank</label> -->&nbsp;&nbsp;<input class="form-control" style="width:400px;" placeholder="" name="op" id="op1" type="hidden" >
                    <div class="form-group">
                        <label>Reason</label>&nbsp;&nbsp;<textarea class="form-control"  cols="20" rows="5" style="width:400px;" placeholder="Reason : This quote has been rejected because..." name="remark" id="remark1" type="textarea" value=""></textarea>
                    </div>
                    <input class="form-control" placeholder="" name="id" id="id1" type="hidden" value="">
                    </p>
                </fieldset>
            </div>
            <div class="modal-footer"><p align="center">
                    <button style='border-radius: 0px 10px 0px 10px;' type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button style='border-radius: 0px 10px 0px 10px;' type="submit" onclick="event.preventDefault();
        saverej();" class="btn btn-primary">Send</button></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- jQuery -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Flot Charts JavaScript -->
<script src="extras/bower_components/flot/excanvas.min.js"></script>
<script src="extras/bower_components/flot/jquery.flot.js"></script>
<script src="extras/bower_components/flot/jquery.flot.pie.js"></script>
<script src="extras/bower_components/flot/jquery.flot.resize.js"></script>
<script src="extras/bower_components/flot/jquery.flot.time.js"></script>
<script src="extras/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="//cdn.jsdelivr.net/jquery.flot/0.8.3/jquery.flot.min.js"></script>

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
    function complete(id, op) {
        $.ajax({
            type: "GET",
            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=cbr/default/complete&id=" + id + "&op=" + op
                    ,
            data: "", //ProposedSites
            cache: false,
            success: function(data) {
                if (data == 'true') {
                    $('#msg').html("Congratulations!!!.It's been good doing business with you. We hope for more interactions in the future.");
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
    function modifyl(id, op) {
//        alert(id);
        document.getElementById('op').value = op;
        document.getElementById('id').value = id;
        document.getElementById('title').value = "Quote modification form"
        $('#modifyformModal').modal('show');
    }
    function rejectl(id, op) {
//        alert(id);
        document.getElementById('op1').value = op;
        document.getElementById('id1').value = id;
        document.getElementById('title1').value = "Quote Rejection form"
        $('#rejectformModal').modal('show');
    }
    function saverej() {

        var id = document.getElementById("id1").value;
        //       alert(id);
        var remark = document.getElementById("remark1").value;
        var op = document.getElementById("op1").value;
        if (rate === '') {
            alert("Error: The rate you wish to modify must be stated. Please refill the form!");
        }
        else {
            $.ajax({
                type: "GET",
                url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=cbr/default/reject" +
                        "&remark=" + remark +
                        "&id=" + id +
                        "&op=" + op,
                data: "", //ProposedSites
                cache: false,
                success: function(data) {
                    if (data == 'true') {
                        $('#msg').html(" Quote rejection message has been sent");
                        $('#rejectformModal').modal('hide');
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
    function accept(id, op) {

        $.ajax({
            type: "GET",
            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=cbr/default/accept&id=" + id + "&op=" + op
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
    function approve(id, op) {

        $.ajax({
            type: "GET",
            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=cbr/default/approve&id=" + id + "&op=" + op
                    ,
            data: "", //ProposedSites
            cache: false,
            success: function(data) {
                if (data == 'true') {
                    $('#msg').html("Approval statement sent");
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
    function vieweffected(id, op) {
        //   alert(op);
        //  alert(id);
        $.ajax({
            type: "GET",
            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=cbr/default/vieweffect&id=" + id + "&op=" + op
                    ,
            data: "", //ProposedSites
            cache: false,
            success: function(data) {
                if (data == 'true') {
                } else {
                    alert(data + "Failure: Change could not be effected.");
                }
            },
            error: function(data) {
                alert("Error effecting view.");
            }
        });
    }
    function savemod() {
        var id = document.getElementById("id").value;
        var rate = document.getElementById("rate").value;
        var remark = document.getElementById("remark").value;
        var op = document.getElementById("op").value;
        if (rate === '') {
            alert("Error: The rate you wish to modify must be stated. Please refill the form!");
        }
        else {
            $.ajax({
                type: "GET",
                url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=cbr/default/modify" +
                        "&rate=" + rate +
                        "&remark=" + remark +
                        "&id=" + id +
                        "&op=" + op,
                data: "", //ProposedSites
                cache: false,
                success: function(data) {
                    if (data == 'true') {
                        $('#msg').html(" Quote modification suggestions have been sent");
                        $('#modifyformModal').modal('hide');
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
    function savebulkrate(button) {
        var termcount = document.getElementById("termcount").value;
   for (var j = 1; j <= termcount; j++) {
            var institution = document.getElementById("institution" + button + j).value;
            var rateT = document.getElementById("rateT" + button + j).value;
            var rate = document.getElementById("rate" + button + j).value;
            var specialrates = document.getElementById("state" + button + j).value;//document.getElementById("specialrates"+button).value;
            var term = document.getElementById("term" + button + j).value;
            var minamount = document.getElementById("minamount" + button + j).value;
            var scharges = document.getElementById("scharges" + button + j).value;
            var ofees = document.getElementById("ofees" + button + j).value;

            if (rate === '') {
                alert("Error: The rate must be stated. Please refill the form!");
            }
            else {
                $.ajax({
                    type: "GET",
                    url: "http://" + document.getElementById('url').value + "/bankafrica1/index.php?r=cbr/default/addrate" +
                            "&institution=" + institution +
                            "&rateT=" + rateT +
                            "&rate=" + rate +
                            //      "&brate=" + brate +
                            "&specialrates=" + specialrates +
                            "&term=" + term +
                            "&minamount=" + minamount +
                            "&scharges=" + scharges +
                            "&ofees=" + ofees,
                    data: "", //ProposedSites
                    cache: false,
                    success: function(data) {
                        if (data == 'true') {
                            $('#msg').html(" Configuration data has been saved successfully");
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

    }


    function saverate(button) {
             var institution = document.getElementById("institution" + button).value;
        var rateT = document.getElementById("rateT" + button).value;
        var rate = document.getElementById("rate" + button).value;
        var specialrates = document.getElementById("state" + button).value;//document.getElementById("specialrates"+button).value;
        var term = document.getElementById("term" + button).value;
        var minamount = document.getElementById("minamount" + button).value;
        var scharges = document.getElementById("scharges" + button).value;
        var ofees = document.getElementById("ofees" + button).value;
        if (rate === '') {
            alert("Error: The rate must be stated. Please refill the form!");
        }
        else {
            $.ajax({
                type: "GET",
                url: "http://" + document.getElementById('url').value + "/bankafrica1/index.php?r=cbr/default/addrate" +
                        "&institution=" + institution +
                        "&rateT=" + rateT +
                        "&rate=" + rate +
                        //      "&brate=" + brate +
                        "&specialrates=" + specialrates +
                        "&term=" + term +
                        "&minamount=" + minamount +
                        "&scharges=" + scharges +
                        "&ofees=" + ofees,
                data: "", //ProposedSites
                cache: false,
                success: function(data) {
                    if (data == 'true') {
                        $('#msg').html(" Configuration data has been saved successfully");
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
</script>

<script>
    $(document).ready(function() {
		$(".sub1").hide();
        $(".sub2").hide();
		
		$('#dataTables-exampleo').DataTable({
            responsive: true
        });
		
		$('#dataTables-examples4').DataTable({
            responsive: true
        });
		
		$('#dataTables-examples5').DataTable({
            responsive: true
        });
		
		$('#dataTables-examples6').DataTable({
            responsive: true
        });
		
        $('#dataTables-example').DataTable({
            responsive: true
        });
		
		$('#dataTables-exampler1').DataTable({
            responsive: true
        });
		
		$('#dataTables-exampler2').DataTable({
            responsive: true
        });
		
		$('#dataTables-exampler3').DataTable({
            responsive: true
        });
		
		$('#dataTables-exampler4').DataTable({
            responsive: true
        });
		
		$('#dataTables-exampler5').DataTable({
            responsive: true
        });
		
		$('#dataTables-exampler6').DataTable({
            responsive: true
        });
		
		$('#dataTables-exampler7').DataTable({
            responsive: true
        });
    });
	function switcher(id) {
        if (document.getElementById('state' + id).value == 1) {
            document.getElementById('state' + id).value = 0;
        }
        else {
            document.getElementById('state' + id).value = 1;
        }
    }
	
	function toggle1(id) {
        $("#the_rest" + id).toggle();
    }
	
	function toggle2(id) {
        $("#the_restinner" + id).toggle();
    }
</script>
<script>
    
</script>
<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });

    // popover demo
    $("[data-toggle=popover]")
        .popover()
</script>
<script>
    $('[data-toggle="popover"]').popover({
        container: 'body'
    });
    // popover demo
    $("[data-toggle=popover]")
        .popover()
</script>