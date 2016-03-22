<?php

/**
 * This is the model class for table "bqope".
 *
 * The followings are the available columns in table 'bqope':
 * @property string $cdos
 * @property string $ope
 * @property string $lab
 * @property string $grp1
 * @property string $grp2
 * @property string $grp3
 * @property string $frz1
 * @property string $frz2
 * @property string $frz3
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Bqope extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqope the static model class
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
		return 'bqope';
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
			array('ope', 'length', 'max'=>4),
			array('lab', 'length', 'max'=>50),
			array('grp1, grp2, grp3, frz1, frz2, frz3', 'length', 'max'=>100),
			array('uti, utimo', 'length', 'max'=>10),
			array('dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, ope, lab, grp1, grp2, grp3, frz1, frz2, frz3, uti, utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'ope' => 'Ope',
			'lab' => 'Lab',
			'grp1' => 'Grp1',
			'grp2' => 'Grp2',
			'grp3' => 'Grp3',
			'frz1' => 'Frz1',
			'frz2' => 'Frz2',
			'frz3' => 'Frz3',
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
		$criteria->compare('ope',$this->ope,true);
		$criteria->compare('lab',$this->lab,true);
		$criteria->compare('grp1',$this->grp1,true);
		$criteria->compare('grp2',$this->grp2,true);
		$criteria->compare('grp3',$this->grp3,true);
		$criteria->compare('frz1',$this->frz1,true);
		$criteria->compare('frz2',$this->frz2,true);
		$criteria->compare('frz3',$this->frz3,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}