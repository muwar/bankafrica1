<?php

/**
 * This is the model class for table "bqconf".
 *
 * The followings are the available columns in table 'bqconf':
 * @property string $cdos
 * @property string $ban
 * @property string $pro
 * @property string $cpro
 * @property string $nat
 * @property string $typ
 * @property double $amo
 * @property double $rat
 * @property string $sta
 * @property string $proc
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Bqconf extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqconf the static model class
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
		return 'bqconf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cpro, nat', 'required'),
			array('amo, rat', 'numerical'),
			array('cdos, pro, sta, proc', 'length', 'max'=>5),
			array('ban', 'length', 'max'=>15),
			array('cpro, typ', 'length', 'max'=>3),
			array('nat, uti, utimo', 'length', 'max'=>10),
			array('dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, ban, pro, cpro, nat, typ, amo, rat, sta, proc, uti, utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'ban' => 'Ban',
			'pro' => 'Pro',
			'cpro' => 'Cpro',
			'nat' => 'Nat',
			'typ' => 'Typ',
			'amo' => 'Amo',
			'rat' => 'Rat',
			'sta' => 'Sta',
			'proc' => 'Proc',
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

		$criteria->compare('cdos',$this->cdos,true);
		$criteria->compare('ban',$this->ban,true);
		$criteria->compare('pro',$this->pro,true);
		$criteria->compare('cpro',$this->cpro,true);
		$criteria->compare('nat',$this->nat,true);
		$criteria->compare('typ',$this->typ,true);
		$criteria->compare('amo',$this->amo);
		$criteria->compare('rat',$this->rat);
		$criteria->compare('sta',$this->sta,true);
		$criteria->compare('proc',$this->proc,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}