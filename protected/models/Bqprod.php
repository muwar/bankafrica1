<?php

/**
 * This is the model class for table "bqprod".
 *
 * The followings are the available columns in table 'bqprod':
 * @property string $cdos
 * @property string $cpro
 * @property string $lab
 * @property string $cat1
 * @property string $cat2
 * @property string $cat3
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Bqprod extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqprod the static model class
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
		return 'bqprod';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cdos, cat1, cat2, cat3', 'length', 'max'=>5),
			array('cpro', 'length', 'max'=>3),
			array('lab', 'length', 'max'=>50),
			array('uti, utimo', 'length', 'max'=>10),
			array('dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, cpro, lab, cat1, cat2, cat3, uti, utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'cpro' => 'Cpro',
			'lab' => 'Lab',
			'cat1' => 'Cat1',
			'cat2' => 'Cat2',
			'cat3' => 'Cat3',
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
		$criteria->compare('cpro',$this->cpro,true);
		$criteria->compare('lab',$this->lab,true);
		$criteria->compare('cat1',$this->cat1,true);
		$criteria->compare('cat2',$this->cat2,true);
		$criteria->compare('cat3',$this->cat3,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}