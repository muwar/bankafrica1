<div border='1'>

    <?php  $entry= Bqibl::model()->findByPk($allbl_id); ?>
    <table border='0' width='100%' style="border-collapse: collapse;" align="center">	
        <tr>
            <td>
       <?php  echo $ratetype= RateTypes::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqibl::model()->findByPk($allbl_id)->num)->quotation_id)->rt_name; ?>:
             <?php echo strtoupper(Terms::model()->findByPk(InstitutionsQuotation::model()->findByPk(Bqibl::model()->findByPk($allbl_id)->num)->term_id)->term_name); ?> Approved For <?php echo $ratetype;   ?>
  <br><hr> 
  
            </td>    
            </tr>
            <tr>
                <?php if($ratetype=="Inter-Bank Lending"){  ?>
                 <td>Lender: <?php echo Bqcus::model()->findByPk(Bqibl::model()->findByPk($allbl_id)->target)->resnam; ?><br/></td>
               
            <td>Borrower:<?php echo Bqcus::model()->findByPk($cus_id)->resnam; ?></td>
                <?php  } 
                else{  ?>
                <td>Lender:<?php echo Bqcus::model()->findByPk($cus_id)->resnam; ?><br/></td>
               
                <td>Borrower: <?php echo Bqcus::model()->findByPk(Bqibl::model()->findByPk($allbl_id)->target)->resnam; ?></td>             
                <?php  } ?>
            </tr>
            <tr>
                <td><br/>Amount: <?php echo $entry->amo;  ?></td>
            
            <td><br/>
                Rate: <?php echo $entry->brat." %" ; ?><br/>
                </tr>
            <tr>
                <td><br/>
                Value Date: <?php echo date('d/m/Y', strtotime($entry->vdate)); ?>
                </td>
                
                <td><br/>
                Expiry Date: <?php echo date('d/m/Y',  strtotime($entry->edate)); ?><br/>
            </td>       
        </tr>
        <tr>
            <td><br/>
                Date of Request: <?php echo date('d/m/Y',  strtotime( $entry->dou));  ?></td>
            
            <td><br/>
                Approval Date: <?php   echo date('d/m/Y', strtotime(current(Bqdibl::model()->findAll('ibl_id=:x and proc=:z',array(':x'=>$allbl_id,':z'=>4)))->dou));   ?></td>
        </tr>
    </table>
</div>