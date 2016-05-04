
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
        border: 1px solid #125089;
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
	#button{
		position:absolute;
		top:35%;
		left:45%;
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
<?php

$this->beginWidget('application.extensions.sidebar.Sidebar', array('title' => 'Inter-Bank Lending - How to', 'collapsed' => true, 'position'=>'right'));
?>
<ul>
Assuming that all rates have been published on the platform by the various banks, you can bid to lend or borrow as follows

<li>On the IBL panel, choose a favourable borrowing or lending rate for a specified period as published by a bank. </li>
<li>This will generate an automatic page for you to insert and submit amount you wish to borrow or lend. </li>
<li>Before submitting, make sure the value date (the day from which you effectively want exchange to take place) and the expiry date (the date beyond which you are no longer interested in the transaction) has been inserted.</li>
<li>Then, wait for a response from the counter party bank</li>
<li>In case a published rate is biddable, you can propose and submit your best rate along other details and wait for response from bank.</li>

<strong><i>Features</i></strong>

On the Inter-Bank Lending (IBL) panel, you can view the following features specific to your bank
<li>Current Lending request</li>
<li>Current Borrowing requests</li>
<li>Transactions progress report</li>
<li>Request history, which can be sorted under different criteria</li>

</ul>
<?php
$this->endWidget();
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <?php
            $ucodes = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
            foreach ($ucodes as $ucode)
                ;
            $allibl = Bqibl::model()->findall('target=:y', array(':y' => $ucode->id));
            $iblhistory = Bqibl::model()->findAll('target=:y or cus=:x', array(':y' => $ucode->id, ':x' => $ucode->id))
            ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <?php   if(Yii::app()->session['country_chosen'] =='' ){  ?>
                        AFRICAPITAL QUOTE>><< INTERBANK LENDING (IBL)         <?php
?>
                                              
<?php }else{ $country=Countries::model()->findByPk(Yii::app()->session['country_chosen']);
 ?>
<label class="flag flag-<?php echo strtolower($country->iso_alpha2);?>" align="right"></label> 
 AFRICAPITAL QUOTE>><?php  echo $country->name ?><< INTERBANK LENDING (IBL)                                            
<?php
  } ?>

  <br/>
  Current Rates (%)/Period>>LR: Lending Rate<< BR: Borrowing Rate
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"></a>
                    </h4>
                </div>

                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li id="rates1" class='active'><a href="#rates" data-toggle="tab">Rates</a>
                        </li>
                        <li id="conf1"><a href="#conf" data-toggle="tab">Configure Rates</a>
                        </li>
                        <li id="creq1"><a href="#creq" data-toggle="tab"> Customer Requests</a>
                        </li>
                        <li id="mreq1"><a href="#mreq" data-toggle="tab"> My Requests</a>
                        </li>
                        <li id="his1"><a href="#his" data-toggle="tab"> History of Transactions</a>
                        </li>
                        <li id="ratehis1"><a href="#ratehis" data-toggle="tab">Evolution of Rates</a>
                        </li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="rates">
                            <div class="dataTable_wrapper">
                             
                                  <h3 align="center"><button class="btn  btn-success btn1" id="button">Export to excel</button> </h3>

                                <table class="table table-striped table-bordered table-hover table2excel tableresults table-responsive" id="dataTables-exampleX">
                                    <thead>
                                        <tr>
                                            <th> Operation</th>
                                            <?php foreach ($terms as $tterm) { ?>
                                                <th><?php echo $tterm->term_name; ?></th>
                                            <?php } ?>
                                            <th class="noExl">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($rates as $rate) {
                                            if (($rate->rt_name == "Inter-Bank Lending") || ($rate->rt_name == "Inter-Bank Borrowing")) {
                                                echo "<tr class='odd gradeX'>";
                                                echo "<td>" . $rate->rt_name . "</td>";
                                                //        echo ;
                                                $findusercode = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
                                                $usercode = current($findusercode)->id;
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
                                            ?>
                                            <td onclick="
                $('#rates1').prop('class', '');
                $('#rates').prop('class', 'tab-pane fade');
                //$('#rates').hide();
                $('#conf1').prop('class', 'active');
                $('#conf').prop('class', 'tab-pane fade active');
                $('#conf').show();"><a href="#" class="noExl"><i class="fa fa-edit">Change</i></a></td>
                                                <?php
                                                echo "</tr>";
                                            }
                                            else
                                                continue;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="conf">

                            <?php
                            foreach ($rates as $rate) {
                                if (($rate->rt_name == "Inter-Bank Lending") || ($rate->rt_name == "Inter-Bank Borrowing")) {
                                    
                                    ?>
                                    <input onclick="togglepane(<?php echo $rate->rt_id ?>)" class="pull-center" type="radio" name="ratetype" value="male" id="toggler<?php echo $rate->rt_name ?>"><?php echo $rate->rt_name ?>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            $ratecount = 0;
                            foreach ($rates as $rate) {
                                if (($rate->rt_name == "Inter-Bank Lending") || ($rate->rt_name == "Inter-Bank Borrowing")) {
                                    $ratecount++;
                                    ?>
                                    <div class="panel-default" id="ratetoggle<?php echo $rate->rt_id ?>">
                                        <div class="panel-heading">
                                            <h3 align="center"><label style="color:navy;font-size: 22px;"><!--<input type="checkbox"  value="<?php echo $rate->rt_id; ?>" onclick="toggle1(this.value)">--><?php echo $rate->rt_name ?></label></h3>
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="dataTable_wrapper">
                                               
                                                <div class="form">
                                                    <?php
                                                    $form = $this->beginWidget('CActiveForm', array(
                                                        'id' => 'evuti-form',
                                                        'enableAjaxValidation' => false,
                                                    ));
                                                    ?>

                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-exampler1">
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
                                                                <td>
<div class="input-group">
                                                                <input type="text" class="form-control" id="rate<?php echo $rate->rt_id . $term->term_id; ?>" name="rate" placeholder="Rate "><span class="input-group-addon">%</span>
                                                                </div></td>
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
                                                                <td>
<div class="input-group" style="width:100px">
                                                                <input type="text" class="form-control" id="rate<?php echo $rate->rt_id . $term->term_id; ?>" name="rate" placeholder="<?php echo $checkrecentrecord->lrate; ?> ">
                                                                <span class="input-group-addon">%</span>
                                                                </div>
                                                                </td>
                                                                <td><input value='<?php echo $rate->rt_id . $term->term_id; ?>' type="checkbox" id="specialrates<?php echo $rate->rt_id . $term->term_id; ?>" name="specialrates<?php echo $rate->rt_id . $term->term_id; ?>" onclick="switcher(this.value)" <?php
                                                                    if ($checkrecentrecord->special_rate == 1)
                                                                        echo "checked";
                                                                    else
                                                                        ;
                                                                    ?>></td>
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

                                                <p align='center'>                                            <button type="submit" value="<?php echo $rate->rt_id; ?>" id="<?php echo $rate->rt_id; ?>" class="btn btn-primary" onclick="event.preventDefault();
                savebulkrate(this.value);">Save</button>
                                                    <input type="reset" value="Reset!" class="btn btn-primary">
                                                </p>                                          <?php $this->endWidget(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <script>
    $(document).ready(function() {
        $('#ratetoggle1').show();
        $('#ratetoggle2').hide();
    });
    function  togglepane(id) {


        if (id == 1) {
            $('#ratetoggle1').show();
            $('#ratetoggle2').hide();
        }
        else {
            if (id == 2) {
                $('#ratetoggle2').show();
                $('#ratetoggle1').hide();
            }
        }

    }
                            </script>

                            <input type="hidden" class="form-control" id="ratecount" name="ratecount" value="<?php echo $ratecount; ?>">
                            <input type="hidden" class="form-control" id="termcount" name="termcount" value="<?php echo $termcount; ?>">
                        </div>
                        <div class="tab-pane fade" id="creq">
                            <div class="dataTable_wrapper">
                              
                                     <h3 align="center"><button class="btn  btn-success btn1" id="button1">Export to excel</button> </h3>

                                <table class="table table-striped table-bordered table-hover table2excel tableresults" id="dataTables-exampler1">
                                    <thead>
                                        <tr>
                                            <th>Transaction type</th>
                                            <th>Client</th>
                                            <th>Date</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Status</th>
 <!--                                           <th>Approve</th>
                                            <th>Reject</th>
                                            <th>Modify</th>
                                            <th>details</th> -->
                                            <th>View Details</th>
                                            <th>Customer's contact</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        foreach ($allibl as $allbl) {
                                            $statedrate = InstitutionsQuotation::model()->findByPk($allbl->num);
                                            $ratetype = RateTypes::model()->findByPk($statedrate->quotation_id);
                                            if(Yii::app()->session['country_chosen'] =='' ){ 
                                            $clients = Bqcus::model()->findAll('cus=:x', array(':x' => $allbl->cus));
                                        }
                                        else{
                                         $clients = Bqcus::model()->findAll('cus=:x and country_id=:y', array(':x' => $allbl->cus, ':y'=>Yii::app()->session['country_chosen']));   
                                         if(count($clients)==0){
                                            continue;
                                         }
                                         else{
                                            ;
                                         }
                                        }
                                            $dibls = Bqdibl::model()->findAll('ibl_id=:x', array(':x' => $allbl->cdos));
                                            if ($allbl->proc == 0) {
                                                ?>
                                                <tr style="color:purple"  onclick="vieweffected(<?php echo $allbl->cdos . "," . "'IBL'"; ?>);">
                                                    <?php
                                                } else {
                                                    ?>
                                                <tr>
                                                <?php } ?>
                                                <td><?php echo $ratetype->rt_name; ?></td>
                                                <td> <?php
            $src = Yii::app()->request->baseUrl."/images/banklogos/" . Evuti::model()->findByPk(current($clients)->cus)->nom . ".".Evuti::model()->findByPk(current($clients)->cus)->pic_ext;
            if(Evuti::model()->findByPk(current($clients)->cus)->pic_ext==''){
                ;              
            }
            else{
            echo    @getimagesize($src);
            if (@getimagesize($src)) {
                
                    echo '<img class="over" style=" top: 0px; right: 0px;" class="imgbrder" src="'.Yii::app()->request->baseUrl.'/images/banklogos/' .Evuti::model()->findByPk(current($clients)->cus)->nom . '.'.Evuti::model()->findByPk(current($clients)->cus)->pic_ext.'" alt="' . '' . '" width="100px" height="100px" />';
                } else {
         ;      
                
                    echo '<img class="over" style=" top: 0px; right: 0px;" class="imgbrder" src="'.Yii::app()->request->baseUrl.'/images/banklogos/' .Evuti::model()->findByPk(current($clients)->cus)->nom . '.'.Evuti::model()->findByPk(current($clients)->cus)->pic_ext.'" alt="' . '' . '" width="40px" height="20px" />';
       
                }
              }
            ?>
<br/>
                                                <?php echo current($clients)->resnam; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($allbl->dou)); ?></td>
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
                                                <td><?php
                                                    if ($allbl->proc == 0)
                                                        echo "New";
                                                    else {
                                                        if ($allbl->proc == 1)
                                                            echo 'Viewed';
                                                        if ($allbl->proc == 9)
                                                            echo "Completed";
                                                        if($allbl->proc == 10)
                                                            echo 'Customer contacted';
                                                        else
                                                            echo "Customer contacted";
                                                     
                                                    }
                                  ?>
                                  </td>
                                           
                                  <td>
                                                    
&nbsp;
                <button type="button" class="btn btn-default" data-container="body" data-html="true" data-toggle="popover" data-placement="bottom"  
                                                            data-content="<div class='row'>
                                                            <div class='col-md-12'>
                                                            <div class='col-md-6'> 
                      <h3 align=center> 
                                                           <strong>
Customer: <?php echo current($clients)->resnam; ?><br/>
Tel: <?php if(current($clients)->telephone!=''){
    echo current($clients)->telephone;}
        else{

          echo   ' Not available'; 
             } ?><br/>
Email: <?php if(current($clients)->email!=''){
    echo current($clients)->email;}
        else{

          echo   ' Not available'; 
             } ?>
             </div>
             <div class='col-md-6'> 
<?php  if(current($dibls)->proc!=10){  ?>
<form>
             Have you successfully contacted this customer?</br>
              Yes
              <input type='radio' name='contact' value=1 onclick='customercontact(1, <?php echo current($clients)->cus.",". current($dibls)->ibl_id;  ?>);' > 
              No
              <input type='radio' name='contact' value=0 onclick='customercontact(0,<?php echo current($clients)->cus.",". current($dibls)->ibl_id;  ?>);'> 
 </form>    
 <?php } ?>
                            </strong>
                            </h3>
                                </div>
             </div>
                                         <?php

                                                             foreach ($dibls as $dibl) { ?>
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
                                                                    <p><?php echo current($clients)->resnam; ?>  <?php echo Terms::model()->findByPk(InstitutionsQuotation::model()->findByPk($allbl->num)->term_id)->term_name; ?> request of  <?php echo $allbl->amo . " for rate  " . $allbl->brat . " %"; ?> .
                                                                    <a href='<?php echo '/bankafrica1/index.php?r=ibl/default/printrequest&cus_id=' . current($clients)->cus . "&allbl_id=" . $allbl->cdos; ?>'>Print Request</a>
                                                                    <?php // echo CHtml::link('Print',array('printrequest','cus_id'=>current($clients)->cdos, 'allbl_id'=>$allbl->cdos));    ?>
                                                                    <?php // echo CHtml::link('print',array('print'));         ?>
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
                                                                    <a href='<?php echo '/bankafrica1/index.php?r=ibl/default/printapproval&cus_id=' . current($clients)->cus . "&allbl_id=" . $allbl->cdos; ?>'>Print Approval</a>
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
                                                                    <p><?php echo $allbl->rejmot; ?></p>
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
                                                      View  Details </button>
                                                </td>
  <td>
                                       

Customer: <?php echo current($clients)->resnam; ?><br/>
Tel: <?php if(current($clients)->telephone!=''){
    echo current($clients)->telephone;}
        else{

          echo   ' Not available'; 
             } ?><br/>
Email: <?php if(current($clients)->email!=''){
    echo current($clients)->email;}
        else{

          echo   ' Not available'; 
             } ?>

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
                                  <h3 align="center"><button class="btn  btn-success btn1" id="button2">Export to excel</button> </h3>

                              

                                <table class="table table-striped table-bordered table-hover table2excel tableresults" id="dataTables-exampler4">
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
                                        $myreqibls = Bqibl::model()->findAll('cus=:x', array(':x' => $ucode->id));
                                        foreach ($myreqibls as $myreqibl) {
                                            $ratingibl = InstitutionsQuotation::model()->findByPk($myreqibl->num);
                                            $ratingrateibl = RateTypes::model()->findByPk($ratingibl->quotation_id);
                                                if(Yii::app()->session['country_chosen'] =='' ){ 
                                            $senttoibl = Bqcus::model()->findAll('cus=:x', array(':x' => $myreqibl->target));
                                        }
                                        else{
                                        $senttoibl = Bqcus::model()->findAll('cus=:x and country_id=:y', array(':x' => $myreqibl->target,':y'=>Yii::app()->session['country_chosen']));   
                                        if(count($senttoibl)==0){
                                            continue;
                                        }
                                        else{
                                            ;
                                        }
                                        }
                                            
                                            $detailibls = Bqdibl::model()->findAll('ibl_id=:x', array(':x' => $myreqibl->cdos));
                                            ?>
                                            <tr>
                                                <td> 
                                                 <?php
            $src = Yii::app()->request->baseUrl."/images/banklogos/" . Evuti::model()->findByPk(current($senttoibl)->cus)->nom . ".".Evuti::model()->findByPk(current($senttoibl)->cus)->pic_ext;
            if(Evuti::model()->findByPk(current($senttoibl)->cus)->pic_ext==''){
                ;              
            }
            else{
            echo    @getimagesize($src);
            if (@getimagesize($src)) {
                
                    echo '<img class="over" style=" top: 0px; right: 0px;" class="imgbrder" src="'.Yii::app()->request->baseUrl.'/images/banklogos/' .Evuti::model()->findByPk(current($senttoibl)->cus)->nom . '.'.Evuti::model()->findByPk(current($senttoibl)->cus)->pic_ext.'" alt="' . '' . '" width="100px" height="100px" />';
                } else {
         ;      
                
                    echo '<img class="over" style=" top: 0px; right: 0px;" class="imgbrder" src="'.Yii::app()->request->baseUrl.'/images/banklogos/' .Evuti::model()->findByPk(current($senttoibl)->cus)->nom . '.'.Evuti::model()->findByPk(current($senttoibl)->cus)->pic_ext.'" alt="' . '' . '" width="40px" height="20px" />';
       
                }
              }
            ?>

                                                <br/>
                                                <?php echo current($senttoibl)->resnam; ?></td>   
                                                <td><?php echo date('d/m/Y', strtotime($myreqibl->dou)); ?></td>
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
                                                                   <?php echo $myreqibl->brat . " %"; ?>  
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

                                                <td>
                                                    <a href="#">
                                                        <div>
                                                            <p>
                                                                <strong><?php
                                                                    if ($myreqibl->proc == 0)
                                                                        echo "Request sent";
                                                                    if ($myreqibl->proc == 1)
                                                                        echo "Request seen";
                                                                    if ($myreqibl->proc == 2)
                                                                        echo "Modification requested";
                                                                    if ($myreqibl->proc == 3)
                                                                        echo "Modification made";
                                                                    if ($myreqibl->proc == 4)
                                                                        echo "Approved";
                                                                    if ($myreqibl->proc == 5)
                                                                        echo "Transaction in progress";
                                                                    if ($myreqibl->proc == 8)
                                                                        echo "Rejected";
                                                                    if ($myreqibl->proc == 9)
                                                                        echo "Completed";
                                                                    ?></strong>
                                                                <span class="pull-right text-muted"><?php echo round(((($myreqibl->proc) / 9) * 100), 0) . " %"; ?> </span>
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
                                                    arsort($detailibls);
                                                    if (($myreqibl->proc == 1) || ($myreqibl->proc == 0) || ($myreqibl->proc == 5)) {
                                                        ?>
                                                        <h1 align='center'>    ...</h1>
                                                    <?php } if ($myreqibl->proc == 2) { ?>
                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                modifyl(<?php echo $myreqibl->cdos . "," . current($detailibls)->rate . "," . "'IBL'"; ?>);">Respond</button> 
                                                                <?php
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
                                                    }
                                                    if ($myreqibl->proc == 2) {
                                                        ?>
                                                        <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                acceptmod(<?php echo $myreqibl->cdos . "," . current($detailibls)->rate . "," . "'IBL'"; ?>);">Accept</button>

                                                    <?php } else { ?>
                                                        ...                                                <?php }
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
                                                                    <p>Request sent to <?php echo current($senttoibl)->resnam; ?> for <?php echo $ratingrateibl->rt_name; ?>. The quotation was done for <?php echo $myreqibl->amo . " at rate  " . $myreqibl->brat . " %"; ?> .</p>
                                                                    <a href='<?php echo '/bankafrica1/index.php?r=ibl/default/printrequest&cus_id=' . $ucode->id . "&allbl_id=" . $myreqibl->cdos; ?>'>Print Request</a>

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
                                                                    <p><a href='<?php echo '/bankafrica1/index.php?r=ibl/default/printapproval&cus_id=' . $ucode->id . "&allbl_id=" . $myreqibl->cdos; ?>'>Print Approval statement</a></p>

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
                                                                    <p><?php echo $myreqibl->rejmot; ?></p>
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
                                                        Details </button>
                                                    <?php echo CHtml::link(' Print', array('printhistory', 'id' => $myreqibl->cdos, 'mid' => $ucode->id)); ?>
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
                                 <h3 align="center"><button class="btn  btn-success btn1" id="button3">Export to excel</button> </h3>

                                <table class="table table-striped table-bordered table-hover" id="dataTables-exampleo">
                                    <thead>
                                        <tr>
                                            <th>Bank</th>
                                            <th>Transaction</th>
                                            <th>Term</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Request date</th>
                                            <th>Status</th>
                                            <th>Approval date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($iblhistory as $iblhis) {

                                            if(Yii::app()->session['country_chosen']!=''){
                                                $country_test=Bqcus::model()->findByPk($iblhis->target);
                                                if($country_test->country_id==Yii::app()->session['country_chosen']){
                                                    ;
                                                }
                                                else{
                                                    continue;
                                                }

                                            }
                                            else{
                                                ;
                                            }
                                         ?>
                                            <tr>
                                                <?php if ($ucode->id == $iblhis->cus) { ?>
                                                    <td>
                                                     <?php
            $src = Yii::app()->request->baseUrl."/images/banklogos/" . Evuti::model()->findByPk($iblhis->target)->nom . ".".Evuti::model()->findByPk($iblhis->target)->pic_ext;
            if(Evuti::model()->findByPk($iblhis->target)->pic_ext==''){
               echo '--' ;              
            }
            else{
            echo    @getimagesize($src);
            if (@getimagesize($src)) {
                
                    echo '<img class="over" style=" top: 0px; right: 0px;" class="imgbrder" src="'.Yii::app()->request->baseUrl.'/images/banklogos/' .Evuti::model()->findByPk($iblhis->target)->nom . '.'.Evuti::model()->findByPk($iblhis->target)->pic_ext.'" alt="' . '' . '" width="100px" height="100px" />';
                } else {
         ;      
                
                    echo '<img class="over" style=" top: 0px; right: 0px;" class="imgbrder" src="'.Yii::app()->request->baseUrl.'/images/banklogos/' .Evuti::model()->findByPk($iblhis->target)->nom . '.'.Evuti::model()->findByPk($iblhis->target)->pic_ext.'" alt="' . '' . '" width="40px" height="20px" />';
       
                }
              }
            ?>
<br/>
                                                    <?php echo Bqcus::model()->findByPk($iblhis->target)->resnam; ?></td>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <td>
                                                     <?php
            $src = Yii::app()->request->baseUrl."/images/banklogos/" . Evuti::model()->findByPk($iblhis->cus)->nom . ".".Evuti::model()->findByPk($iblhis->cus)->pic_ext;
            if(Evuti::model()->findByPk($iblhis->cus)->pic_ext==''){
               echo '--' ;              
            }
            else{
            echo    @getimagesize($src);
            if (@getimagesize($src)) {
                
                    echo '<img class="over" style=" top: 0px; right: 0px;" class="imgbrder" src="'.Yii::app()->request->baseUrl.'/images/banklogos/' .Evuti::model()->findByPk($iblhis->cus)->nom . '.'.Evuti::model()->findByPk($iblhis->cus)->pic_ext.'" alt="' . '' . '" width="100px" height="100px" />';
                } else {
         ;      
                
                    echo '<img class="over" style=" top: 0px; right: 0px;" class="imgbrder" src="'.Yii::app()->request->baseUrl.'/images/banklogos/' .Evuti::model()->findByPk($iblhis->cus)->nom . '.'.Evuti::model()->findByPk($iblhis->cus)->pic_ext.'" alt="' . '' . '" width="40px" height="20px" />';
       
                }
              }
            ?>

<br/>
                                                    <?php echo Bqcus::model()->findByPk($iblhis->cus)->resnam; ?></td>
                                                <?php } ?>
                                                <td><?php echo RateTypes::model()->findByPk(InstitutionsQuotation::model()->findByPk($iblhis->num)->quotation_id)->rt_name; ?></td>
                                                <td><?php echo Terms::model()->findByPk(InstitutionsQuotation::model()->findByPk($iblhis->num)->term_id)->term_name; ?></td>
                                                <td><?php echo $iblhis->brat . " %"; ?></td>
                                                <td><?php echo $iblhis->amo; ?></td>

                                                <td><?php echo date('d/m/Y', strtotime($iblhis->dou)); ?></td>
                                                <?php if ($iblhis->proc == 0) { ?>
                                                    <td>New</td>
                                                <?php } else { ?>
                                                    <?php if ($iblhis->proc == 9) { ?>
                                                        <td>Completed</td>
                                                    <?php } else {
                                                        ?>
                                                        <td>Pending</td>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <?php if (($iblhis->proc == 4) || ($iblhis->proc == 5) || ($iblhis->proc == 9)) { ?>
                                                    <td><?php echo date('d/m/Y', strtotime(current(Bqdfd::model()->findAll('fd_id=:x and proc=:y', array(':x' => $iblhis->cdos, ':y' => 4)))->dou)); ?></td>
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
                                if (($ratetypes->rt_name == "Inter-Bank Lending") || ($ratetypes->rt_name == "Inter-Bank Borrowing")) {
                                    ?>    
                                    <div class="panel-default">
                                        <div class="panel-heading">
                                            <h3 align="center"><label style="color:navy;font-size: 22px;"><?php echo $ratetypes->rt_name ?></label></h3>
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="dataTable_wrapper">
                                                
                                                 
                           <h3 align="center">       <button class="btn  btn-success btn1" id="buttons<?php  echo $i; ?>">Export</button></h3>
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-examples<?php  echo $i; ?>">
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
                                                                <td><?php echo Terms::model()->findByPk($inrate->term_id)->term_name; ?></td>
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick='event.preventDefault();
        closedialog();'>&times;</button>
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
                        <label>Acceptable rate (%)</label>&nbsp;&nbsp;<input class="form-control" style="width:400px;" placeholder="Value of acceptable rate" name="rate" id="rate" type="text" value="" autofocus>
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
    </div>
    <!-- /.modal-content -->
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/raphael/raphael-min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/dist/js/sb-admin-2.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/extras/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.table2excel.js"></script>


<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.table2excel.js"></script>

<script>
    $(function() {
        $("#button").click(function() {
            alert('hello');
            $("#dataTables-exampleX").table2excel({
                exclude: ".noExl",
                name: "IBL: configuration"
            });
        });
        
        $("#button1").click(function() {
            $("#dataTables-exampler1").table2excel({
                exclude: ".noExl",
                name: "IBL: customer request"
            });
        });
 $("#button2").click(function() {
            $("#dataTables-exampler4").table2excel({
                exclude: ".noExl",
                name: "IBL: customer request"
            });
        });
 $("#button3").click(function() {
            $("#dataTables-exampleo").table2excel({
                exclude: ".noExl",
                name: "IBL: customer request"
            });
        });        
        $("#buttons1").click(function() {
            $("#dataTables-examples1").table2excel({
                exclude: ".noExl",
                name: "IBL: Rate history"
            });
        });
        $("#buttons2").click(function() {
            $("#dataTables-examples1").table2excel({
                exclude: ".noExl",
                name: "IBL: Rate History"
            });
        });
    });

</script>

<script>
    $(document).ready(function() {
        //localStorage.clear();
        //alert(localStorage.length);
        //$("#Formore").append("localStorage.length");
        //document.getElementById('basket').value = localStorage.length;
    });
    function closedialog() {
        $('#closedialog').on('click', location.reload());
    }
    function complete(id, op) {
        $.ajax({
            type: "GET",
            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=business/default/complete&id=" + id + "&op=" + op
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
    function modifyl(id, rateit, op) {
        //        alert(id);
        document.getElementById('op').value = op;
        document.getElementById('id').value = id;
        document.getElementById('rate').value = rateit;
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
                url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=business/default/reject" +
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
            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=business/default/accept&id=" + id + "&op=" + op
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
            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=business/default/approve&id=" + id + "&op=" + op
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
            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=business/default/vieweffect&id=" + id + "&op=" + op
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
    function acceptmod(id, rate, op) {

        var remark = "The rate you propose is OK by me";
        if (rate === '') {
            alert("Error: The rate you wish to modify must be stated. Please refill the form!");
        }
        else {
            $.ajax({
                type: "GET",
                url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=business/default/modify" +
                        "&rate=" + rate +
                        "&remark=" + remark +
                        "&id=" + id +
                        "&op=" + op,
                data: "", //ProposedSites
                cache: false,
                success: function(data) {
                    if (data == 'true') {
                        $('#msg').html(" Your approval of the proposed rate has been sent");
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
                url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=business/default/modify" +
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
        var ratecount = document.getElementById("ratecount").value;
        //              alert(ratecount);
        //             alert(termcount);

        for (var i = 1; i <= ratecount; i++) {
            if (button == i) {
                for (var j = 1; j <= termcount; j++) {
                    //    alert('inside j')
                    //    alert("institution" + i + j);

                    var institution = document.getElementById("institution" + i + j).value;
                    var rateT = document.getElementById("rateT" + i + j).value;
                    var rate = document.getElementById("rate" + i + j).value;
                    var specialrates = document.getElementById("state" + i + j).value;//document.getElementById("specialrates"+button).value;
                    var term = document.getElementById("term" + i + j).value;
                    var minamount = document.getElementById("minamount" + i + j).value;
                    var scharges = document.getElementById("scharges" + i + j).value;
                    var ofees = document.getElementById("ofees" + i + j).value;

                    if (rate === '') {
                        ;// alert("Error: The rate must be stated. Please refill the form!");
                    }
                    else {
                        $.ajax({
                            type: "GET",
                            url: "http://" + document.getElementById('url').value + "/bankafrica1/index.php?r=ibl/default/addrate" +
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
            else
                ;
        }
    }
    function saverate(button) {
        //          alert("hello");
        var institution = document.getElementById("institution" + button).value;
        var rateT = document.getElementById("rateT" + button).value;
        var rate = document.getElementById("rate" + button).value;
        //    var brate = document.getElementById("brate" + button).value;
        var specialrates = document.getElementById("state" + button).value;//document.getElementById("specialrates"+button).value;
        var term = document.getElementById("term" + button).value;
        var minamount = document.getElementById("minamount" + button).value;
        var scharges = document.getElementById("scharges" + button).value;
        var ofees = document.getElementById("ofees" + button).value;
        //               alert(scharges);
        if (rate === '') {
            alert("Error: The rate must be stated. Please refill the form!");
        }
        else {
            $.ajax({
                type: "GET",
                url: "http://" + document.getElementById('url').value + "/bankafrica1/index.php?r=ibl/default/addrate" +
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

        function customercontact(state,customer,ibl_id) {
            if(state==0){
                                        $('#msg').html(" successfully Captured");
                        $('#sModal').modal('show');

            }
      else{ 
            $.ajax({
                type: "GET",
                url: "http://" + document.getElementById('url').value + "/bankafricat1/index.php?r=ibl/default/customercontact" +
                        
                        "&state=" + state +
                        "&customer=" + customer +
                        "&ibl_id=" + ibl_id,
                data: "", //ProposedSites
                cache: false,
                success: function(data) {
                    if (data == 'true') {
                        $('#msg').html(" Good luck in your transactions");
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
        $('#dataTables-examples1').DataTable({
            responsive: true
        });
        $('#dataTables-exampleX').DataTable({
            responsive: true
        });
        $('#dataTables-examples2').DataTable({
            responsive: true
        });
    });

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
<script>
    $(document).ready(function() {
        $('#dataTables-exampleo').DataTable({
            responsive: true
        });
    });
</script>
