<?php

/**
 * This is the model class for table "bqpla".
 *
 * The followings are the available columns in table 'bqpla':
 * @property integer $cdos
 * @property string $cus
 * @property string $num
 * @property string $typ
 * @property string $ban
 * @property double $amo
 * @property double $prat
 * @property string $neg
 * @property string $per
 * @property double $brat
 * @property string $sta
 * @property string $proc
 * @property string $rejmot
 * @property string $drej
 * @property string $dval
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Bqpla extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqpla the static model class
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
		return 'bqpla';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amo, prat', 'numerical'),
			array('cus, num', 'length', 'max'=>15),
			array('typ, neg', 'length', 'max'=>3),
			array('ban', 'length', 'max'=>30),
			array('per, sta, proc', 'length', 'max'=>5),
			array('rejmot', 'length', 'max'=>50),
			array('uti, utimo', 'length', 'max'=>10),
			array('drej, dval, dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, cus, num, typ, ban, amo, prat, neg, per, brat, sta, proc, rejmot, drej, dval, uti, utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'typ' => 'Typ',
			'ban' => 'Ban',
			'amo' => 'Amo',
			'prat' => 'Prat',
			'neg' => 'Neg',
			'per' => 'Per',
			'brat' => 'Brat',
			'sta' => 'Sta',
			'proc' => 'Proc',
			'rejmot' => 'Rejmot',
			'drej' => 'Drej',
			'dval' => 'Dval',
			'uti' => 'Uti',
			'utimo' => 'Utimo',
			'dou' => 'Dou',
			'dmo' => 'Dmo',
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
		$criteria->compare('typ',$this->typ,true);
		$criteria->compare('ban',$this->ban,true);
		$criteria->compare('amo',$this->amo);
		$criteria->compare('prat',$this->prat);
		$criteria->compare('neg',$this->neg,true);
		$criteria->compare('per',$this->per,true);
		$criteria->compare('brat',$this->brat);
		$criteria->compare('sta',$this->sta,true);
		$criteria->compare('proc',$this->proc,true);
		$criteria->compare('rejmot',$this->rejmot,true);
		$criteria->compare('drej',$this->drej,true);
		$criteria->compare('dval',$this->dval,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}