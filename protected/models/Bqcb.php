<?php

/**
 * This is the model class for table "bqcb".
 *
 * The followings are the available columns in table 'bqcb':
 * @property integer $cdos
 * @property string $cus
 * @property string $num
 * @property string $lban
 * @property string $per
 * @property string $sen
 * @property double $amo
 * @property integer $bank_account
 * @property double $com1
 * @property double $com2
 * @property double $com3
 * @property double $lrat
 * @property double $qlrat
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
class Bqcb extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqcb the static model class
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
		return 'bqcb';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		//	array('bank_account, vdate, edate', 'required'),
			array('bank_account', 'numerical', 'integerOnly'=>true),
			array('amo, com1, com2, com3, lrat, qlrat', 'numerical'),
			array('cus, num', 'length', 'max'=>15),
			array('lban', 'length', 'max'=>3),
			array('per, sta, proc', 'length', 'max'=>5),
			array('sen, neg', 'length', 'max'=>1),
			array('rejmot', 'length', 'max'=>50),
			array('uti, utimo', 'length', 'max'=>10),
			array('vdate, edate', 'length', 'max'=>45),
			array('drej, dval, dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, cus, num, lban, per, sen, amo, bank_account, com1, com2, com3, lrat, qlrat, sta, proc, rejmot, neg, drej, dval, uti, utimo, dou, dmo, vdate, edate', 'safe', 'on'=>'search'),
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
			'lban' => 'Lban',
			'per' => 'Per',
			'sen' => 'Sen',
			'amo' => 'Amo',
			'bank_account' => 'Bank Account',
			'com1' => 'Com1',
			'com2' => 'Com2',
			'com3' => 'Com3',
			'lrat' => 'Lrat',
			'qlrat' => 'Qlrat',
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
		$criteria->compare('lban',$this->lban,true);
		$criteria->compare('per',$this->per,true);
		$criteria->compare('sen',$this->sen,true);
		$criteria->compare('amo',$this->amo);
		$criteria->compare('bank_account',$this->bank_account);
		$criteria->compare('com1',$this->com1);
		$criteria->compare('com2',$this->com2);
		$criteria->compare('com3',$this->com3);
		$criteria->compare('lrat',$this->lrat);
		$criteria->compare('qlrat',$this->qlrat);
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