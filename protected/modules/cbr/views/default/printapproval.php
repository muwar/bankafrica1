<div border='1'>
    <?php $entry = Bqcb::model()->findByPk($allcb_id); ?>
    <table border='0' width='100%' style="border-collapse: collapse;" align="center">	
        <tr>
            <td align="center" style="font-size:14px;" colspan="2">
                <?php echo $ratetype = RateTypes::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqcb::model()->findByPk($allcb_id)->num)->quotation_id)->rt_name; ?>:
                <?php echo strtoupper(Fdterms::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqcb::model()->findByPk($allcb_id)->num)->term_id)->term_name); ?> Loan Approved <!-- For <?php // echo $ratetype;   ?>  -->
                <br><hr> 

            </td>    
        </tr>
        <tr>
            <td style="font-size:14px;">Customer:<?php echo Bqcus::model()->findByPk($cus_id)->resnam; ?></td>
            <td style="font-size:14px;">Deposit Bank:<?php echo Bqcus::model()->findByPk(Bqcb::model()->findByPk($allcb_id)->lban)->resnam; ?></td>             

        </tr>
        <tr>
            <td style="font-size:14px;"><br>Amount: <?php echo $entry->amo; ?></td>


            <td style="font-size:14px;">
                Rate : <?php echo $entry->lrat . " %"; ?>
        </tr>

        <tr>
            <td style="font-size:14px;">Date of Request: <?php echo date('d/m/Y', strtotime($entry->dou)); ?></td>

            <td style="font-size:14px;">Approval Date: <?php echo date('d/m/Y', strtotime(current(Bqdibl::model()->findAll('ibl_id=:x and proc=:z', array(':x' => $allcb_id, ':z' => 4)))->dou)); ?></td>
        </tr>
    </table>
</div>