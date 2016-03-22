<?php

/**
 * This is the model class for table "bqcusacc".
 *
 * The followings are the available columns in table 'bqcusacc':
 * @property string $cdos
 * @property string $ban
 * @property string $bra
 * @property string $suf
 * @property string $acc
 * @property string $key
 * @property string $cur
 * @property string $name
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Bqcusacc extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqcusacc the static model class
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
		return 'bqcusacc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cdos, suf', 'length', 'max'=>5),
			array('ban, bra, name', 'length', 'max'=>15),
			array('acc', 'length', 'max'=>20),
			array('key, uti, utimo', 'length', 'max'=>10),
			array('cur', 'length', 'max'=>3),
			array('dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, ban, bra, suf, acc, key, cur, name, uti, utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'bra' => 'Bra',
			'suf' => 'Suf',
			'acc' => 'Acc',
			'key' => 'Key',
			'cur' => 'Cur',
			'name' => 'Name',
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
		$criteria->compare('bra',$this->bra,true);
		$criteria->compare('suf',$this->suf,true);
		$criteria->compare('acc',$this->acc,true);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('cur',$this->cur,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}