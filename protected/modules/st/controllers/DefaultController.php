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
                'actions' => array('create', 'update', 'index', 'seccontact', 'edit', 'business',
                    'accept', 'reject', 'complete', 'buysec', 'submitrequest'),
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
        $model = new Bqhsec;
        $secrecords = SecurityList::model()->findAll('valid=:x and qty!=:y', array(':x' => 1,':y'=>0));
        $this->render('index', array('model' => $model, 'secrecords' => $secrecords));
    }

    public function actionBusiness() {
        $model = new Bqhsec;
        $terms = Fdterms::model()->findAll();
        $rates = RateTypes::model()->findAll();
        $user = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
        $userid = current($user)->id;
        $myreqsecs = Bqhsec::model()->findAll('cus=:x ORDER BY dou DESC', array(':x' => $userid));
        $securitylists = SecurityList::model()->findAll('owner=:x', array(':x' => $userid));
      
        
        $creqsecs = array();
        if (count($securitylists) == 0) {
            ;
        } else {
            foreach ($securitylists as $seclist) {
                $creqsec = Bqhsec::model()->findAll('ref=:x and valid=:y', array(':y' => 1, ':x' => $seclist->id));
                if(count($creqsec)>0)
                foreach ($creqsec as $creq) {
                    array_push($creqsecs, $creq);
                    
                }
            }
        }
$this->render('business', array('model' => $model, 'creqsecs' => $creqsecs, 'myreqsecs' => $myreqsecs, 'terms' => $terms, 'rates' => $rates, 'userid' => $userid));
    }

    public function actionAccept() {
        try {
            $model = Bqhsec::model()->findByPk($_GET['id']);
            $model->proc = 4;
            $model->sta = 'VA';
            $model->dmo = date('Y-m-d H:i:s');
            if ($model->update()) {
                $model1 = new Bqdsec;
                $model1->refsec_id = $model->cdos;
            }
            $model1->attributes = $model->attributes;
            if ($model->proc == 4)
                $model1->remark = "Your security purchase request has been accepted. Please see the owner to complete this transaction. ";
            $model1->proc = 4;
            $model1->discount = $_GET['discount'];
            $model1->sta = 'VA';
            $model1->valid = 1;
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
            $model = Bqhsec::model()->findByPk($_GET['id']);
            $model->proc = 8;
            $model->sta = 'VA';
            $model->dmo = date('Y-m-d H:i:s');
            if ($model->update()) {
                $model1 = new Bqdsec;
                $model1->refsec_id = $model->cdos;
            }
            $model1->attributes = $model->attributes;
            if ($model->proc == 8)
                $model1->remark = "Your security purchase request has been Rejected";
            $model1->proc = 8;
            $model1->discount = $_GET['discount'];
            $model1->sta = 'VA';
            $model1->valid = 1;
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
            $model = Bqhsec::model()->findByPk($_GET['id']);
            $model->proc = 9;
            $model->sta = 'VA';
            $model->dmo = date('Y-m-d H:i:s');
            if ($model->update()) {
                $model1 = new Bqdsec;
                $model1->refsec_id = $model->cdos;
            }
            $model1->attributes = $model->attributes;
            if ($model->proc == 9)
                $model1->remark = "Transaction completed";
            $model1->proc = 9;
            $model1->discount = $_GET['discount'];
            $model1->sta = 'VA';
            $model1->valid = 1;
            $model1->dmo = $model1->dou = date('Y-m-d');
            
            $security=  SecurityList::model()->findByPk($model->ref);
            $security->qty-=1;
            $security->save();
            
            if ($model1->save()) {
                echo 'true';
            } else {
                echo 'false1';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionBuysec() {
        try {
            $model = new Bqhsec;

            $_POST['Bqhsec']['ref'] = $_GET['id'];
            $_POST['Bqhsec']['cus'] = $_GET['user'];
            $_POST['Bqhsec']['discount'] = $_GET['discount'];
            $_POST['Bqhsec']['qty'] = $_GET['qty'];
            
            $_POST['Bqhsec']['valid'] = 1;
            $uti = current(Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name)));
            $_POST['Bqhsec']['uti'] = $uti->id;
            $_POST['Bqhsec']['dou'] = $_POST['Bqhsec']['dmo'] = date('Y-m-d');
            if (isset($_POST['Bqhsec'])) {
                $model->attributes = $_POST['Bqhsec'];
                $model->proc = 0;
                $model->discount = $_GET['discount'];
                $model->sta = 'SI';
                $model->valid = 1;
                if ($model->save()) {
                    $model1 = new Bqdsec;
                    //      $model1->attributes=$model->attributes;
                    $model1->refsec_id = $model->cdos;
                    $model1->proc = 0;
                    $model1->discount = $_GET['discount'];
                    $model1->sta = 'SI';
                    $model1->valid = 0;
                    $model1->dmo = $model1->dou = date('Y-m-d');
                    if ($model1->save()) {

                        if ($_GET['contactid']) {
                            $contact = Bqhseccontact::model()->findByPk($_GET['contactid']);
                            $contact->valid = 1;
                            $contact->save();
                        }
                        echo 'true';
                    } else {
                        var_dump($model->attributes);
                    }
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

    public function actionseccontact() {
        try {
            $model = new Bqhseccontact;

            $_POST['Bqhseccontact']['ref'] = $_GET['id'];

            $_POST['Bqhseccontact']['cus'] = $_GET['user'];

            $_POST['Bqcfcontact']['message'] = $_GET['msg'];
            $_POST['Bqcfcontact']['buy_name'] = $_GET['name'];
            $_POST['Bqcfcontact']['buy_email'] = $_GET['email'];
            $_POST['Bqcfcontact']['buy_tel'] = $_GET['tel'];
            $_POST['Bqcfcontact']['_address'] = $_GET['address'];

            $user = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
            foreach ($user as $uti)
                ;
            $_POST['Bqhseccontact']['uti'] = $uti->id;
            $_POST['Bqhseccontact']['dou'] = $_POST['Bqhseccontact']['dmo'] = date('Y-m-d');
            if (isset($_POST['Bqhseccontact'])) {
                $model->attributes = $_POST['Bqhseccontact'];
                $model->messsage = $_GET['msg'];
                $model->buy_address = $_GET['address'];
                $model->buy_tel = $_GET['tel'];
                $model->buy_email = $_GET['email'];
                $model->buy_name = $_GET['name'];

                if ($model->save()) {
                    echo 'true';
                } else {
                    var_dump($model->attributes);
                }
            } else {
                var_dump($model->attributes); //echo 'false1';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    public function actionSubmitrequest() {
        try {
            $model = new SecurityList;
            $_POST['SecurityList']['owner'] = $_GET['id'];
            $_POST['SecurityList']['issuer'] = $_GET['issuer'];
            $_POST['SecurityList']['issuedate'] = $_GET['issuedate'];
            $_POST['SecurityList']['sectype'] = $_GET['sectype'];

            $_POST['SecurityList']['discount'] = $_GET['discount'];
            $_POST['SecurityList']['facevalue'] = $_GET['facevalue'];
            $_POST['SecurityList']['matdate'] = $_GET['matdate'];

            $_POST['SecurityList']['cdate'] = date('Y-m-d');
            if (isset($_POST['SecurityList'])) {
                $model->attributes = $_POST['SecurityList'];
                $model->issuedate = $_POST['SecurityList']['issuedate'];
                $model->matdate = $_POST['SecurityList']['matdate'];
                $model->cdate = date('Y-m-d');
                $model->name = $_GET['namme'];
                $model->biddable = $_GET['biddable'];
                $model->currency = $_GET['currency'];
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