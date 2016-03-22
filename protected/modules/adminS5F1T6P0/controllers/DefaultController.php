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
                'actions' => array('create', 'update', 'index', 'edit', 'business'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'users','sendalert'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $comrecords = Cominvest::model()->findAll();
        $cfrecords = Bqcf::model()->findAll();
        $cfcontacts = Bqcfcontact::model()->findAll();
        $secrecords = SecurityList::model()->findAll();
        $hsec = Bqhsec::model()->findAll();
        $hseccontacts = Bqhseccontact::model()->findAll();
        $this->render('index', array('comrecords' => $comrecords, 'hseccontacts' => $hseccontacts, 'cfcontacts' => $cfcontacts, 'hsecrecords' => $hsec, 'secrecords' => $secrecords, 'cfrecords' => $cfrecords));
    }

    public function actionUsers() {
        $this->render('users');
    }

    public function actionTransactions() {
        $this->render('transactions');
    }

    public function actionsendalert() {
        try {
            if ($_GET['op'] == 'CF') {
                $model = Bqcfcontact::model()->findByPk($_GET['opid']);
                $projectname = Cominvest::model()->findByPk($model->num)->project_name;
                if ($model->inv_email == '') {
                    $email = current(Bqcus::model()->findAll('cus=:x', array(':x' => $model->cus)))->email;
                } else {
                    $email = $model->inv_email;
                }
                if ($_GET['usertype'] == 'owner') {
                    $model->alert_owner = 1;
                    $model->alert_owner_mail = $_GET['msg'];
                    mail($email, 'AfricapitalQuote:A sponsor for your project(' . $projectname . ')', $_GET['msg']);
                } else if ($_GET['usertype'] == 'investor') {
                    $model->alert_investor = 1;
                    $model->alert_investor_mail = $_GET['msg'];
                    mail($email, 'AfricapitalQuote: ' . $projectname . ' investment', $_GET['msg']);
                }
            } else if ($_GET['op'] == 'SEC') {
                $model = Bqhseccontact::model()->findByPk($_GET['opid']);
                $security=  SecurityList::model()->findByPk($model->ref)->name;
                if ($model->buy_email == '') {
                    $email = current(Bqcus::model()->findAll('cus=:x', array(':x' => $model->cus)))->email;
                } else {
                    $email = $model->buy_email;
                }
                if ($_GET['usertype'] == 'owner') {
                    $model->alert_owner = 1;
                    $model->alert_owner_mail = $_GET['msg'];
                    mail($email, 'AfricapitalQuote: Interest in your security(' . $security . ')', $_GET['msg']);
                                    
                } else if ($_GET['usertype'] == 'investor') {
                    $model->alert_investor = 1;
                    $model->alert_investor_mail = $_GET['msg'];
                     mail($email, 'AfricapitalQuote: Purchasing ' . $security , $_GET['msg']);
                }
            }

            if ($model->update())
                echo 'true';
            else {
                echo 'false';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionManageusers() {

        try {

            $model = Evuti::model()->findByPk($_GET['id']);

            $model->user_status = $_GET['statevalue'];
            if ($model->update())
                echo 'true';
            else {
                echo 'false';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionShowit() {

        try {

            $model = Cominvest::model()->findByPk($_GET['id']);

            $model->valid = 1;
            if ($model->update())
                echo 'true';
            else {
                echo 'false';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionPermitsec() {

        try {

            $model = Bqhsec::model()->findByPk($_GET['id']);

            $model->valid = 1;
            if ($model->update())
                echo 'true';
            else {
                echo 'false';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionPermitcf() {

        try {

            $model = Bqcf::model()->findByPk($_GET['id']);

            $model->valid = 1;
            if ($model->update())
                echo 'true';
            else {
                echo 'false';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionHideit() {

        try {

            $model = Cominvest::model()->findByPk($_GET['id']);

            $model->valid = 0;
            if ($model->update())
                echo 'true';
            else {
                echo 'false';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionShowitsec() {

        try {

            $model = SecurityList::model()->findByPk($_GET['id']);

            $model->valid = 1;
            if ($model->update())
                echo 'true';
            else {
                echo 'false';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionHideitsec() {

        try {

            $model = SecurityList::model()->findByPk($_GET['id']);

            $model->valid = 0;
            if ($model->update())
                echo 'true';
            else {
                echo 'false';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionSecupdate() {
        try {
            $model = SecurityList::model()->findByPk($_GET['id']);
            $_POST['SecurityList']['issuer'] = $_GET['issuer'];
            $_POST['SecurityList']['facevalue'] = $_GET['facevalue'];
            $_POST['SecurityList']['discount'] = $_GET['discount'];
            $_POST['SecurityList']['valid'] = 1;

            if (isset($_POST['SecurityList'])) {
                $model->attributes = $_POST['SecurityList'];
                //    var_dump($model->attributes);

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

    public function actionProjupdate() {
        try {
            $model = Cominvest::model()->findByPk($_GET['idd']);
            $_POST['Cominvest']['investment_need'] = $_GET['need'];
            $_POST['Cominvest']['exec_sum_valid'] = $_GET['sum'];
            $_POST['Cominvest']['project_name'] = $_GET['proj'];
            $_POST['Cominvest']['valid'] = 1;

            if (isset($_POST['Cominvest'])) {
                $model->attributes = $_POST['Cominvest'];
                $model->exec_sum_valid = $_GET['sum'];
                if ($model->save()) {
                    echo 'true';
                } else {
                    var_dump($model->attributes); //echo 'false1';
                }
            } else {
                echo 'false2';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionRates() {
        $rates = RateTypes::model()->findAll();
        $terms = Terms::model()->findall();

        $this->render('rates', array('rates' => $rates, 'terms' => $terms));
    }

    public function actionTellme($id, $catid) {

        if (isset($_GET)) {
            //echo json_encode($_GET['price']);
            echo $_GET['id'];
            echo $_GET['catid'];
            echo $_GET['price'];
            echo $_GET['wat'];
        } else {
            echo "things are bad";
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionAddrate() {
        try {
            $model = new RateTypes;

            $_POST['RateTypes']['rt_name'] = $_GET['typename'];
            if (isset($_POST['RateTypes'])) {
                $model->attributes = $_POST['RateTypes'];
                if ($model->save()) {//$model->save()
                    //echo $_POST['ProposedSites']['added_on'];//
                    echo 'true';
                    //$this->redirect(array('view','id'=>$model->id));                            
                } else {
                    echo 'false';
                }
            } else {
                echo 'false';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
        //$this->render('create',array(
        //	'model'=>$model,
        //));
    }

    public function actionAddterm() {
        try {
            $model = new Terms;

            $_POST['Terms']['term_name'] = $_GET['termname'];
            $_POST['Terms']['term_duration'] = $_GET['dterm'];

            if (isset($_POST['Terms'])) {
                $model->attributes = $_POST['Terms'];
                if ($model->save()) {//$model->save()
                    //echo $_POST['ProposedSites']['added_on'];//
                    echo 'true';
                    //$this->redirect(array('view','id'=>$model->id));                            
                } else {
                    echo 'false';
                }
            } else {
                echo 'false';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
        //$this->render('create',array(
        //	'model'=>$model,
        //));
    }

}