<?php

/**
 * This is the model class for table "bqfd".
 *
 * The followings are the available columns in table 'bqfd':
 * @property integer $cdos
 * @property string $cus
 * @property string $num
 * @property string $rban
 * @property string $per
 * @property string $sen
 * @property double $amo
 * @property double $drat
 * @property double $qdrat
 * @property integer $bank_customer
 * @property string $sta
 * @property string $proc
 * @property string $rejmot
 * @property string $neg
 * @property string $drej
 * @property string $dval
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 * @property string $vdate
 * @property string $edate
 */
class Bqfd extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqfd the static model class
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
		return 'bqfd';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('bank_customer, vdate, edate', 'required'),
			array('bank_customer', 'numerical', 'integerOnly'=>true),
			array('amo, drat, qdrat', 'numerical'),
			array('cus, num', 'length', 'max'=>15),
			array('rban', 'length', 'max'=>3),
			array('per, sta, proc', 'length', 'max'=>5),
			array('sen, neg', 'length', 'max'=>1),
			array('rejmot', 'length', 'max'=>50),
			array('uti, utimo', 'length', 'max'=>10),
			array('drej, dval, dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, cus, num, rban, per, sen, amo, drat, qdrat, bank_customer, sta, proc, rejmot, neg, drej, dval, uti, utimo, dou, dmo, vdate, edate', 'safe', 'on'=>'search'),
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
			'rban' => 'Rban',
			'per' => 'Per',
			'sen' => 'Sen',
			'amo' => 'Amo',
			'drat' => 'Drat',
			'qdrat' => 'Qdrat',
			'bank_customer' => 'Bank Customer',
			'sta' => 'Sta',
			'proc' => 'Proc',
			'rejmot' => 'Rejmot',
			'neg' => 'Neg',
			'drej' => 'Drej',
			'dval' => 'Dval',
			'uti' => 'Uti',
			'utimo' => 'Utimo',
			'dou' => 'Dou',
			'dmo' => 'Dmo',
			'vdate' => 'Vdate',
			'edate' => 'Edate',
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
		$criteria->compare('cus',$this->cus,true);
		$criteria->compare('num',$this->num,true);
		$criteria->compare('rban',$this->rban,true);
		$criteria->compare('per',$this->per,true);
		$criteria->compare('sen',$this->sen,true);
		$criteria->compare('amo',$this->amo);
		$criteria->compare('drat',$this->drat);
		$criteria->compare('qdrat',$this->qdrat);
		$criteria->compare('bank_customer',$this->bank_customer);
		$criteria->compare('sta',$this->sta,true);
		$criteria->compare('proc',$this->proc,true);
		$criteria->compare('rejmot',$this->rejmot,true);
		$criteria->compare('neg',$this->neg,true);
		$criteria->compare('drej',$this->drej,true);
		$criteria->compare('dval',$this->dval,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);
		$criteria->compare('vdate',$this->vdate,true);
		$criteria->compare('edate',$this->edate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}