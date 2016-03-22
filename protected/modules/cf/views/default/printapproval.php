<div border='1'>
<!--   <h2>Request form for 
       <?php  echo $ratetype= RateTypes::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqcb::model()->findByPk($allcb_id)->num)->quotation_id)->rt_name; ?></h2>
-->
    <br/>
    <?php  $entry= Bqcb::model()->findByPk($allcb_id); ?>
    <table border='0' width='100%' style="border-collapse: collapse;" align="center">	
        <tr>
            <td colspan="2" align="left">
             <?php echo strtoupper(Fdterms::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqcb::model()->findByPk($allcb_id)->num)->term_id)->term_name); ?>Loan Approved For <?php echo $ratetype;   ?>
  <br><hr> 
  
            </td>    
            </tr>
            <tr>
                <td>Customer :<?php echo Bqcus::model()->findByPk($cus_id)->resnam; ?><br/></td>
                
                <td>Deposit Bank:<?php echo Bqcus::model()->findByPk(Bqcb::model()->findByPk($allcb_id)->lban)->resnam; ?></td>             
              
            </tr>
            <tr>
                <td><br>Amount: <?php echo $entry->amo;  ?></td>
            
            
            <td colspan="2">
                Rate : <i><?php echo $entry->lrat." %" ; ?></i><br/><br/>
                </tr>
          
        <tr>
            <td><br/>Date of Request: <?php echo date('d/m/Y',  strtotime( $entry->dou));  ?></td>
            <td><br/>Approval Date: <?php   echo date('d/m/Y', strtotime(current(Bqdibl::model()->findAll('ibl_id=:x and proc=:z',array(':x'=>$allcb_id,':z'=>4)))->dou));   ?></td>
        </tr>
    </table>
</div>