<h3 align='center'>Complete Transaction History for 
<?php echo $rate = RateTypes::model()->findByPk((InstitutionsQuotation::model()->findByPk(Bqibl::model()->findByPk($id)->num)->quotation_id))->rt_name ?>
</h3><hr>
    <?php $iblentry = Bqibl::model()->findByPk($id); ?>
<p>Parties : <?php echo $cname = Bqcus::model()->findByPk($iblentry->target)->resnam; ?> and <?php echo Bqcus::model()->findByPk($iblentry->cus)->resnam; ?></p>
<?php $detailibls = Bqdibl::model()->findAll('ibl_id=:x', array(':x' => $id)); ?>
<?php foreach ($detailibls as $detailibl) { ?>
    <div class='panel-body'>
        <table>
            <?php if ($detailibl->proc == 0) { ?>
                <tr>
                    <td>
                        
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
                                <p>Request sent to <?php echo $cname;
        ;
                ?> for <?php echo $rate; ?>. The quotation was done for <?php echo Bqibl::model()->findByPk($id)->amo . " at rate  " . Bqibl::model()->findByPk($id)->brat . " %"; ?> .</p>
                            </div>
                        </div>    
                    </td>
                </tr>
            <?php } ?>
    <?php if ($detailibl->proc == 1) { ?>
                <tr>    
                    <td class='right clearfix'>
                        <div class='timeline-badge info'><i class='fa fa-user'><?php echo $cname; ?></i>
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
                                <p>The request sent has been seen by <?php echo $cname; ?>.</p>
                            </div>
                    </td>
                </tr>
            <?php } ?>
    <?php if ($detailibl->proc == 2) { ?>
                <tr>
                    <td class='right clearfix'>
                        <div class='timeline-badge info'><i class='fa fa-user'><?php echo $cname; ?></i>
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
                    </td>
                </tr>
            <?php } ?>
    <?php if ($detailibl->proc == 3) { ?>
                <tr>
                    <td class='right clearfix'>
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
                    </td>
                </tr>
            <?php } ?>
    <?php if ($detailibl->proc == 4) { ?>
                <tr>
                    <td class='right clearfix'>
                        <div class='timeline-badge info'><i class='fa fa-user'><?php echo $cname; ?></i>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <small class=' text-muted'>
                                <i class='fa fa-clock-o fa-fw'></i><?php echo $detailibl->dou; ?></small></div>

                        </div>
                        <div class='timeline-panel'> 
                            <div class='timeline-heading'> 
                                <p><h4 class='timeline-title'>Quote accepted by Lender</h4></p>
                            </div>
                            <div class='timeline-body'>
                                <p>Request Accepted.</p>
                            </div>
                    </td>
                </tr>
            <?php } ?>
    <?php if ($detailibl->proc == 5) { ?>  
                <tr>
                    <td >
                        <div class='timeline-badge'><i class='fa fa-refresh'><?php echo $cname; ?>/ Me</i>
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
                    </td>
                </tr>
            <?php } ?>
    <?php if ($detailibl->proc == 8) { ?>
                <tr>
                    <td class='right clearfix'>
                        <div class='timeline-badge'> <i class='fa fa-user'>&nbsp;<?php echo $cname; ?></i>
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
                                <p><?php echo $detailibl->rejmot; ?></p>
                                <p><?php echo $detailibl->remark; ?></p>
                            </div>
                    </td>
                </tr>
            <?php } ?>
    <?php if ($detailibl->proc == 9) { ?>
                <tr>
                    <td>
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

                    </td>
                </tr>
    <?php } ?>
        </table>
    </div>
<?php } ?>
<