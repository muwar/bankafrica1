<?php

/**
 * This is the model class for table "bqvnom".
 *
 * The followings are the available columns in table 'bqvnom':
 * @property string $cdos
 * @property string $ctab
 * @property string $cacc
 * @property string $lib1
 * @property string $lib2
 * @property string $lib3
 * @property string $lib4
 * @property string $lib5
 * @property string $lib6
 * @property string $mnt1
 * @property string $mnt2
 * @property string $mnt3
 * @property string $mnt4
 * @property string $mnt5
 * @property string $mnt6
 * @property string $dt1
 * @property string $dt2
 * @property string $dt3
 * @property string $dt4
 * @property string $dt5
 * @property string $dt6
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Bqvnom extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqvnom the static model class
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
		return 'bqvnom';
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
			array('ctab', 'length', 'max'=>4),
			array('cacc, mnt1, mnt2, mnt3, mnt4, mnt5, mnt6, uti, utimo', 'length', 'max'=>10),
			array('lib1, lib2, lib3, lib4, lib5, lib6', 'length', 'max'=>50),
			array('dt1, dt2, dt3, dt4, dt5, dt6, dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, ctab, cacc, lib1, lib2, lib3, lib4, lib5, lib6, mnt1, mnt2, mnt3, mnt4, mnt5, mnt6, dt1, dt2, dt3, dt4, dt5, dt6, uti, utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'ctab' => 'Ctab',
			'cacc' => 'Cacc',
			'lib1' => 'Lib1',
			'lib2' => 'Lib2',
			'lib3' => 'Lib3',
			'lib4' => 'Lib4',
			'lib5' => 'Lib5',
			'lib6' => 'Lib6',
			'mnt1' => 'Mnt1',
			'mnt2' => 'Mnt2',
			'mnt3' => 'Mnt3',
			'mnt4' => 'Mnt4',
			'mnt5' => 'Mnt5',
			'mnt6' => 'Mnt6',
			'dt1' => 'Dt1',
			'dt2' => 'Dt2',
			'dt3' => 'Dt3',
			'dt4' => 'Dt4',
			'dt5' => 'Dt5',
			'dt6' => 'Dt6',
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
		$criteria->compare('ctab',$this->ctab,true);
		$criteria->compare('cacc',$this->cacc,true);
		$criteria->compare('lib1',$this->lib1,true);
		$criteria->compare('lib2',$this->lib2,true);
		$criteria->compare('lib3',$this->lib3,true);
		$criteria->compare('lib4',$this->lib4,true);
		$criteria->compare('lib5',$this->lib5,true);
		$criteria->compare('lib6',$this->lib6,true);
		$criteria->compare('mnt1',$this->mnt1,true);
		$criteria->compare('mnt2',$this->mnt2,true);
		$criteria->compare('mnt3',$this->mnt3,true);
		$criteria->compare('mnt4',$this->mnt4,true);
		$criteria->compare('mnt5',$this->mnt5,true);
		$criteria->compare('mnt6',$this->mnt6,true);
		$criteria->compare('dt1',$this->dt1,true);
		$criteria->compare('dt2',$this->dt2,true);
		$criteria->compare('dt3',$this->dt3,true);
		$criteria->compare('dt4',$this->dt4,true);
		$criteria->compare('dt5',$this->dt5,true);
		$criteria->compare('dt6',$this->dt6,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}