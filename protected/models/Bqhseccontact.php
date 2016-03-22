<?php

/**
 * This is the model class for table "bqhseccontact".
 *
 * The followings are the available columns in table 'bqhseccontact':
 * @property integer $cdos
 * @property integer $cus
 * @property integer $ref
 * @property string $typ
 * @property string $nam
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 * @property integer $alert_owner
 * @property integer $alert_investor
 * @property string $buy_name
 * @property string $buy_email
 * @property string $buy_tel
 * @property string $buy_address
 * @property string $messsage
 */
class Bqhseccontact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqhseccontact the static model class
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
		return 'bqhseccontact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cus, ref', 'required'),
			array('cus, ref, alert_owner, alert_investor', 'numerical', 'integerOnly'=>true),
			array('typ', 'length', 'max'=>3),
			array('nam', 'length', 'max'=>30),
			array('uti, utimo', 'length', 'max'=>10),
			array('buy_name, buy_email, buy_tel', 'length', 'max'=>45),
			array('buy_address', 'length', 'max'=>64),
			array('messsage', 'length', 'max'=>255),
			array('dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, cus, ref, typ, nam, uti, utimo, dou, dmo, alert_owner, alert_investor, buy_name, buy_email, buy_tel, buy_address, messsage', 'safe', 'on'=>'search'),
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
			'ref' => 'Ref',
			'typ' => 'Typ',
			'nam' => 'Nam',
			'uti' => 'Uti',
			'utimo' => 'Utimo',
			'dou' => 'Dou',
			'dmo' => 'Dmo',
			'alert_owner' => 'Alert Owner',
			'alert_investor' => 'Alert Investor',
			'buy_name' => 'Buy Name',
			'buy_email' => 'Buy Email',
			'buy_tel' => 'Buy Tel',
			'buy_address' => 'Buy Address',
			'messsage' => 'Messsage',
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
		$criteria->compare('ref',$this->ref);
		$criteria->compare('typ',$this->typ,true);
		$criteria->compare('nam',$this->nam,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);
		$criteria->compare('alert_owner',$this->alert_owner);
		$criteria->compare('alert_investor',$this->alert_investor);
		$criteria->compare('buy_name',$this->buy_name,true);
		$criteria->compare('buy_email',$this->buy_email,true);
		$criteria->compare('buy_tel',$this->buy_tel,true);
		$criteria->compare('buy_address',$this->buy_address,true);
		$criteria->compare('messsage',$this->messsage,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}