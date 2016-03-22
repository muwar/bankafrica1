<?php

/**
 * This is the model class for table "bqcfcontact".
 *
 * The followings are the available columns in table 'bqcfcontact':
 * @property integer $cdos
 * @property integer $cus
 * @property integer $num
 * @property integer $own
 * @property string $sta
 * @property string $proc
 * @property string $rejmot
 * @property string $uti
 * @property string $dou
 * @property string $dmo
 * @property integer $alert_owner
 * @property integer $alert_investor
 * @property integer $valid
 * @property string $message
 * @property string $inv_name
 * @property string $inv_email
 * @property string $inv_tel
 * @property string $inv_address
 */
class Bqcfcontact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqcfcontact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bqcfcontact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cus, num, own, alert_owner, alert_investor, valid, message, inv_name, inv_email, inv_tel, inv_address', 'required'),
			array('cus, num, own, alert_owner, alert_investor, valid', 'numerical', 'integerOnly'=>true),
			array('sta, proc', 'length', 'max'=>5),
			array('rejmot', 'length', 'max'=>50),
			array('uti', 'length', 'max'=>10),
			array('message', 'length', 'max'=>255),
			array('inv_name, inv_email, inv_tel', 'length', 'max'=>45),
			array('inv_address', 'length', 'max'=>64),
			array('dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, cus, num, own, sta, proc, rejmot, uti, dou, dmo, alert_owner, alert_investor, valid, message, inv_name, inv_email, inv_tel, inv_address', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cdos' => 'Cdos',
			'cus' => 'Cus',
			'num' => 'Num',
			'own' => 'Own',
			'sta' => 'Sta',
			'proc' => 'Proc',
			'rejmot' => 'Rejmot',
			'uti' => 'Uti',
			'dou' => 'Dou',
			'dmo' => 'Dmo',
			'alert_owner' => 'Alert Owner',
			'alert_investor' => 'Alert Investor',
			'valid' => 'Valid',
			'message' => 'Message',
			'inv_name' => 'Inv Name',
			'inv_email' => 'Inv Email',
			'inv_tel' => 'Inv Tel',
			'inv_address' => 'Inv Address',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cdos',$this->cdos);
		$criteria->compare('cus',$this->cus);
		$criteria->compare('num',$this->num);
		$criteria->compare('own',$this->own);
		$criteria->compare('sta',$this->sta,true);
		$criteria->compare('proc',$this->proc,true);
		$criteria->compare('rejmot',$this->rejmot,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);
		$criteria->compare('alert_owner',$this->alert_owner);
		$criteria->compare('alert_investor',$this->alert_investor);
		$criteria->compare('valid',$this->valid);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('inv_name',$this->inv_name,true);
		$criteria->compare('inv_email',$this->inv_email,true);
		$criteria->compare('inv_tel',$this->inv_tel,true);
		$criteria->compare('inv_address',$this->inv_address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}