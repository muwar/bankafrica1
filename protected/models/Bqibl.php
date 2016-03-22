<?php

/**
 * This is the model class for table "bqibl".
 *
 * The followings are the available columns in table 'bqibl':
 * @property integer $cdos
 * @property string $cus
 * @property integer $num
 * @property string $target
 * @property string $bban
 * @property string $per
 * @property string $sen
 * @property double $amo
 * @property double $lrat
 * @property double $qlrat
 * @property double $brat
 * @property double $qbrat
 * @property string $vdate
 * @property string $edate
 * @property string $sta
 * @property integer $proc
 * @property string $rejmot
 * @property string $neg
 * @property string $drej
 * @property string $dval
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Bqibl extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqibl the static model class
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
		return 'bqibl';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num, target, bban, vdate, edate', 'required'),
			array('num, proc', 'numerical', 'integerOnly'=>true),
			array('amo, lrat, qlrat, brat, qbrat', 'numerical'),
			array('cus', 'length', 'max'=>15),
			array('target', 'length', 'max'=>3),
			array('bban', 'length', 'max'=>50),
			array('per, sta', 'length', 'max'=>5),
			array('sen, neg', 'length', 'max'=>1),
			array('uti, utimo', 'length', 'max'=>10),
			array('rejmot, drej, dval, dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, cus, num, target, bban, per, sen, amo, lrat, qlrat, brat, qbrat, vdate, edate, sta, proc, rejmot, neg, drej, dval, uti, utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'target' => 'Target',
			'bban' => 'Bban',
			'per' => 'Per',
			'sen' => 'Sen',
			'amo' => 'Amo',
			'lrat' => 'Lrat',
			'qlrat' => 'Qlrat',
			'brat' => 'Brat',
			'qbrat' => 'Qbrat',
			'vdate' => 'Vdate',
			'edate' => 'Edate',
			'sta' => 'Sta',
			'proc' => 'Proc',
			'rejmot' => 'Rejmot',
			'neg' => 'Neg',
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
		$criteria->compare('num',$this->num);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('bban',$this->bban,true);
		$criteria->compare('per',$this->per,true);
		$criteria->compare('sen',$this->sen,true);
		$criteria->compare('amo',$this->amo);
		$criteria->compare('lrat',$this->lrat);
		$criteria->compare('qlrat',$this->qlrat);
		$criteria->compare('brat',$this->brat);
		$criteria->compare('qbrat',$this->qbrat);
		$criteria->compare('vdate',$this->vdate,true);
		$criteria->compare('edate',$this->edate,true);
		$criteria->compare('sta',$this->sta,true);
		$criteria->compare('proc',$this->proc);
		$criteria->compare('rejmot',$this->rejmot,true);
		$criteria->compare('neg',$this->neg,true);
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