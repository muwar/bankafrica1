<?php

/**
 * This is the model class for table "bqprdcus".
 *
 * The followings are the available columns in table 'bqprdcus':
 * @property string $cdos
 * @property string $cus
 * @property string $cpro
 * @property string $cpack
 * @property string $modu
 * @property string $dssou
 * @property string $dessou
 * @property string $sta
 * @property string $proc
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Bqprdcus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqprdcus the static model class
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
		return 'bqprdcus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cdos, modu, sta, proc', 'length', 'max'=>5),
			array('cus', 'length', 'max'=>15),
			array('cpro', 'length', 'max'=>3),
			array('cpack', 'length', 'max'=>50),
			array('uti, utimo', 'length', 'max'=>10),
			array('dssou, dessou, dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, cus, cpro, cpack, modu, dssou, dessou, sta, proc, uti, utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'cpro' => 'Cpro',
			'cpack' => 'Cpack',
			'modu' => 'Modu',
			'dssou' => 'Dssou',
			'dessou' => 'Dessou',
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
		$criteria->compare('cus',$this->cus,true);
		$criteria->compare('cpro',$this->cpro,true);
		$criteria->compare('cpack',$this->cpack,true);
		$criteria->compare('modu',$this->modu,true);
		$criteria->compare('dssou',$this->dssou,true);
		$criteria->compare('dessou',$this->dessou,true);
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