<div border='1'>
    <?php  $entry= Bqfd::model()->findByPk($allfd_id); ?>
    <table border='0' width='100%' style="border-collapse: collapse;" align="center">	
        <tr>
            <td style="font-size:18px;" align="center">
<?php  $ratetype= RateTypes::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqfd::model()->findByPk($allfd_id)->num)->quotation_id)->rt_name; ?>:   
            <?php echo strtoupper(Fdterms::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqfd::model()->findByPk($allfd_id)->num)->term_id)->term_name); ?> Request For <?php echo $ratetype;   ?>
  <br><hr> 
  
            </td>    
            </tr>
            <tr>
                <td style="font-size:18px;">Client :<?php echo Bqcus::model()->findByPk($cus_id)->resnam; ?><br/></td>
            </tr>
            <tr>    
                <td style="font-size:18px;">Deposit Bank:<?php echo Bqcus::model()->findByPk(Bqfd::model()->findByPk($allfd_id)->rban)->resnam; ?></td>             
              
            </tr>
            <tr>
                <td style="font-size:18px;"><br>Amount Requested: <?php echo $entry->amo;  ?></td>
            </tr>
            <tr>
            
            <td style="font-size:18px;">
                Rate : <?php echo $entry->drat." %" ; ?><br/>
                </tr>
            <tr>
                <td style="font-size:18px;">
               <br/> Date of request : <?php echo date('d/m/Y', strtotime($entry->dou)); ?>
                </td>
        </tr>
    </table>
</div>