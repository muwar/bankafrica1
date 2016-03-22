<?php

/**
 * This is the model class for table "bqdcb".
 *
 * The followings are the available columns in table 'bqdcb':
 * @property integer $id
 * @property string $cdos
 * @property integer $cb_id
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
 * @property string $remark
 */
class Bqdcb extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqdcb the static model class
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
		return 'bqdcb';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cb_id, remark', 'required'),
			array('cb_id', 'numerical', 'integerOnly'=>true),
			array('amo, intyp', 'numerical'),
			array('cdos, sta, proc', 'length', 'max'=>5),
			array('cus, num', 'length', 'max'=>15),
			array('own', 'length', 'max'=>30),
			array('rejmot', 'length', 'max'=>50),
			array('uti, utimo', 'length', 'max'=>10),
			array('remark', 'length', 'max'=>256),
			array('tit, sum, drej, dval, dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cdos, cb_id, cus, num, own, tit, sum, amo, intyp, sta, proc, rejmot, drej, dval, uti, utimo, dou, dmo, remark', 'safe', 'on'=>'search'),
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
			'cb_id' => 'Cb',
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
			'remark' => 'Remark',
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
		$criteria->compare('cb_id',$this->cb_id);
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
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}