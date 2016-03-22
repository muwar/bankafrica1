<?php

/**
 * This is the model class for table "bqdfd".
 *
 * The followings are the available columns in table 'bqdfd':
 * @property integer $d_id
 * @property integer $fd_id
 * @property string $cus
 * @property string $sta
 * @property double $rate
 * @property integer $amount
 * @property integer $proc
 * @property string $rejmot
 * @property string $remark
 * @property string $neg
 * @property string $drej
 * @property string $dval
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Bqdfd extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqdfd the static model class
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
		return 'bqdfd';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
	//		array('fd_id, rate, amount, remark', 'required'),
			array('fd_id, amount, proc', 'numerical', 'integerOnly'=>true),
			array('rate', 'numerical'),
			array('cus', 'length', 'max'=>15),
			array('sta', 'length', 'max'=>5),
			array('rejmot', 'length', 'max'=>50),
			array('neg', 'length', 'max'=>1),
			array('uti, utimo', 'length', 'max'=>10),
			array('drej, dval, dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('d_id, fd_id, cus, sta, rate, amount, proc, rejmot, remark, neg, drej, dval, uti, utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'd_id' => 'D',
			'fd_id' => 'Fd',
			'cus' => 'Cus',
			'sta' => 'Sta',
			'rate' => 'Rate',
			'amount' => 'Amount',
			'proc' => 'Proc',
			'rejmot' => 'Rejmot',
			'remark' => 'Remark',
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

		$criteria->compare('d_id',$this->d_id);
		$criteria->compare('fd_id',$this->fd_id);
		$criteria->compare('cus',$this->cus,true);
		$criteria->compare('sta',$this->sta,true);
		$criteria->compare('rate',$this->rate);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('proc',$this->proc);
		$criteria->compare('rejmot',$this->rejmot,true);
		$criteria->compare('remark',$this->remark,true);
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