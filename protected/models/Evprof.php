<?php

/**
 * This is the model class for table "evprof".
 *
 * The followings are the available columns in table 'evprof':
 * @property integer $id
 * @property string $cdos
 * @property string $pro
 * @property string $lib
 * @property string $rmk
 * @property string $utic
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Evprof extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Evprof the static model class
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
		return 'evprof';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cdos', 'length', 'max'=>5),
			array('pro', 'length', 'max'=>15),
			array('lib, rmk', 'length', 'max'=>50),
			array('utic, utimo', 'length', 'max'=>10),
			array('dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cdos, pro, lib, rmk, utic, utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'cdos' => 'Cdos',
			'pro' => 'Pro',
			'lib' => 'Lib',
			'rmk' => 'Rmk',
			'utic' => 'Utic',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('cdos',$this->cdos,true);
		$criteria->compare('pro',$this->pro,true);
		$criteria->compare('lib',$this->lib,true);
		$criteria->compare('rmk',$this->rmk,true);
		$criteria->compare('utic',$this->utic,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}