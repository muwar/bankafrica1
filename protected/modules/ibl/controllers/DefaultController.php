<?php
class DefaultController extends Controller {

     /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
    
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array( 'view', 'create', 'configuration'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','index', 'edit','business','lpropose','bpropose',
                    'printrequest','printapproval','printhistory','export','addrate','customercontact'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionIndex($url=null) {
//        Yii::app()->user->loginRequired();
    
        $terms = Terms::model()->findAll();
        $model=  new Bqibl;
        //       $bankrates=  InstitutionsQuotation::model()->findAll();
        $this->render('index', array('model'=>$model,'terms' => $terms, /* 'bankrates'=>$bankrates */));
    }
    public function actionAddrate() {
        try {
            $model = new InstitutionsQuotation;
// echo $_GET['scharges'];exit;

            $_POST['InstitutionsQuotation']['institution_id'] = $_GET['institution'];
            $_POST['InstitutionsQuotation']['quotation_id'] = $_GET['rateT'];
            $_POST['InstitutionsQuotation']['lrate'] = $_GET['rate'];
            //     $_POST['InstitutionsQuotation']['brate'] = $_GET['brate'];
            $_POST['InstitutionsQuotation']['special_rate'] = $_GET['specialrates'];
            $_POST['InstitutionsQuotation']['term_id'] = $_GET['term'];
            $_POST['InstitutionsQuotation']['minimum_amount'] = $_GET['minamount'];
            $_POST['InstitutionsQuotation']['setup_charges'] = $_GET['scharges'];
            $_POST['InstitutionsQuotation']['other_fees'] = $_GET['ofees'];
            $_POST['InstitutionsQuotation']['date_set'] = date('Y-m-d');
            $_POST['InstitutionsQuotation']['time_set'] = date('h:i:s');
  //          $_POST['InstitutionsQuotation']['institutions_quotation_id'] = 1;

            if (isset($_POST['InstitutionsQuotation'])) {
                $model->attributes = $_POST['InstitutionsQuotation'];
                if ($model->save()) {
                    echo 'true';
                } else {
                    var_dump($model->attributes) ;//echo 'false1';
                }
            } else {
                echo 'false2';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
        //$this->render('create',array(
        //	'model'=>$model,
        //));
    }
        public function actionCustomercontact() {
        try {
            $model = new Bqdibl;
            $model->sta='VA';
            $model->proc=10;
            $model->ibl_id=$_GET['ibl_id'];
            $model->cus=$_GET['cus'];
            $model->dou=date('Y-m-d');
$model->dmo=date('Y-m-d');

$model1=Bqibl::model()->findByPk($_GET['ibl_id']);
$model1->proc=10;
$model1->sta='VA';
$model1->dmo=date('Y-m-d');
$model1->save();         
                if ($model->save()) {
                    echo 'true';
                } else {
                    var_dump($model->attributes) ;//echo 'false1';
                }
           

        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
        //$this->render('create',array(
        //  'model'=>$model,
        //));
    }

    public function actionLpropose() {
        try {
            $model = new Bqibl;

            $_POST['Bqibl']['target'] = $_GET['llbank'];
            $_POST['Bqibl']['bban'] = $_GET['lbbank'];

            $_POST['Bqibl']['num'] = $_GET['rate'];

            $_POST['Bqibl']['amo'] = $_GET['lamount'];
            $_POST['Bqibl']['brat'] = $_GET['lprate'];
            $_POST['Bqibl']['vdate'] = $_GET['lvdate'];
            $_POST['Bqibl']['edate'] = $_GET['ledate'];
            
            $user = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
            foreach ($user as $uti)
                ;
            $_POST['Bqibl']['cus']=$uti->id;
            $_POST['Bqibl']['uti'] = $uti->id;
            $_POST['Bqibl']['utimo'] = $uti->id;
            $_POST['Bqibl']['dou'] = date('Y-m-d H:i:s');
            $_POST['Bqibl']['dmo'] = date('Y-m-d H:i:s');
            $_POST['Bqibl']['proc'] = 0;
            $_POST['Bqibl']['sta'] = 'SI';


            if (isset($_POST['Bqibl'])) {
                $model->attributes = $_POST['Bqibl'];
                if ($model->save()) {
                    $model1=  new Bqdibl;
                    $model1->attributes=$_POST['Bqibl'];
                    $model1->ibl_id=$model->cdos;
                    $model1->rate=$_GET['lprate'];
                    $model1->save();
                    echo 'true';
                } else {
                  echo 'false1';
                }
            } else {
                echo 'false2';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }
    public function actionBusiness(){
                $terms = Terms::model()->findAll();
        $rates = RateTypes::model()->findAll();

        $this->render('business', array('terms' => $terms, 'rates' => $rates));
    }
    public function actionBpropose() {
        try {
            $model = new Bqibl;

            $_POST['Bqibl']['bban'] = $_GET['blbank'];
            $_POST['Bqibl']['target'] = $_GET['bbbank'];

            $_POST['Bqibl']['num'] = $_GET['rate'];

            $_POST['Bqibl']['amo'] = $_GET['bamount'];
            $_POST['Bqibl']['brat'] = $_GET['bprate'];
                        $_POST['Bqibl']['vdate'] = $_GET['bvdate'];
            $_POST['Bqibl']['edate'] = $_GET['bedate'];

            $user = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
            foreach ($user as $uti)
                ;
            $_POST['Bqibl']['cus'] = $uti->id;
            $_POST['Bqibl']['uti'] = $uti->id;
            $_POST['Bqibl']['utimo'] = $uti->id;
            $_POST['Bqibl']['dou'] = date('Y-m-d H:i:s');
            $_POST['Bqibl']['dmo'] = date('Y-m-d H:i:s');
            $_POST['Bqibl']['proc'] = 0;
            $_POST['Bqibl']['sta'] = 'SI';


            if (isset($_POST['Bqibl'])) {
                $model->attributes = $_POST['Bqibl'];
                if ($model->save()) {
                    $model1=  new Bqdibl;
                    $model1->attributes=$_POST['Bqibl'];
                    $model1->ibl_id=$model->cdos;
                    $model1->proc=0;
                    $model1->sta='SI';
                    $model1->dou = date('Y-m-d h:i:s');
                    $model1->save();

                    echo 'true';
                } else {
                    var_dump($model->attributes) ;//echo 'false1';
                }
            } else {
                echo 'false2';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }
    public function actionPrintrequest($cus_id,$allbl_id){
        
     include("protected/vendors/mpdf/mpdf.php");
        //      $mPDF1 = Yii::app()->ePdf->mpdf('A7', 10, 0, '', 2, 2, 10, 10, 9, 9, 'L');
        //     $mPDF1 = Yii::app()->ePdf->mpdf('','A7',10,'',5,5,5,5,9,9,'A7-L');
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A6-L');
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/formstyle.css');
        $mPDF1->WriteHTML($stylesheet, 1);
        $mPDF1->SetWatermarkText('SFT Platform'); // Will cope with UTF-8 encoded text
        $mPDF1->watermark_font = 'DejaVuSansCondensed'; // Uses default font if left blank
        $mPDF1->showWatermarkText = true;
  
        $mPDF1->WriteHTML($this->renderPartial('requestform', array('cus_id' => $cus_id, 'allbl_id' => $allbl_id), true));
          $mPDF1->SetHTMLFooter('<p align="center" style="font-size:10px;"><h6>' .'Standard Financials Trading Platform'. date('d/m/Y H:i:sa'));
       
        $mPDF1->Output(' Request form.pdf', 'I');    
    }
    public function actionPrintapproval($cus_id,$allbl_id){
        
     include("protected/vendors/mpdf/mpdf.php");
        //      $mPDF1 = Yii::app()->ePdf->mpdf('A7', 10, 0, '', 2, 2, 10, 10, 9, 9, 'L');
        //     $mPDF1 = Yii::app()->ePdf->mpdf('','A7',10,'',5,5,5,5,9,9,'A7-L');
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A6-L');
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/formstyle.css');
        $mPDF1->WriteHTML($stylesheet, 1);
  $mPDF1->SetWatermarkText('SFT Platform'); // Will cope with UTF-8 encoded text
        $mPDF1->watermark_font = 'DejaVuSansCondensed'; // Uses default font if left blank
        $mPDF1->showWatermarkText = true;
      
        $mPDF1->WriteHTML($this->renderPartial('printapproval', array('cus_id' => $cus_id, 'allbl_id' => $allbl_id), true));
         $mPDF1->SetHTMLFooter('<p align="center" style="font-size:10px;"><h6>' .'Standard Financials Trading Platform   '. date('d/m/Y H:i:sa'));
       
        $mPDF1->Output(' Request form.pdf', 'I');    
    }
    public function actionPrinthistory($id,$mid){
        
     include("protected/vendors/mpdf/mpdf.php");
        //      $mPDF1 = Yii::app()->ePdf->mpdf('A7', 10, 0, '', 2, 2, 10, 10, 9, 9, 'L');
        //     $mPDF1 = Yii::app()->ePdf->mpdf('','A7',10,'',5,5,5,5,9,9,'A7-L');
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A5-L');
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/formstyle.css');
        $mPDF1->WriteHTML($stylesheet, 1);
        $mPDF1->SetWatermarkText('SFT Platform'); // Will cope with UTF-8 encoded text
        $mPDF1->watermark_font = 'DejaVuSansCondensed'; // Uses default font if left blank
        $mPDF1->showWatermarkText = true;
  
        $mPDF1->WriteHTML($this->renderPartial('printhistory', array('id' => $id,'mid'=>$mid), true));
           $mPDF1->SetHTMLFooter('<p align="center" style="font-size:10px;"><h6>' .'Standard Financials Trading Platform   '. date('d/m/Y H:i:sa'));
        $mPDF1->Output(' Transaction history page.pdf', 'I');    
    }
    public function actionExport(){
        
    } 
    }