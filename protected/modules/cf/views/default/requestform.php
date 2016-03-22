<div border='1'>
   <?php // echo $ratetype= RateTypes::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqcb::model()->findByPk($allcb_id)->num)->quotation_id)->rt_name; ?>
    <br/>
    <?php  $entry= Bqcb::model()->findByPk($allcb_id); ?>
    <table border='0' width='100%' style="border-collapse: collapse;" align="center">	
        <tr>
            <td colspan="2" align="left">
               <?php echo strtoupper(Fdterms::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqcb::model()->findByPk($allcb_id)->num)->term_id)->term_name); ?> Request For <?php echo $ratetype;   ?>
  <br><hr> 
  
            </td>    
            </tr>
            <tr>
                <td>Client :<?php echo Bqcus::model()->findByPk($cus_id)->resnam; ?><br/></td>
                
                <td>Lending Bank:<?php echo Bqcus::model()->findByPk(Bqcb::model()->findByPk($allcb_id)->lban)->resnam; ?></td>             
              
            </tr>
            <tr>
                <td><br>Amount Requested: <?php echo $entry->amo;  ?></td>
            
            
            <td colspan="2">
                Rate : <i><?php echo $entry->lrat." %" ; ?></i><br/><br/>
                </tr>
            <tr>
                <td>
               <br/> Date of request : <i><?php echo date('d/m/Y', strtotime($entry->dou)); ?></i>
                </td>
                <td>
            </td>       
        </tr>
    </table>
</div>