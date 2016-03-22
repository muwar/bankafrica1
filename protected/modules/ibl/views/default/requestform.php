<div border='1'>
  
    <?php $entry = Bqibl::model()->findByPk($allbl_id); ?>
    <table border='0' width='100%' style="border-collapse: collapse;" align="center">	
        <tr>
            <td align="center" width='100%' style="font-size:18px;">
                   <?php echo $ratetype = RateTypes::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqibl::model()->findByPk($allbl_id)->num)->quotation_id)->rt_name; ?>:
                <?php echo strtoupper(Terms::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqibl::model()->findByPk($allbl_id)->num)->term_id)->term_name); ?> Request For <?php echo $ratetype; ?>
                <hr> 
            </td>    
        </tr>
        <tr>
            <?php if ($ratetype == "Inter-Bank Lending") { ?>
                <td width='100%' style="font-size:18px;">Lender : <?php echo Bqcus::model()->findByPk(Bqibl::model()->findByPk($allbl_id)->target)->resnam; ?>
                    <br/></td>
            </tr>
            <tr>
                <td width='100%' style="font-size:18px;">Borrower : <?php echo Bqcus::model()->findByPk($cus_id)->resnam; ?>
                    </td>
            <?php } else {
                ?>
                <td style="font-size:18px;">Lender : <?php echo Bqcus::model()->findByPk($cus_id)->resnam; ?>
                    <br/></td>

            </tr>
            <tr>                
                <td style="font-size:18px;">Borrower : <?php echo Bqcus::model()->findByPk(Bqibl::model()->findByPk($allbl_id)->target)->resnam; ?>
                    </td>             
            <?php } ?>
        </tr>
        <tr>
            <td style="font-size:18px;"><br>Amount Requested: <?php echo $entry->amo; ?>
                <br/></td>
        </tr>
        <tr>            
            <td style="font-size:18px;">
                Rate : <?php echo $entry->brat . " %"; ?>
                <br/></td>
        </tr>
        <tr>
            <td style="font-size:18px;">
                Value Date : <?php echo date('d/m/Y', strtotime($entry->vdate)); ?>
                <br/>
            </td>
        </tr>
        <tr>
            <td style="font-size:18px;">
                Expiry Date : <?php echo date('d/m/Y', strtotime($entry->edate)); ?>
                <br/>
            </td>       
        </tr>
    </table>
</div>