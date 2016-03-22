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
                'actions' => array('view', 'create', 'configuration'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'index', 'edit', 'business', 'investcontact',
                    'accept', 'reject', 'complete', 'submitrequest', 'invest'),
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
        $cfrecords = Cominvest::model()->findAll('valid=:x or exec_sum_valid!=:y', array(':x' => 1, ':y' => ''));
        $this->render('index', array('cfrecords' => $cfrecords));
    }

    public function actionBusiness() {
        $terms = Fdterms::model()->findAll();
        $rates = RateTypes::model()->findAll();
        $user = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
        $userid = current($user)->id;
        $cfrecords = Cominvest::model()->findAll('company_id=:x', array(':x' => $userid));

        $this->render('business', array('cfrecords' => $cfrecords, 'terms' => $terms, 'rates' => $rates, 'userid' => $userid));
    }

    public function actionAccept() {
        try {
            $model = Bqcf::model()->findByPk($_GET['id']);
            $model->proc = 4;
            $model->sta = 'VA';
            $model->dmo = date('Y-m-d H:i:s');
            if ($model->update()) {
                $model1 = new Bqdcf;
                $model1->cf_id = $model->cdos;
            }
            $model1->attributes = $model->attributes;
            if ($model->proc == 4)
                $model1->remark = "Your interest to invest has gladly been accepted. Please see the project owner to complete this transaction. ";
            $model1->proc = 4;
            //        $model1->discount = $_GET['discount'];
            $model1->sta = 'VA';
            //    $model1->valid = 1;
            $model1->dmo = $model1->dou = date('Y-m-d');

            if ($model1->save()) {
                echo 'true';
            } else {
                echo 'false1';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionReject() {
        try {
            $model = Bqcf::model()->findByPk($_GET['id']);
            $model->proc = 8;
            $model->sta = 'VA';
            $model->dmo = date('Y-m-d H:i:s');
            if ($model->update()) {
                $model1 = new Bqdcf;
                $model1->cf_id = $model->cdos;
            }
            $model1->attributes = $model->attributes;
            if ($model->proc == 8)
                $model1->remark = "Your interest to invest has been noted";
            $model1->proc = 8;
            //        $model1->discount = $_GET['discount'];
            $model1->sta = 'VA';
            //        $model1->valid = 1;
            $model1->dmo = $model1->dou = date('Y-m-d');

            if ($model1->save()) {
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
            $model = Bqdcf::model()->findByPk($_GET['id']);
            $model->proc = 9;
            $model->sta = 'VA';
            $model->dmo = date('Y-m-d H:i:s');
            if ($model->update()) {
                $model1 = new Bqdsec;
                $model1->cf_id = $model->cdos;
            }
            $model1->attributes = $model->attributes;
            if ($model->proc == 9)
                $model1->remark = "Transaction completed";
            $model1->proc = 9;
            //          $model1->discount = $_GET['discount'];
            $model1->sta = 'VA';
            //    $model1->valid = 1;
            $model1->dmo = $model1->dou = date('Y-m-d');

            if ($model1->save()) {
                echo 'true';
            } else {
                echo 'false1';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionSubmitrequest() {
        try {
            $model = new Cominvest;

            $_POST['Cominvest']['company_id'] = $_GET['id'];
            $_POST['Cominvest']['investment_type'] = $_GET['investtype'];
            $_POST['Cominvest']['investment_need'] = $_GET['amount'];
            $_POST['Cominvest']['executive_summary'] = $_GET['execsum'];
            $_POST['Cominvest']['project_name'] = $_GET['projname'];
            $user = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
            foreach ($user as $uti)
                ;
            $_POST['Cominvest']['user'] = $uti->id;
            $_POST['Cominvest']['cdate'] = date('Y-m-d');
            if (isset($_POST['Cominvest'])) {
                $model->attributes = $_POST['Cominvest'];
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
    }

    public function actionInvest() {
        try {
            
            
            if($_GET['contactid']){
                $contact=  Bqcfcontact::model()->findByPk($_GET['contactid']);
                $contact->valid=1;
                $contact->save();
            }
            $model = new Bqcf;
            $_POST['Bqcf']['num'] = $_GET['id'];

            $_POST['Bqcf']['cus'] = $_GET['user'];

            $_POST['Bqcf']['amo'] = $_GET['amount'];
            if($_GET['contactid']){
                         $_POST['Bqcf']['valid'] = 1;   
            }

            $user = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
            foreach ($user as $uti)
                ;
            $_POST['Bqcf']['uti'] = $uti->id;
            $_POST['Bqcf']['dou'] = $_POST['Bqcf']['dmo'] = date('Y-m-d');
            if (isset($_POST['Bqcf'])) {
                $model->attributes = $_POST['Bqcf'];
                $model->proc = 0;
                $model->sta = 'SI';
                if ($model->save()) {

                    $model1 = new Bqdcf;
                    $model1->attributes = $model->attributes;
                    $model1->cf_id = $model->cdos;
                    $model1->proc = 0;
                    $model1->sta = 'SI';
                    $model1->dmo = $model1->dou = date('Y-m-d');
                    if ($model1->save())
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

    public function actionInvestcontact() {// contact of interest
        try {
            $model = new Bqcfcontact;

            $_POST['Bqcfcontact']['num'] = $_GET['id'];

            $_POST['Bqcfcontact']['cus'] = $_GET['user'];

            $_POST['Bqcfcontact']['message'] = $_GET['msg'];
            $_POST['Bqcfcontact']['inv_name'] = $_GET['name'];
            $_POST['Bqcfcontact']['inv_email'] = $_GET['email'];
            $_POST['Bqcfcontact']['inv_tel'] = $_GET['tel'];
            $_POST['Bqcfcontact']['inv_address'] = $_GET['address'];
            $user = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
            foreach ($user as $uti)
                ;
            $_POST['Bqcfcontact']['uti'] = $uti->id;
            $_POST['Bqcfcontact']['dou'] = $_POST['Bqcfcontact']['dmo'] = date('Y-m-d');
            if (isset($_POST['Bqcfcontact'])) {
                $model->attributes = $_POST['Bqcfcontact'];
                $model->proc = 0;
                $model->sta = 'SI';
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
    }

}