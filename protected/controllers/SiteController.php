<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
// captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
// They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    public function actionSignup() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $model = new Users;
        $this->render('signup', array('model' => $model));
    }

    public function actionDisplaySavedImage() {
        $model = $this->loadModel($_GET['id']);
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
        header('Content-length: ' . $model->logo_filesize);
        header('Content-Type: ' . $model->logo_filetype);
        header('Content-Disposition: attachment; filename=' . $model->logo_filename);
        echo $model->logo_pic_data;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Users the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Institutions::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionProfile() {

        $this->render('profile', array('id' => $id, 'model' => $model, 'tmodel' => $tmodel));
    }

    public function actionupdatecustomer() {
        try {
            $model = Bqcus::model()->findByPk($_GET['cid']);
            $field = $_GET['field'];
            $model->$field = $_GET['existingvalue'];
            if ($model->save()) {
                echo "true";
            } else {
                echo 'false1';
            }
        } catch (Exception $e) {
            echo '<div class="swiper-slide"><font color="red">' . $e->getMessage() . '</font></div>'; //$e->getMessage();
        }
    }

    /* Displays the contact page
     */

    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

// if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

// collect user input data
        if (isset($_POST['LoginForm'])) {

            $model->attributes = $_POST['LoginForm'];
            if ($model->username == '') {
                //       exit;
                Yii::app()->user->setFlash('error', '<p style="color:blue">A blank space is not an acceptable username. Please recheck, and refill before submitting.</p>');
                $this->redirect(array('login'));
            }
            if ($model->password == '') {
                //       exit;
                Yii::app()->user->setFlash('error', '<p style="color:blue">A blank space cannot possibly be a valid password. Please recheck, and refill before submitting.</p>');
                $this->redirect(array('login'));
            }
            if (count(Evuti::model()->findAll('nom=:x and pswd=:y', array(':x' => $model->username, ':y' => md5($model->password)))) > 0) {
                if (current(Evuti::model()->findAll('nom=:x and pswd=:y', array(':x' => $model->username, ':y' => md5($model->password))))->user_status == 0) {
                    Yii::app()->user->setFlash('error', '<p style="color:blue">Your account has not been activated. Please contact the system administrattors.</p>');
                    $this->redirect(array('login'));
                }
            }
                $model->password = md5($model->password);

//            var_dump($_POST);
                $users = Evuti::model()->findAll('nom=:x', array(':x' => $model->username));
                if ($model->validate() && $model->login()) {
               //     if (current(Evprof::model()->findAll('id=:x', array(':x' => current($users)->pro)))->lib == "Administrator")
               //         $this->redirect(array('/adminS5F1T6P0'));
               //     else {
                        $this->redirect(Yii::app()->user->returnUrl);
              //      }
                    exit;
                }
                $this->redirect(Yii::app()->user->returnUrl);
            }
            $this->render('login', array('model' => $model));
        }

        /**
         * Logs out the current user and redirect to homepage.
         */
        public function actionLogout() {
            Yii::app()->user->logout();
            $this->redirect(Yii::app()->homeUrl);
        }

    }