<?php

class UsersController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
                'actions' => array('index', 'view', 'create', 'configuration'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'edit'),
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

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Evuti;
        $model1 = new Bqcus;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Evuti'])) {

            $model->attributes = $_POST['Evuti'];
            $model->confirm_your_password = $_POST['Evuti']['confirm_your_password'];

            // check duplicate username
            $checkname = Evuti::model()->findAll('nom=:x', array(':x' => $model->nom));
            if (count($checkname) != 0) {
                Yii::app()->user->setFlash('error', 'This username is already in use');
                $this->render('create', array('model' => $model));
                exit;
            }
            $checkcode = Evuti::model()->findAll('uti=:x', array(':x' => $model->uti));
            if (count($checkcode) != 0) {
                Yii::app()->user->setFlash('error', 'This Identification is already in use');
                $this->render('create', array('model' => $model));
                exit;
            }
            if ($model->pswd == "") {
                Yii::app()->user->setFlash('error', 'The password field cannot be blank');
                $this->render('create', array('model' => $model));
                exit;
            }
            $model->pro = $_POST['Evuti']['pro'];
            if ($model->pswd != $model->confirm_your_password) {
                Yii::app()->user->setFlash('error', 'Passwords Are Incompatible');
                $this->render('create', array('model' => $model));
                exit;
            }
            $model->pswd = md5($model->pswd);
            if (Evprof::model()->findByPk($model->pro)->lib == 'Bank') {
                $model->user_status = 0;
                Yii::app()->user->setFlash('msg', '<p style="color:blue">Your account has been created successfully. It will however be validated and activated by the administrator and you will be notified.</p>');
                $this->redirect(Yii::app()->user->returnUrl);
            } else {
                $model->user_status = 0;
                $model->activation_key = sha1(mt_rand(10000, 99999) . time() . $model->email);
            }
            $model->utic = $model->nom;
            $model->utimo = $model->nom;
            $model->dou = date('Y-m-d H:i:s');
            $model->dmo = date('Y-m-d H:i:s');

            if ($model->save())
                ;
            $activation_url = $this->createAbsoluteUrl('users/validate', array('key' => $model->activation_key));
            mail($model->email, 'Account Confirmation from africapital Quote', "Click" . $activation_url . " to activate your account", "");
            /* --------working to save customer info too */
            if (isset($_POST['Bqcus'])) {
                $model1->cdos = 5;
                $model1->cus = $model->id;
                $model1->uti = $model->uti;
                $model1->email = $_POST['Bqcus']['email'];
                $model1->telephone = $_POST['Bqcus']['telephone'];
                $model1->resnam = $_POST['Bqcus']['resnam'];
                $model1->dou = date('Y-m-d H:i:sa');
                $model1->dmo = date('Y-m-d H:i:sa');
                $model1->utimo = $model->uti;
            }
            if ($model1->save())
                $this->redirect(array('site/login'));
            else
                ;
        }

        $this->render('create', array(
            'model' => $model,
            'model1' => $model1,
        ));
    }

    public function actionActivate($activation_key) {
        $model_check = current(Evuti::model()->findAll('activation_key=:x', array(':x' => $activation_key)));

        $model = new LoginForm;
        $model->password = $model_check->pswd;
        $model->username = $model_check->nom;
        $model_check->status = 1;
        $model_check->save();
        if ($model->validate() && $model->login()) {
            Yii::app()->user->setFlash('msg', 'Your account has been activated. You are welcome to the community');
            $this->redirect(array('site/index'));
        }
    }

    public function actionConfiguration() {
        $model = new Bqcus;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Bqcus'])) {
            //   var_dump($_POST);
            $model->attributes = $_POST['Bqcus'];
            $model->cdos = 005;
            //  var_dump($model->attributes);exit;
            if ($model->save())
                $this->redirect(array('site/profile'));
            else
                echo "not saved";
            //      $this->redirect(array('site/profile'));
            exit;
        }

        $this->render('configuration', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionEdit() {

        $users = Evuti::model()->findAll('nom=:x', array(':x' => Yii::app()->user->name));
        $customers = Bqcus::model()->findAll('cus=:x', array(':x' => current($users)->id));
        $id = current($customers)->identity;
        $id1 = current($customers)->cus;
        $models = Bqcus::model()->findAll('identity=:x and cus=:y', array(':x' => $id, ':y' => $id1));

        foreach ($models as $model)
            ;
        if (isset($_POST['Bqcus'])) {
            $model->attributes = $_POST['Bqcus'];
            if ($model->save())
                $this->redirect(array('site/profile'));
            exit;
        }
        $this->render('user', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->user_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Users');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Users('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Users']))
            $model->attributes = $_GET['Users'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Users the loaded model
     * @throws CHttpException
     */
    public function loadModel1($id) {
        $model = Bqcus::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Users the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Users::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Users $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'users-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
