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
	.table-striped>tbody>tr:nth-of-type(odd)
	{
		background-color: #f0ad4e;
		color:white;
	}
	.table-striped>tbody>tr:nth-child(2n)
	{
		background-color: #8a6d3b;
		color:white;
	}
	.sorting_1{
		background: #5cb85c;
	}
</style>
<script>
    function toggle1(id) {
        $("#the_rest" + id).toggle();
    }
    $(document).ready(function() {
        $(".sub1").hide();
        $(".sub2").hide();
    });
    function toggle2(id) {
//        alert(id);
        $("#the_restinner" + id).toggle();
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <i class="fa fa-thumbs-o-up fa-2x"></i>
                    <div class="panel-body">
                        #Completed transactions&nbsp;
                        <?php
                        $ucodes = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
                        foreach ($ucodes as $ucode)
                            ;
                        $tibl = Bqibl::model()->findall('(sta=:x and target=:y and proc=:z) or (sta=:x and bban=:a and proc=:z)', array(':x' => 'VA', ':y' => $ucode->cdos, ':z' => '9', ':a' => $ucode->cdos));
                        $tfd = Bqfd::model()->findAll('(sta=:x and rban=:y and proc=:z) or (sta=:x and cus=:y and proc=:z)', array(':x' => 'VA', ':y' => $ucode->cdos, ':z' => '9'));
                        $tcf = Bqcf::model()->findAll('sta=:x and own=:y and proc=:z', array(':x' => 'VA', ':y' => $ucode->cdos, ':z' => '9'));
                        $tcb = Bqcb::model()->findAll('sta=:x and lban=:y and proc=:z', array(':x' => 'VA', ':y' => $ucode->cdos, ':z' => '9'));
                        $tdsec = Bqdsec::model()->findAll('sta=:x and issuer=:y and proc=:z', array(':x' => 'VA', ':y' => $ucode->cdos, ':z' => '9'));

                        $allibl = Bqibl::model()->findall('target=:y', array(':y' => $ucode->cdos));
                        $allfds = Bqfd::model()->findAll('rban=:y', array(':y' => $ucode->cdos));
                        $allcf = Bqcf::model()->findAll('own=:y', array(':y' => $ucode->cdos));
                        $allcb = Bqcb::model()->findAll('lban=:y', array(':y' => $ucode->cdos));
                        $alldsec = Bqdsec::model()->findAll('issuer=:y', array(':y' => $ucode->cdos));
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
                        $nibl = Bqibl::model()->findall('proc=:x and target=:y', array(':x' => '0', ':y' => $ucode->cdos));
                        $nfd = Bqfd::model()->findAll('proc=:x and rban=:y', array(':x' => '0', ':y' => $ucode->cdos));
                        $ncf = Bqcf::model()->findAll('proc=:x and own=:y', array(':x' => '0', ':y' => $ucode->cdos));
                        $ncb = Bqcb::model()->findAll('proc=:x and lban=:y', array(':x' => '0', ':y' => $ucode->cdos));
                        $ndsec = Bqdsec::model()->findAll('proc=:x and issuer=:y', array(':x' => '0', ':y' => $ucode->cdos));
                        ?>
                        <span class="badge"><?php echo count($nibl) + count($nfd) + count($ncf) + count($ncb) + count($ndsec); ?></span>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="panel panel-default">
                    <i class="fa fa-eye fa-2x"></i>
                    <div class="panel-body">
                        <?php echo CHtml::link('History of transactions', array('transactions'), array('onclick' => '$("#signup").dialog("open"); return false;')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <!-- .panel-heading -->
                <div class="panel-body">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Rates</a>
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
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="rates">
                                            <h4>Rates Tab</h4>
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr style="background:blue;color:white">
                                                            <th> Operation</th>
                                                            <?php foreach ($terms as $tterm) { ?>
                                                                <th><?php echo $tterm->term_name; ?></th>
                                                            <?php } ?>
<!--             <th>Edit</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($rates as $rate) {
                                                            echo "<tr class='odd gradeX'>";
                                                            echo "<td>" . $rate->rt_name . "</td>";
                                                            //        echo ;
                                                            $findusercode = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
                                                            foreach ($findusercode as $findcode)
                                                                ;
                                                            $usercode = $findcode->cdos;
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
                                                        $i++;
                                                        //               echo "<td>".CHtml::link('', array('#'), array('class' => 'fa fa-edit fa-2x', 'data-toggle' => 'modal', 'data-target' => '#editModal'))."</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <div class="tab-pane fade" id="conf">
                                            <h4>Configuration Tab</h4>
                                            <?php
                                            $i = 1;
                                            foreach ($rates as $rate) {
                                                ?>
                                                <form class="form-inline" >
                                                    <div class="main1" id="det<?php echo $i; ?>">
                                                        <div class="checkbox" >
                                                            <label style="color:navy;font-size: 22px;"><input type="checkbox"  value="<?php echo $rate->rt_id; ?>" onclick="toggle1(this.value)"><?php echo $rate->rt_name ?></label>
                                                        </div>
                                                    </div>
                                                    <div id="the_rest<?php echo $i; ?>" class="sub1">
                                                        <?php
                                                        $useris = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
                                                        foreach ($useris as $useri)
                                                            ;
                                                        $j = 0;
                                                        foreach ($terms as $term) {
                                                            ?>
                                                            <br>
                                                            <label style="color:mediumblue;font-size: 15px;"><input type="checkbox"  value="<?php echo $i . $j; ?>" onclick="toggle2(this.value)"><?php echo $term->term_name; ?></label>
                                                            <div id="the_restinner<?php echo $i . $j; ?>" class="sub2">    
                                                                <input type="hidden" class="form-control" id="institution<?php echo $i . $j; ?>" value="<?php echo $useri->cdos; ?>" name="institution" placeholder="Institution">
                                                                <input type="hidden" class="form-control" id="rateT<?php echo $i . $j; ?>" value="<?php echo $rate->rt_id; ?>" name="rateT" placeholder="rate type ">
                                                                <input type="text" class="form-control" id="rate<?php echo $i . $j; ?>" name="rate" placeholder="Rate ">
                   <!--                                             <input type="text" class="form-control" id="brate<?php echo $i . $j; ?>" name="brate" placeholder="Borrowing rate "> -->
                                                                <input type="hidden" value=0 id="state<?php echo $i . $j; ?>">
                                                                <label>
                                                                    <input value='<?php echo $i . $j; ?>' type="checkbox" id="specialrates<?php echo $i . $j; ?>" name="specialrates<?php echo $i . $j; ?>" onclick="switcher(this.value)"> 
                                                                    Special Rates
                                                                </label>
                                                                <input type="hidden" class="form-control" id="term<?php echo $i . $j; ?>" name="term" value="<?php echo $term->term_id; ?>" placeholder="Term"><!--This will automatically be populated from the options-->
                                                                <input type="text" class="form-control" id="minamount<?php echo $i . $j; ?>" name="minamount" placeholder="Minimum amt ">
                                                                <input type="text" class="form-control" id="scharges<?php echo $i . $j; ?>" name="scharges" placeholder="Setup charges ">
                                                                <input type="text" class="form-control" id="ofees<?php echo $i . $j; ?>" name="ofees" placeholder="Other fees ">
                                                                <button type="submit" value="<?php echo $i . $j; ?>" id="<?php echo $i . $j; ?>" class="btn btn-primary" onclick="event.preventDefault();
                saverate(this.value);">Save</button>
                                                            </div>   
                                                            <br>
                                                            <?php
                                                            $j++;
                                                        }
                                                        ?>
                                                    </div>
                                                </form>
                                                <br>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </div>
                                        <div class="tab-pane fade" id="creq">
                                            <h4 align="center">Inter-bank lending</h4>
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-exampler1">
                                                    <thead>
                                                        <tr style="background:blue;color:white">
                                                            <th>For</th>
                                                            <th>Client</th>
                                                            <th>Rate</th>
                                                            <th>Amount</th>
                                                            <th>History</th>
                                                            <th>Approve</th>
                                                            <th>Reject</th>
                                                            <th>Modify</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($allibl as $allbl) {
                                                            $statedrate = InstitutionsQuotation::model()->findByPk($allbl->num);
                                                            $ratetype = RateTypes::model()->findByPk($statedrate->quotation_id);
                                                            $clients = Bqcus::model()->findAll('cus=:x', array(':x' => $allbl->cus));
                                                            $dibls = Bqdibl::model()->findAll('ibl_id=:x', array(':x' => $allbl->cdos));
                                                            if ($allbl->proc == 0) {
//                                                                $op="IBL";
                                                                ?>
                                                                <tr style="color:purple"  onclick="vieweffected(<?php echo $allbl->cdos . "," . "'IBL'"; ?>);">
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                <tr>
                                                                <?php } ?>
                                                                <td><?php echo $ratetype->rt_name; ?></td>
                                                                <td><?php echo current($clients)->resnam; ?></td>
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
                                                                                   <?php echo $allbl->brat . " %" ?>
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
                                                                                   <?php echo $allbl->amo; ?>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td><button type="button" class="btn btn-default" data-container="body" data-html="true" data-toggle="popover" data-placement="bottom"  
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
                                                                                    <h4><strong>Request Sent</strong></h4>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>Request made by <?php echo current($clients)->resnam; ?> for <?php echo $ratetype->rt_name; ?>. The quotation was done for <?php echo $allbl->amo . " at rate  " . $allbl->brat . " %"; ?> .</p>
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
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>Request Accepted.</p>
                                                                                    </div>
                                                                                    </li>
                                                                                <?php } ?>
                                                                                <?php if ($dibl->proc == 5) { ?>  
                                                                                    <li>
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
                                                                                    <p><?php echo $allbl->rejmot; ?></p>
                                                                                    <p><?php echo $dibl->remark; ?></p>
                                                                                    </div>
                                                                                    </li>
                                                                                <?php } ?>
                                                                                <?php if ($dibl->proc == 9) { ?>
                                                                                    <li>
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
                                                                        See History </button>
                                                                </td>

                                                                <td>
                                                                    <?php if ($allbl->proc == 9) { ?>
                                                                        Approved<?php
                                                                    } if (($allbl->proc == 0) || ($allbl->proc == 3)|| ($allbl->proc == 1)) {
                                                                        ?>
                                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                accept(<?php echo $allbl->cdos . "," . "'IBL'" ?>);">Accept</button><?php
                                                                            }
                                                                            if (($allbl->proc == 5)) {
                                                                                ?>
                                                                        Approved
                                                                        <!--    <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                    approve(<?php echo $allbl->cdos . "," . "'IBL'" ?>);">Approve</button>--><?php } ?></td>
                                                                <td>
                                                                    <?php if ($allbl->proc == 5) { ?>
                                                                        Already approved<?php
                                                                    }
                                                                    if ($allbl->proc == 8) {
                                                                        ?>
                                                                        Rejected<?php
                                                                    } if (($allbl->proc == 0) || ($allbl->proc == 3) || ($allbl->proc == 1)) {
                                                                        ?>
                                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                rejectl(<?php echo $allbl->cdos . "," . "'IBL'"; ?>);">Reject</button> <?php } ?></td>
                                                                <td>
                                                                    <?php
                                                                    if (($allbl->proc == 8)) {
                                                                        ?>
                                                                        Rejected <?php
                                                                    }
                                                                    if (($allbl->proc == 3) || ($allbl->proc == 4)) {
                                                                        ?>
                                                                        Modified<?php
                                                                    }
                                                                    if ($allbl->proc == 5) {
                                                                        ?>
                                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                complete(<?php echo $allbl->cdos . "," . "'IBL'"; ?>);">Completed?</button> <?php
                                                                            }
                                                                            if ($allbl->proc == 9) {
                                                                                ?>Completed
                                                                        <?php
                                                                    }
                                                                    if (($allbl->proc == 2)||($allbl->proc == 1)) {
                                                                        ?>  
                                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                modifyl(<?php echo $allbl->cdos . "," . "'IBL'"; ?>);">Modify</button> <?php } ?></td>
                                                            </tr>
                                                        <?php }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <h4 align="center">Fixed Deposits</h4>
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-exampler2">
                                                    <thead>
                                                        <tr style="background:blue;color:white">
                                                            <th>For</th>
                                                            <th>Client</th>
                                                            <th>Rate</th>
                                                            <th>Amount</th>
                                                            <th>History</th>
                                                            <th>Approve</th>
                                                            <th>Reject</th>
                                                            <th>Modify</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($allfds as $allfd) {
                                                            $statedratefd = InstitutionsQuotation::model()->findByPk($allfd->num);
                                                            $ratetypefd = RateTypes::model()->findByPk($statedratefd->quotation_id);
                                                            $clientsfd = Bqcus::model()->findAll('cus=:x', array(':x' => $allfd->cus));
                                                            $dfds = Bqdfd::model()->findAll('fd_id=:x', array(':x' => $allfd->cdos));
                                                            if ($allfd->proc == 0) {
//                                                                $op="IBL";
                                                                ?>
                                                                <tr style="color:purple"  onclick="vieweffected(<?php echo $allfd->cdos . "," . "'FD'"; ?>);">
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                <tr>
    <?php } ?>
                                                                <td><?php echo $ratetypefd->rt_name; ?></td>
                                                                <td><?php echo current($clientsfd)->resnam; ?></td>
                                                                <td><div class="tooltip-demo">
                                                                        <label type="label" data-html="true" class="" data-toggle="tooltip" data-placement="top" title="These values were stated;
                                                                               Rate stated: <?php echo $statedratefd->lrate; ?><br>
                                                                               Special rate: <?php
                                                                               if ($statedratefd->special_rate == 0)
                                                                                   echo "No<br>";
                                                                               if ($statedratefd->special_rate == 1)
                                                                                   echo "Yes<br>";
                                                                               ?>
                                                                               Minimum amount:<?php
                                                                               if ($statedratefd->minimum_amount == '')
                                                                                   echo "0";
                                                                               else
                                                                                   echo $statedratefd->minimum_amount;
                                                                               ?><br>
                                                                               Setup Charges:<?php
                                                                               if ($statedratefd->setup_charges == '')
                                                                                   echo '0';
                                                                               else
                                                                                   echo $statedratefd->setup_charges;
                                                                               ?> <br>
                                                                               Other Fees: <?php
                                                                               if ($statedratefd->other_fees == '')
                                                                                   echo '0';
                                                                               else
                                                                                   echo $statedratefd->other_fees;
                                                                               ?><br>
                                                                               " value="<?php echo $statedratefd->institutions_quotation_id; ?>" >
    <?php echo $allfd->drat . " %" ?>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td><div class="tooltip-demo">
                                                                        <label type="label" data-html="true" class="" data-toggle="tooltip" data-placement="top" title="These values were stated;
                                                                               Rate stated: <?php echo $statedratefd->lrate; ?><br>
                                                                               Special rate: <?php
                                                                               if ($statedratefd->special_rate == 0)
                                                                                   echo "No<br>";
                                                                               if ($statedratefd->special_rate == 1)
                                                                                   echo "Yes<br>";
                                                                               ?>
                                                                               Minimum amount:<?php
                                                                               if ($statedratefd->minimum_amount == '')
                                                                                   echo "0";
                                                                               else
                                                                                   echo $statedratefd->minimum_amount;
                                                                               ?><br>
                                                                               Setup Charges:<?php
                                                                               if ($statedratefd->setup_charges == '')
                                                                                   echo '0';
                                                                               else
                                                                                   echo $statedratefd->setup_charges;
                                                                               ?> <br>
                                                                               Other Fees: <?php
                                                                               if ($statedratefd->other_fees == '')
                                                                                   echo '0';
                                                                               else
                                                                                   echo $statedratefd->other_fees;
                                                                               ?><br>
                                                                               " value="<?php echo $statedratefd->institutions_quotation_id; ?>" >
    <?php echo $allfd->amo; ?>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td><button type="button" class="btn btn-default" data-container="body" data-html="true" data-toggle="popover" data-placement="bottom"  
                                                                            data-content="<?php foreach ($dfds as $dfd) { ?>
                                                                                <div class='panel-body'>
                                                                                <ul class='chat'>
        <?php if ($dfd->proc == 0) { ?>
                                                                                    <li class='left clearfix'>                                                                        
                                                                                    <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($clientsfd)->resnam; ?></i>&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dfd->dou; ?></small></div>
                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'> 
                                                                                    <h4><strong>Request Sent</strong></h4>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>Request made by <?php echo current($clientsfd)->resnam; ?> for <?php echo $ratetype->rt_name; ?>. The quotation was done for <?php echo $allfd->amo . " at rate  " . $allbl->brat . " %"; ?> .</p>
                                                                                    </div>
                                                                                    </div>    
                                                                                    </li>
                                                                                <?php } ?>
        <?php if ($dfd->proc == 1) { ?>
                                                                                    <li class='right clearfix'>
                                                                                    <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dfd->dou; ?></small></div>
                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'> 
                                                                                    <h4 class='timeline-title'>Successful View</h4>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>You have seen this request <?php echo current($clientsfd)->resnam; ?>.</p>
                                                                                    </div>
                                                                                    </li>
                                                                                <?php } ?>
        <?php if ($dfd->proc == 2) { ?>
                                                                                    <li class='right clearfix'>
                                                                                    <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dfd->dou; ?></small></div>
                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'> 
                                                                                    <h4 class='timeline-title'> A Quote Modification Request Has been sent</h4>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>The modifications sent: <?php echo $dfd->remark; ?>.</p><br>
                                                                                    <p>proposed rate: <?php echo $dfd->rate; ?></p><br>
                                                                                    <p>Proposed amount: <?php
                                                                                    if ($dfd->amount == 0)
                                                                                        echo "The Suggested amount is OK";
                                                                                    else
                                                                                        echo $dfd->amount;
                                                                                    ?></p>
                                                                                    </div>
                                                                                    </li>
                                                                                <?php } ?>
        <?php if ($dfd->proc == 3) { ?>
                                                                                    <li class='right clearfix'>
                                                                                    <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($clientsfd)->resnam; ?></i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dfd->dou; ?></small></div>
                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'> 
                                                                                    <h4 class='timeline-title'>Modification Made and resent</h4>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>Request modifications made: <?php echo $dfd->remark; ?>.</p>
                                                                                    <p>proposed rate: <?php echo $dfd->rate; ?></p><br>
                                                                                    <p>Proposed amount: <?php echo $dfd->amount; ?></p>
                                                                                    </div>
                                                                                    </li>
                                                                                <?php } ?>
        <?php if ($dfd->proc == 4) { ?>
                                                                                    <li class='right clearfix'>
                                                                                    <div class='timeline-badge info'><i class='fa fa-check'><?php echo current($clientsfd)->resnam; ?></i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dfd->dou; ?></small></div>

                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'> 
                                                                                    <h4 class='timeline-title'>Quote approval made</h4>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>Request Accepted.</p>
                                                                                    </div>
                                                                                    </li>
                                                                                <?php } ?>
        <?php if ($dfd->proc == 5) { ?>  
                                                                                    <li>
                                                                                    <div class='timeline-badge info'><i class='fa fa-refresh'></i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dfd->dou; ?></small></div>
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
        <?php if ($dfd->proc == 8) { ?>
                                                                                    <li class='right clearfix'>
                                                                                    <div class='timeline-badge'> <i class='fa fa-user'>&nbsp;Me</i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dfd->dou; ?></small></div>
                                                                                    <div class='timeline-badge info'>Quote Rejected
                                                                                    </div>
                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'>
                                                                                    <h4 class='timeline-title'>...</h4><i class='fa fa-times'></i>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p><?php echo $allfd->rejmot; ?></p>
                                                                                    <p><?php echo $dfd->remark; ?></p>
                                                                                    </div>
                                                                                    </li>
                                                                                <?php } ?>
        <?php if ($dfd->proc == 9) { ?>
                                                                                    <li>
                                                                                    <div class='timeline-badge'><i class='fa fa-check fa-2x'></i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $dfd->dou; ?></small></div>
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
                                                                        See History </button>
                                                                </td>

                                                                <td>
                                                                    <?php if ($allfd->proc == 9) { ?>
                                                                        Approved<?php
                                                        } if (($allfd->proc == 0) || ($allfd->proc == 3)||($allfd->proc == 1)) {
                                                                        ?>
                                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                accept(<?php echo $allfd->cdos . "," . "'FD'" ?>);">Accept</button><?php
                                                                            }
                                                                            if (($allfd->proc == 5)) {
                                                                                ?>
                                                                        Approved
                                                                        <!--    <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                    approve(<?php echo $allfd->cdos . "," . "'IBL'" ?>);">Approve</button>--><?php } ?></td>
                                                                <td>
                                                                    <?php if ($allfd->proc == 5) { ?>
                                                                        Already approved<?php
                                                                    }
                                                                    if ($allfd->proc == 8) {
                                                                        ?>
                                                                        Rejected<?php
                                                                    } if (($allfd->proc == 0) || ($allfd->proc == 3) || ($allfd->proc == 1)) {
                                                                        ?>
                                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                rejectl(<?php echo $allfd->cdos . "," . "'IBL'"; ?>);">Reject</button> <?php } ?></td>
                                                                <td>
                                                                    <?php
                                                                    if (($allfd->proc == 8)) {
                                                                        ?>
                                                                        Rejected <?php
                                                                    }
                                                                    if (($allfd->proc == 3) || ($allfd->proc == 4)) {
                                                                        ?>
                                                                        Modified<?php
                                                                    }
                                                                    if ($allfd->proc == 5) {
                                                                        ?>
                                                                        Transaction in progress...
                                                                  <!--      <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                complete(<?php echo $allfd->cdos . "," . "'FD'"; ?>);">Completed?</button>--> <?php
                                                                    }
                                                                    if ($allfd->proc == 9) {
                                                                        ?>Completed
                                                                        <?php
                                                                    }
                                                                    if (($allfd->proc == 2)||($allfd->proc == 1)) {
                                                                        ?>  
                                                                        
                                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                modifyl(<?php echo $allfd->cdos . "," . "'FD'"; ?>);">Modify</button> <?php } ?></td>
                                                            </tr>
<?php }
?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <h4 align="center">Commercial Borrowing</h4>
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-exampler3">
                                                    <thead>
                                                        <tr style="background:blue;color:white">
                                                            <th>Client</th>
                                                            <th>Rate</th>
                                                            <th>amt requested</th>
                                                            <th>Approve</th>
                                                            <th>Reject</th>
                                                            <th>respond</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="mreq">
                                            <h4 align="center">Interbank lending</h4>
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-exampler4">
                                                    <thead>
                                                        <tr style="background:blue;color:white">
                                                            <th>Sent to </th>
                                                            <th>Rate</th>
                                                            <th>amt requested</th>
                                                            <th>History</th>
                                                            <th>Status</th>
                                                            <th>Respond</th>
                                                            <th>Complete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $myreqibls = Bqibl::model()->findAll('cus=:x', array(':x' => $ucode->cdos));
                                                        foreach ($myreqibls as $myreqibl) {
                                                            $ratingibl = InstitutionsQuotation::model()->findByPk($myreqibl->num);
                                                            $ratingrateibl = RateTypes::model()->findByPk($ratingibl->quotation_id);
                                                            $senttoibl = Bqcus::model()->findAll('cus=:x', array(':x' => $myreqibl->target));
                                                            $detailibls = Bqdibl::model()->findAll('ibl_id=:x', array(':x' => $myreqibl->cdos));
                                                            ?>
                                                            <tr>
                                                                <td> <?php echo current($senttoibl)->resnam; ?></td>   
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
    <?php echo $myreqibl->brat." %"; ?>  
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
    <?php echo $myreqibl->amo; ?>    
                                                                        </label>
                                                                    </div>
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
                                                                                    <p>Request sent to <?php echo current($senttoibl)->resnam; ?> for <?php echo $ratingrateibl->rt_name; ?>. The quotation was done for <?php echo $myreqibl->amo . " at rate  " . $myreqibl->brat . " %"; ?> .</p>
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
                                                                                    <div class='timeline-badge'><i class='fa fa-check'></i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $detailibl->dou; ?></small></div>
                                                                                    <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($senttoibl)->resnam; ?><i>
                                                                                    </div>
                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'> 
                                                                                    <h4 class='timeline-title'>Quote accepted by Lender</h4>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>Request Accepted.</p>
                                                                                    </div>
                                                                                    </li>
        <?php } ?>
        <?php if ($detailibl->proc == 5) { ?>  
                                                                                    <li>
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
                                                                                    <p><?php echo $myreqibl->rejmot; ?></p>
                                                                                    <p><?php echo $detailibl->remark; ?></p>
                                                                                    </div>
                                                                                    </li>
        <?php } ?>
        <?php if ($detailibl->proc == 9) { ?>
                                                                                    <li>
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
                                                                        See History </button>
                                                                </td>
                                                                <td>
                                                                    <a href="#">
                                                                        <div>
                                                                            <p>
                                                                                <strong>Transaction</strong>
                                                                                <span class="pull-right text-muted"><?php echo round(((($myreqibl->proc) / 9) * 100), 0) . " %"; ?> Complete</span>
                                                                            </p>
                                                                            <div class="progress progress-striped active">
                                                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo (($myreqibl->proc) / 9) * 100; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($myreqibl->proc) / 9) * 100; ?>%">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if (($myreqibl->proc == 1) || ($myreqibl->proc == 0) || ($myreqibl->proc == 5)) {
                                                                        ?>
                                                                        <h1 align='center'>    ...</h1>
                                                                            <?php } if ($myreqibl->proc == 2) { ?>
                                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                modifyl(<?php echo $myreqibl->cdos . "," . "'IBL'"; ?>);">Respond</button> <?php
                                                                            }
                                                                            if ($myreqibl->proc == 3) {
                                                                                ?>
                                                                        Modified<?php
                                                                    }
                                                                    if ($myreqibl->proc == 4) {
                                                                        ?>
                                                                        Accepted<?php
                                                                    }
                                                                    if ($myreqibl->proc == 8) {
                                                                        ?>
                                                                        Rejected<?php
                                                                    }
                                                                    if ($myreqibl->proc == 9) {
                                                                        ?>
                                                                        Completed<?php
                                                            }
                                                            ?>  
                                                                </td>
                                                                <td>
                                                                            <?php if ($myreqibl->proc == 5) {
                                                                                ?>
                                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                complete(<?php echo $myreqibl->cdos . "," . "'IBL'"; ?>);">Completed?</button> <?php
                                                                    }
                                                                    if ($myreqibl->proc == 9) {
                                                                        ?>Completed
                                                                        <?php
                                                                    } else {
                                                                        echo " ... ";
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
<?php }
?>
                                                    </tbody>
                                                </table> 
                                            </div>
                                             <h4 align="center">Fixed Deposits</h4>
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-exampler4">
                                                    <thead>
                                                        <tr style="background:blue;color:white">
                                                            <th>Sent to </th>
                                                            <th>Rate</th>
                                                            <th>amt requested</th>
                                                            <th>History</th>
                                                            <th>Status</th>
                                                            <th>Respond</th>
                                                            <th>Complete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $myreqfds = Bqfd::model()->findAll('cus=:x', array(':x' => $ucode->cdos));
                                                        foreach ($myreqfds as $myreqfd) {
                                                            $ratingfd = InstitutionsQuotation::model()->findByPk($myreqfd->num);
                                                            $ratingratefd = RateTypes::model()->findByPk($ratingfd->quotation_id);
                                                    $senttofd = Bqcus::model()->findAll('cus=:x', array(':x' => $myreqfd->rban));
                                                            $detailfds = Bqdfd::model()->findAll('fd_id=:x', array(':x' => $myreqfd->cdos));
                                                            ?>
                                                            <tr>
                                                                <td> <?php echo current($senttofd)->resnam; ?></td>   
                                                                <td>
                                                                    <div class="tooltip-demo">
                                                                        <label type="label" data-html="true" class="" data-toggle="tooltip" data-placement="top" title="These values were stated:<br>
                                                                               Rate stated: <?php echo $ratingfd->lrate; ?><br>
                                                                               Special rate: <?php
                                                                               if ($ratingfd->special_rate == 0)
                                                                                   echo "No<br>";
                                                                               if ($ratingfd->special_rate == 1)
                                                                                   echo "Yes<br>";
                                                                               ?>
                                                                               Minimum amount:<?php
                                                                               if ($ratingfd->minimum_amount == '')
                                                                                   echo "0";
                                                                               else
                                                                                   echo $ratingfd->minimum_amount;
                                                                               ?><br>
                                                                               Setup Charges:<?php
                                                                               if ($ratingfd->setup_charges == '')
                                                                                   echo '0';
                                                                               else
                                                                                   echo $ratingfd->setup_charges;
                                                                               ?> <br>
                                                                               Other Fees: <?php
                                                                               if ($ratingfd->other_fees == '')
                                                                                   echo '0';
                                                                               else
                                                                                   echo $ratingfd->other_fees;
                                                                               ?><br>
                                                                               " value="<?php echo $ratingfd->institutions_quotation_id; ?>" >
    <?php echo $myreqfd->drat." %"; ?>  
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>                                                                        <div class="tooltip-demo">
                                                                        <label type="label" data-html="true" class="" data-toggle="tooltip" data-placement="top" title="These values were stated:<br>
                                                                               Rate stated: <?php echo $ratingfd->lrate; ?><br>
                                                                               Special rate: <?php
                                                                               if ($ratingfd->special_rate == 0)
                                                                                   echo "No<br>";
                                                                               if ($ratingfd->special_rate == 1)
                                                                                   echo "Yes<br>";
                                                                               ?>
                                                                               Minimum amount:<?php
                                                                               if ($ratingfd->minimum_amount == '')
                                                                                   echo "0";
                                                                               else
                                                                                   echo $ratingfd->minimum_amount;
                                                                               ?><br>
                                                                               Setup Charges:<?php
                                                                               if ($ratingfd->setup_charges == '')
                                                                                   echo '0';
                                                                               else
                                                                                   echo $ratingfd->setup_charges;
                                                                               ?> <br>
                                                                               Other Fees: <?php
                                                                               if ($ratingfd->other_fees == '')
                                                                                   echo '0';
                                                                               else
                                                                                   echo $ratingfd->other_fees;
                                                                               ?><br>
                                                                               " value="<?php echo $ratingfd->institutions_quotation_id; ?>" >
    <?php echo $myreqfd->amo; ?>    
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td><button type="button" class="btn btn-default" data-container="body" data-html="true" data-toggle="popover" data-placement="bottom"  
                                                                            data-content="<?php foreach ($detailfds as $detailfd) { ?>
                                                                                <div class='panel-body'>
                                                                                <ul class='chat'>
        <?php if ($detailfd->proc == 0) { ?>
                                                                                    <li class='left clearfix'>                                                                        
                                                                                    <div class='timeline-badge info'><i class='fa fa-user'>Me</i>&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $detailfd->dou; ?></small></div>
                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'> 
                                                                                    <h4><strong>Request Sent</strong></h4>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>Request sent to <?php echo current($senttofd)->resnam; ?> for <?php echo $ratingratefd->rt_name; ?>. The quotation was done for <?php echo $myreqfd->amo . " at rate  " . $myreqfd->drat . " %"; ?> .</p>
                                                                                    </div>
                                                                                    </div>    
                                                                                    </li>
        <?php } ?>
        <?php if ($detailfd->proc == 1) { ?>
                                                                                    <li class='right clearfix'>
                                                                                    <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($senttofd)->resnam; ?></i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $detailfd->dou; ?></small></div>
                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'> 
                                                                                    <h4 class='timeline-title'>Successful View</h4>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>The request sent has been seen by <?php echo current($senttofd)->resnam; ?>.</p>
                                                                                    </div>
                                                                                    </li>
        <?php } ?>
        <?php if ($detailfd->proc == 2) { ?>
                                                                                    <li class='right clearfix'>
                                                                                    <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($senttofd)->resnam; ?></i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $detailfd->dou; ?></small></div>
                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'> 
                                                                                    <h4 class='timeline-title'>Bank Modification Requested</h4>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>The modifications sent: <?php echo $detailfd->remark; ?>.</p><br>
                                                                                    <p>proposed rate: <?php echo $detailfd->rate; ?></p><br>
                                                                                    <p>Proposed amount: <?php
                                                                                    if ($detailfd->amount == 0)
                                                                                        echo "The Suggested amount is OK";
                                                                                    else
                                                                                        echo $detailfd->amount;
                                                                                    ?></p>
                                                                                    </div>
                                                                                    </li>
        <?php } ?>
        <?php if ($detailfd->proc == 3) { ?>
                                                                                    <li class='right clearfix'>
                                                                                    <div class='timeline-badge info'><i class='fa fa-user'>Me</i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $detailfd->dou; ?></small></div>
                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'> 
                                                                                    <h4 class='timeline-title'>Modification Sent</h4>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>Request modifications made: <?php echo $detailfd->remark; ?>.</p>
                                                                                    <p>proposed rate: <?php echo $detailfd->rate; ?></p><br>
                                                                                    <p>Proposed amount: <?php echo $detailfd->amount; ?></p>
                                                                                    </div>
                                                                                    </li>
        <?php } ?>
        <?php if ($detailibl->proc == 4) { ?>
                                                                                    <li class='right clearfix'>
                                                                                    <div class='timeline-badge'><i class='fa fa-check'></i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $detailfd->dou; ?></small></div>
                                                                                    <div class='timeline-badge info'><i class='fa fa-user'><?php echo current($senttofd)->resnam; ?><i>
                                                                                    </div>
                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'> 
                                                                                    <h4 class='timeline-title'>Quote accepted by Lender</h4>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p>Request Accepted.</p>
                                                                                    </div>
                                                                                    </li>
        <?php } ?>
        <?php if ($detailfd->proc == 5) { ?>  
                                                                                    <li>
                                                                                    <div class='timeline-badge'><i class='fa fa-refresh'></i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $detailfd->dou; ?></small></div>
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
        <?php if ($detailfd->proc == 8) { ?>
                                                                                    <li class='right clearfix'>
                                                                                    <div class='timeline-badge'> <i class='fa fa-user'>&nbsp;<?php echo current($senttofd)->resnam; ?></i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $detailfd->dou; ?></small></div>
                                                                                    <div class='timeline-badge info'>Quote Rejected
                                                                                    </div>
                                                                                    <div class='timeline-panel'> 
                                                                                    <div class='timeline-heading'>
                                                                                    <h4 class='timeline-title'>...</h4><i class='fa fa-times'></i>
                                                                                    </div>
                                                                                    <div class='timeline-body'>
                                                                                    <p><?php echo $myreqfd->rejmot; ?></p>
                                                                                    <p><?php echo $detailfd->remark; ?></p>
                                                                                    </div>
                                                                                    </li>
        <?php } ?>
        <?php if ($detailfd->proc == 9) { ?>
                                                                                    <li>
                                                                                    <div class='timeline-badge'><i class='fa fa-check fa-2x'></i>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <small class=' text-muted'>
                                                                                    <i class='fa fa-clock-o fa-fw'></i><?php echo $detailfd->dou; ?></small></div>
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
                                                                        See History </button>
                                                                </td>
                                                                <td>
                                                                    <a href="#">
                                                                        <div>
                                                                            <p>
                                                                                <strong>Transaction</strong>
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
                modifyl(<?php echo $myreqfd->cdos . "," . "'FD'"; ?>);">Respond</button> <?php
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
                complete(<?php echo $myreqfd->cdos . "," . "'FD'"; ?>);">Completed?</button> <?php
                                                                    }
                                                                    if ($myreqfd->proc == 9) {
                                                                        ?>Completed
                                                                        <?php
                                                                    } else {
                                                                        echo " ... ";
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
<?php }
?>
                                                    </tbody>
                                                </table> 
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="settings">
                                            <h4>Settings Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Securities</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#mpost" data-toggle="tab">My posts</a>
                                        </li>
                                        <li><a href="#rsent" data-toggle="tab">Requests sent</a>
                                        </li>
                                        <li><a href="#transpro" data-toggle="tab">Transactions in progress</a>
                                        </li>
                                        <li><a href="#transco" data-toggle="tab">Completed transactions</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="mpost">
                                            <h4>My posts</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="rsent">
                                            <h4>Requests sent</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="transpro">
                                            <h4>Transactions in progress Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="tab-pane fade" id="transco">
                                            <h4>Completed transactions Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Services</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- .panel-body -->
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" onclick="event.preventDefault();
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" onclick="event.preventDefault();
        saverej();" class="btn btn-primary">Send</button></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>
    $(document).ready(function() {
        //localStorage.clear();
        //alert(localStorage.length);
        //$("#Formore").append("localStorage.length");
        //document.getElementById('basket').value = localStorage.length;
    });
    function complete(id, op) {
        $.ajax({
            type: "GET",
            url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+ "/index.php?r=business/default/complete&id=" + id + "&op=" + op
                    ,
            data: "", //ProposedSites
            cache: false,
            success: function(data) {
                if (data == 'true') {
                    $('#msg').html("Congratulations!!!.It's been good doing business with you. We hope for more interactions in the future.");
                    $('#sModal').modal('show');
                    setTimeout(function() {
                        location.reload();
                        ;
                    }, 1500);

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
                url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+ "/index.php?r=business/default/reject" +
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
                        setTimeout(function() {
                            location.reload();
                            ;
                        }, 500);
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
           url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+ "/index.php?r=business/default/accept&id=" + id + "&op=" + op
                    ,
            data: "", //ProposedSites
            cache: false,
            success: function(data) {
                if (data == 'true') {
                    $('#msg').html("Acceptance statement sent");
                    $('#sModal').modal('show');
                    setTimeout(function() {
                        location.reload();
                        ;
                    }, 500);

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
            url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+ "/index.php?r=business/default/approve&id=" + id + "&op=" + op
                    ,
            data: "", //ProposedSites
            cache: false,
            success: function(data) {
                if (data == 'true') {
                    $('#msg').html("Approval statement sent");
                    $('#sModal').modal('show');
                    setTimeout(function() {
                        location.reload();
                        ;
                    }, 500);

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
            url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+ "/index.php?r=business/default/vieweffect&id=" + id + "&op=" + op
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
        //       alert(id);
        var rate = document.getElementById("rate").value;
        var remark = document.getElementById("remark").value;
        var op = document.getElementById("op").value;
        if (rate === '') {
            alert("Error: The rate you wish to modify must be stated. Please refill the form!");
        }
        else {
            $.ajax({
                type: "GET",
                url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+ "/index.php?r=business/default/modify" +
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
                        setTimeout(function() {
                            location.reload();
                            ;
                        }, 500);
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
    function saverate(button) {
        //    alert("hello");
        var institution = document.getElementById("institution" + button).value;
        var rateT = document.getElementById("rateT" + button).value;
        var rate = document.getElementById("rate" + button).value;
        //    var brate = document.getElementById("brate" + button).value;
        var specialrates = document.getElementById("state" + button).value;//document.getElementById("specialrates"+button).value;
        var term = document.getElementById("term" + button).value;
        var minamount = document.getElementById("minamount" + button).value;
        var scharges = document.getElementById("scharges" + button).value;
        var ofees = document.getElementById("ofees" + button).value;
        //           alert(scharges);
        if (rate === '') {
            alert("Error: The rate must be stated. Please refill the form!");
        }
        else {
            $.ajax({
                type: "GET",
                url: "http://" + document.getElementById("url").value + "/"+document.getElementById("base").value+ "/index.php?r=business/default/addrate" +
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
                        setTimeout(function() {
                            location.reload();
                            ;
                        }, 500);
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

<!-- Flot Charts JavaScript -->
<script src="extras/bower_components/flot/excanvas.min.js"></script>
<script src="extras/bower_components/flot/jquery.flot.js"></script>
<script src="extras/bower_components/flot/jquery.flot.pie.js"></script>
<script src="extras/bower_components/flot/jquery.flot.resize.js"></script>
<script src="extras/bower_components/flot/jquery.flot.time.js"></script>
<script src="extras/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="extras/js/flot-data.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/morrisjs/morris.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/js/morris-data.js"></script>



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

    $(document).ready(function() {
        $('#dataTables-exampler1').DataTable({
            responsive: true
        });
    });
    $(document).ready(function() {
        $('#dataTables-exampler2').DataTable({
            responsive: true
        });
    });
    $(document).ready(function() {
        $('#dataTables-exampler3').DataTable({
            responsive: true
        });
    });
    $(document).ready(function() {
        $('#dataTables-exampler4').DataTable({
            responsive: true
        });
    });
    $(document).ready(function() {
        $('#dataTables-exampler5').DataTable({
            responsive: true
        });
    });
    $(document).ready(function() {
        $('#dataTables-exampler6').DataTable({
            responsive: true
        });
    });
    $(document).ready(function() {
        $('#dataTables-exampler7').DataTable({
            responsive: true
        });
    });


</script>
<script>
    function switcher(id) {
        //alert(id);
        if (document.getElementById('state' + id).value == 1) {
            document.getElementById('state' + id).value = 0;
        }
        else {
            document.getElementById('state' + id).value = 1;
        }
    }
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
<script>
    $('[data-toggle="popover"]').popover({
        container: 'body'
    });
    // popover demo
    $("[data-toggle=popover]")
            .popover()
</script>
