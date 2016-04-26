<?php

/**
 * This is the model class for table "apisubscribers".
 *
 * The followings are the available columns in table 'apisubscribers':
 * @property integer $id
 * @property string $adminname
 * @property string $apikey
 * @property string $apiusername
 * @property string $apipassword
 * @property string $oauth
 * @property string $sms_id
 * @property string $sms_password
 * @property string $lastsused
 * @property string $quantityused
 * @property string $adminemail
 * @property string $appname
 * @property string $appurl
 */
class Apisubscribers extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Apisubscribers the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'apisubscribers';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('apiusername, apipassword, accid,appurl', 'required'),
            array('adminname, sms_password, lastsused, adminemail, appname, appurl', 'length', 'max' => 45),
            array('apikey, oauth, sms_id', 'length', 'max' => 255),
            array('apiusername, apipassword', 'length', 'max' => 100),
            array('quantityused', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, adminname, apikey, apiusername, apipassword, oauth, sms_id, sms_password, lastsused, quantityused, adminemail, appname, appurl', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'adminname' => 'Administrator Name',
            'apikey' => 'API key',
            'apiusername' => 'API Username',
            'apipassword' => 'API Password',
            'oauth' => 'Oauth',
            'sms_id' => 'SMS Sender ID',
            'sms_password' => 'SMS Password',
            'lastsused' => 'Last used',
            'quantityused' => 'Quantity used',
            'adminemail' => 'Administrator Email',
            'appname' => 'Application Name',
            'appurl' => 'Application URL',
            'accid' => 'Account serial',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('adminname', $this->adminname, true);
        $criteria->compare('apikey', $this->apikey, true);
        $criteria->compare('apiusername', $this->apiusername, true);
        $criteria->compare('apipassword', $this->apipassword, true);
        $criteria->compare('oauth', $this->oauth, true);
        $criteria->compare('sms_id', $this->sms_id, true);
        $criteria->compare('sms_password', $this->sms_password, true);
        $criteria->compare('lastsused', $this->lastsused, true);
        $criteria->compare('quantityused', $this->quantityused, true);
        $criteria->compare('adminemail', $this->adminemail, true);
        $criteria->compare('appname', $this->appname, true);
        $criteria->compare('appurl', $this->appurl, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
