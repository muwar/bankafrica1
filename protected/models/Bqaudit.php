<?php

/**
 * This is the model class for table "bqaudit".
 *
 * The followings are the available columns in table 'bqaudit':
 * @property string $cdos
 * @property string $num
 * @property string $date
 * @property string $time
 * @property string $sch
 * @property string $tab
 * @property string $field
 * @property double $typ
 * @property double $oldv
 * @property double $newv
 * @property string $oldt
 * @property string $newt
 * @property string $oldd
 * @property string $newd
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Bqaudit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqaudit the static model class
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
		return 'bqaudit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('typ, oldv, newv', 'numerical'),
			array('cdos', 'length', 'max'=>5),
			array('num', 'length', 'max'=>15),
			array('sch, field', 'length', 'max'=>3),
			array('tab, uti, utimo', 'length', 'max'=>10),
			array('date, time, oldt, newt, oldd, newd, dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, num, date, time, sch, tab, field, typ, oldv, newv, oldt, newt, oldd, newd, uti, utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'num' => 'Num',
			'date' => 'Date',
			'time' => 'Time',
			'sch' => 'Sch',
			'tab' => 'Tab',
			'field' => 'Field',
			'typ' => 'Typ',
			'oldv' => 'Oldv',
			'newv' => 'Newv',
			'oldt' => 'Oldt',
			'newt' => 'Newt',
			'oldd' => 'Oldd',
			'newd' => 'Newd',
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
		$criteria->compare('num',$this->num,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('sch',$this->sch,true);
		$criteria->compare('tab',$this->tab,true);
		$criteria->compare('field',$this->field,true);
		$criteria->compare('typ',$this->typ);
		$criteria->compare('oldv',$this->oldv);
		$criteria->compare('newv',$this->newv);
		$criteria->compare('oldt',$this->oldt,true);
		$criteria->compare('newt',$this->newt,true);
		$criteria->compare('oldd',$this->oldd,true);
		$criteria->compare('newd',$this->newd,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}