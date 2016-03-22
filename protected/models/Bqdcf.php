<?php

/**
 * This is the model class for table "bqdcf".
 *
 * The followings are the available columns in table 'bqdcf':
 * @property string $cdos
 * @property string $cus
 * @property string $num
 * @property string $own
 * @property string $tit
 * @property string $sum
 * @property double $amo
 * @property double $intyp
 * @property string $sta
 * @property string $proc
 * @property string $rejmot
 * @property string $drej
 * @property string $dval
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 * @property integer $cf_id
 */
class Bqdcf extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqdcf the static model class
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
		return 'bqdcf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cf_id', 'required'),
			array('cf_id', 'numerical', 'integerOnly'=>true),
			array('amo, intyp', 'numerical'),
			array('cdos, sta, proc', 'length', 'max'=>5),
			array('cus, num', 'length', 'max'=>15),
			array('own', 'length', 'max'=>30),
			array('rejmot', 'length', 'max'=>50),
			array('uti, utimo', 'length', 'max'=>10),
			array('tit, sum, drej, dval, dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, cus, num, own, tit, sum, amo, intyp, sta, proc, rejmot, drej, dval, uti, utimo, dou, dmo, cf_id', 'safe', 'on'=>'search'),
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
			'own' => 'Own',
			'tit' => 'Tit',
			'sum' => 'Sum',
			'amo' => 'Amo',
			'intyp' => 'Intyp',
			'sta' => 'Sta',
			'proc' => 'Proc',
			'rejmot' => 'Rejmot',
			'drej' => 'Drej',
			'dval' => 'Dval',
			'uti' => 'Uti',
			'utimo' => 'Utimo',
			'dou' => 'Dou',
			'dmo' => 'Dmo',
			'cf_id' => 'Cf',
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
		$criteria->compare('num',$this->num,true);
		$criteria->compare('own',$this->own,true);
		$criteria->compare('tit',$this->tit,true);
		$criteria->compare('sum',$this->sum,true);
		$criteria->compare('amo',$this->amo);
		$criteria->compare('intyp',$this->intyp);
		$criteria->compare('sta',$this->sta,true);
		$criteria->compare('proc',$this->proc,true);
		$criteria->compare('rejmot',$this->rejmot,true);
		$criteria->compare('drej',$this->drej,true);
		$criteria->compare('dval',$this->dval,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);
		$criteria->compare('cf_id',$this->cf_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}