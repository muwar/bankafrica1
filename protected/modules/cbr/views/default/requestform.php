<div border='1'>
    <?php  $entry= Bqcb::model()->findByPk($allcb_id); ?>
    <table border='0' width='100%' style="border-collapse: collapse;" align="center">	
        <tr>
            <td align="center" style="font-size:18px;">
   <?php  echo $ratetype= RateTypes::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqcb::model()->findByPk($allcb_id)->num)->quotation_id)->rt_name; ?>:
                
               <?php echo strtoupper(Fdterms::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqcb::model()->findByPk($allcb_id)->num)->term_id)->term_name); ?> Request <!--For <?php // echo $ratetype;   ?> -->
  <br><hr> 
  
            </td>    
            </tr>
            <tr>
                <td style="font-size:18px;">Client :<?php echo Bqcus::model()->findByPk($cus_id)->resnam; ?><br/></td>
              </tr>
            <tr>   
                <td style="font-size:18px;">Lending Bank:<?php echo Bqcus::model()->findByPk(Bqcb::model()->findByPk($allcb_id)->lban)->resnam; ?></td>             
              
            </tr>
            <tr>
                <td style="font-size:18px;"><br>Amount Requested: <?php echo $entry->amo;  ?></td>
             </tr>
            <tr>
            
            <td style="font-size:18px;">
                Rate : <?php echo $entry->lrat." %" ; ?><br/><br/>
                </tr>
            <tr>
                <td style="font-size:18px;">
               <br/> Date of request : <?php echo date('d/m/Y', strtotime($entry->dou)); ?>
                </td>
                       
        </tr>
    </table>
</div>