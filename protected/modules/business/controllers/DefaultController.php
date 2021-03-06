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
                'actions' => array('create', 'update','index', 'edit','business',
                    'rates','reject','modify','accept','approve','vieweffect','complete','addrate',),
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
    public function actionIndex() {
        $terms = Terms::model()->findAll();
        $rates = RateTypes::model()->findAll();

        $this->render('index', array('terms' => $terms, 'rates' => $rates));
    }
    public function actionRates() {
        $rates = RateTypes::model()->findAll();
        $terms = Terms::model()->findAll();
        $this->render('rates', array('rates' => $rates, 'terms' => $terms));
    }
    public function actionReject() {
        try {

            if ($_GET['op'] == 'IBL')
                $model = Bqibl::model()->findByPk($_GET['id']);
            if ($_GET['op'] == 'FD')
                $model = Bqfd::model()->findByPk($_GET['id']);

            $model->proc = 8;
            $model->sta = 'VA';
            $model->dmo = date('Y-m-d H:i:s');

            if ($model->update()) {
                if ($_GET['op'] == 'IBL') {
                    $model1 = new Bqdibl;
                    $model1->ibl_id = $model->cdos;
                    $model1->utimo = $model->target;
                }
                if ($_GET['op'] == 'FD') {
                    $model1 = new Bqdfd;
                    $model1->fd_id = $model->cdos;
                    $model1->utimo = $model->rban;
                }$model1->proc = 8;
                $model1->sta = 'VA';
                $model1->drej = date('Y-m-d h:i:s');
                $model1->dou = date('Y-m-d h:i:s');
                $model1->save();
                echo 'true';
            } else {
                echo 'false1';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }
    public function actionModify() {
        try {
            if ($_GET['op'] == 'IBL')
                $model = Bqibl::model()->findByPk($_GET['id']);
            if ($_GET['op'] == 'FD')
                $model = Bqfd::model()->findByPk($_GET['id']);

            if ($model->proc == 1)
                $model->proc = 2;
            else {
                if ($model->proc == 2)
                    $model->proc = 3;
                else {
                    $model->proc = 3;
                }
            }
            $model->dmo = date('Y-m-d H:i:s');

            $model->sta = 'VA';
            if ($model->update()) {

                if ($_GET['op'] == 'IBL') {
                    $model1 = new Bqdibl;
                    $model1->ibl_id = $model->cdos;
                    $model1->utimo = $model->target;
                }
                if ($_GET['op'] == 'FD') {
                    $model1 = new Bqdfd;
                    $model1->fd_id = $model->cdos;
                    $model1->utimo = $model->rban;
                }
                $model1->remark = $_GET['remark'];
                $model1->rate = $_GET['rate'];
                $model1->proc = $model->proc;
                $model1->sta = 'VA';
                $model1->dou = date('Y-m-d h:i:s');
                $model1->save();
                echo 'true';
            } else {
                echo 'false1';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }
    public function actionAccept() {
        try {
            if ($_GET['op'] == 'IBL')
                $model = Bqibl::model()->findByPk($_GET['id']);
            if ($_GET['op'] == 'FD')
                $model = Bqfd::model()->findByPk($_GET['id']);

            $model->proc = 4;
            $model->dmo = date('Y-m-d H:i:s');
            if ($model->update()) {

                if ($_GET['op'] == 'IBL') {
                    $model1 = new Bqdibl;
                    $model1->ibl_id = $model->cdos;
                    $model1->utimo = $model->target;
                }
                if ($_GET['op'] == 'FD') {
                    $model1 = new Bqdfd;
                    $model1->fd_id = $model->cdos;
                    $model1->utimo = $model->rban;
                }
                $model1->attributes = $model->attributes;
                if ($model->proc == 4)
                    $model1->remark = "Your quotation has been accepted. Please see the bank for the transaction ";
                $model1->dou = date('Y-m-d h:i:s');
                $model1->save();
                // Saving data for proc=5, transaction in process 
                if ($_GET['op'] == 'IBL')
                    $model2 = Bqibl::model()->findByPk($_GET['id']);
                if ($_GET['op'] == 'FD') {
                    $model2 = Bqfd::model()->findByPk($_GET['id']);
                }
                $model2->attributes = $model->attributes;
                $model2->proc = 5;
                $model2->dmo = date('Y-m-d H:i:s');
                if ($model2->update()) {
                    if ($_GET['op'] == 'IBL') {
                        $model3 = new Bqdibl;
                        $model3->ibl_id = $model->cdos;
                        $model3->utimo = $model->target;
                    }
                    if ($_GET['op'] == 'FD') {
                        $model3 = new Bqdfd;
                        $model3->fd_id = $model->cdos;
                        $model3->utimo = $model->rban;
                    }
                    $model3->attributes = $model->attributes;

                    $model3->proc = 5;
                    $model3->remark = "Transaction in process ";
                    if (jddayofweek(date('w') - 1, 2) == 'Fri') {
                        $date = new DateTime('+3 day');
                        $model3->dou = $date->format('Y-m-d H:i:s');
                    } else {
                        $date = new DateTime('+1 day');
                        $model3->dou = $date->format('Y-m-d H:i:s');
                    }
                    $model3->dou = date('Y-m-d h:i:s');
                    $model3->save();
                }
                echo 'true';
            } else {
                echo 'false1';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }
    public function actionApprove() {
        try {
            if ($_GET['op'] == 'IBL')
                $model = Bqibl::model()->findByPk($_GET['id']);
            if ($_GET['op'] == 'FD')
                $model = Bqfd::model()->findByPk($_GET['id']);

            $model->proc = 9;
            $model->dmo = date('Y-m-d H:i:s');
            $model->sta = 'VA';
            if ($model->update()) {
                if ($_GET['op'] == 'IBL') {
                    $model1 = new Bqdibl;
                    $model1->ibl_id = $model->cdos;
                    $model1->utimo = $model->target;
                }
                if ($_GET['op'] == 'FD') {
                    $model1 = new Bqdfd;
                    $model1->fd_id = $model->cdos;
                    $model1->utimo = $model->rban;
                }
                $model1->attributes = $model->attributes;
                $model1->dou = date('Y-m-d h:i:s');
                $model1->save();

                echo 'true';
            } else {
                echo 'false1';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }
    public function actionVieweffect() {
        try {

            if ($_GET['op'] == 'IBL')
                $model = Bqibl::model()->findByPk($_GET['id']);
            if ($_GET['op'] == 'FD')
                $model = Bqfd::model()->findByPk($_GET['id']);

            $model->proc = 1;
            $model->sta = 'VA';
            $model->dmo = date('Y-m-d H:i:s');
            if ($model->update()) {

                if ($_GET['op'] == 'IBL') {
                    $model1 = new Bqdibl;
                    $model1->ibl_id = $model->cdos;
                    $model1->utimo = $model->target;
                }
                if ($_GET['op'] == 'FD') {
                    $model1 = new Bqdfd;
                    $model1->fd_id = $model->cdos;
                    $model1->utimo = $model->rban;
                }
                $model1->cus = $model->cus;
                $model1->sta = $model->sta;
                $model1->proc = $model->proc;
                $model1->amount = $model->amo;

                $model1->dou = date('Y-m-d H:i:s');
                $model1->save();

                echo 'true';
            } else {
                echo 'false1';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }
    public function actionComplete() {
        try {
            if ($_GET['op'] == 'IBL')
                $model = Bqibl::model()->findByPk($_GET['id']);
            if ($_GET['op'] == 'FD')
                $model = Bqfd::model()->findByPk($_GET['id']);

            $model->proc = 9;
            $model->sta = 'VA';
            $model->dmo = date('Y-m-d H:i:s');
            if ($model->update()) {
                if ($_GET['op'] == 'IBL') {
                    $model1 = new Bqdibl;
                    $model1->ibl_id = $model->cdos;
                    $model1->utimo = $model->target;
                }
                if ($_GET['op'] == 'FD') {
                    $model1 = new Bqdfd;
                    $model1->fd_id = $model->cdos;
                    $model1->utimo = $model->rban;
                }
                $model1->cus = $model->cus;
                $model1->sta = $model->sta;
                $model1->proc = $model->proc;
                $model1->amount = $model->amo;
                $model1->remark = "Transaction successfully completed";
                $model1->dou = date('Y-m-d H:i:s');
                $model1->save();
                echo 'true';
            } else {
                echo 'false1';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
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
            $_POST['InstitutionsQuotation']['institutions_quotation_id'] = 1;

            if (isset($_POST['InstitutionsQuotation'])) {
                $model->attributes = $_POST['InstitutionsQuotation'];
                if ($model->save()) {
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
        //$this->render('create',array(
        //	'model'=>$model,
        //));
    }

}