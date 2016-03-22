<div border='1'>
    <br/>
    <?php  $entry= Bqpla::model()->findByPk($allfd_id); ?>
    <table border='0' width='100%' style="border-collapse: collapse;" align="center">	
        <tr>
            <td style="font-size:18px;" align="center">
   <?php  $ratetype= RateTypes::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqpla::model()->findByPk($allfd_id)->num)->quotation_id)->rt_name; ?>:

               <?php echo strtoupper(Fdterms::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqpla::model()->findByPk($allfd_id)->num)->term_id)->term_name); ?> Request For <?php echo $ratetype;   ?>
  <br><hr> 
  
            </td>    
            </tr>
            <tr>
                <td style="font-size:18px;">Client :<?php echo Bqcus::model()->findByPk($cus_id)->resnam; ?><br/></td>
            </tr>
            <tr>    
                <td style="font-size:18px;">Deposit Bank:<?php echo Bqcus::model()->findByPk(Bqpla::model()->findByPk($allfd_id)->ban)->resnam; ?></td>             
              
            </tr>
            <tr>
                <td style="font-size:18px;"><br>Amount Requested: <?php echo $entry->amo;  ?></td>
            </tr>
            <tr>
            
            <td style="font-size:18px;">
                Rate : <?php echo $entry->prat." %" ; ?><br/>
                </tr>
            <tr>
                <td style="font-size:18px;">
               <br/> Date of request : <?php echo date('d/m/Y', strtotime($entry->dou)); ?>
                </td>
        </tr>
    </table>
</div>