<?php

/**
 * This is the model class for table "bqdsec".
 *
 * The followings are the available columns in table 'bqdsec':
 * @property integer $cdos
 * @property integer $cus
 * @property integer $ref
 * @property integer $refsec_id
 * @property string $typ
 * @property string $nam
 * @property integer $issuer
 * @property string $isdat
 * @property double $matdat
 * @property string $neg
 * @property double $val
 * @property string $curv
 * @property double $valc
 * @property double $pri
 * @property double $qrat
 * @property string $sta
 * @property string $proc
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 * @property integer $face_value
 * @property integer $discount
 * @property integer $valid
 * @property integer $alert_owner
 * @property integer $alert_investor
 */
class Bqdsec extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqdsec the static model class
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
		return 'bqdsec';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' refsec_id', 'required'),
			array('cus, ref, refsec_id, issuer, face_value, discount, valid, alert_owner, alert_investor', 'numerical', 'integerOnly'=>true),
			array('matdat, val, valc, pri, qrat', 'numerical'),
			array('typ, neg, curv', 'length', 'max'=>3),
			array('nam', 'length', 'max'=>30),
			array('sta, proc', 'length', 'max'=>5),
			array('uti, utimo', 'length', 'max'=>10),
			array('isdat, dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, cus, ref, refsec_id, typ, nam, issuer, isdat, matdat, neg, val, curv, valc, pri, qrat, sta, proc, uti, utimo, dou, dmo, face_value, discount, valid, alert_owner, alert_investor', 'safe', 'on'=>'search'),
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
			'refsec_id' => 'Refsec',
			'typ' => 'Typ',
			'nam' => 'Nam',
			'issuer' => 'Issuer',
			'isdat' => 'Isdat',
			'matdat' => 'Matdat',
			'neg' => 'Neg',
			'val' => 'Val',
			'curv' => 'Curv',
			'valc' => 'Valc',
			'pri' => 'Pri',
			'qrat' => 'Qrat',
			'sta' => 'Sta',
			'proc' => 'Proc',
			'uti' => 'Uti',
			'utimo' => 'Utimo',
			'dou' => 'Dou',
			'dmo' => 'Dmo',
			'face_value' => 'Face Value',
			'discount' => 'Discount',
			'valid' => 'Valid',
			'alert_owner' => 'Alert Owner',
			'alert_investor' => 'Alert Investor',
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
		$criteria->compare('refsec_id',$this->refsec_id);
		$criteria->compare('typ',$this->typ,true);
		$criteria->compare('nam',$this->nam,true);
		$criteria->compare('issuer',$this->issuer);
		$criteria->compare('isdat',$this->isdat,true);
		$criteria->compare('matdat',$this->matdat);
		$criteria->compare('neg',$this->neg,true);
		$criteria->compare('val',$this->val);
		$criteria->compare('curv',$this->curv,true);
		$criteria->compare('valc',$this->valc);
		$criteria->compare('pri',$this->pri);
		$criteria->compare('qrat',$this->qrat);
		$criteria->compare('sta',$this->sta,true);
		$criteria->compare('proc',$this->proc,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);
		$criteria->compare('face_value',$this->face_value);
		$criteria->compare('discount',$this->discount);
		$criteria->compare('valid',$this->valid);
		$criteria->compare('alert_owner',$this->alert_owner);
		$criteria->compare('alert_investor',$this->alert_investor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}