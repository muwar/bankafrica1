<?php

/**
 * This is the model class for table "security_list".
 *
 * The followings are the available columns in table 'security_list':
 * @property integer $id
 * @property integer $owner
 * @property string $issuer
 * @property string $issuedate
 * @property string $matdate
 * @property integer $sectype
 * @property integer $facevalue
 * @property integer $discount
 */
class SecurityList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SecurityList the static model class
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
		return 'security_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('owner, issuer, issuedate, matdate, sectype, facevalue, discount', 'required'),
			array('owner, sectype, facevalue, discount', 'numerical', 'integerOnly'=>true),
			array('issuer', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, owner, issuer, issuedate, matdate, sectype, facevalue, discount', 'safe', 'on'=>'search'),
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
			'owner' => 'Owner',
			'issuer' => 'Issuer',
			'issuedate' => 'Issuedate',
			'matdate' => 'Matdate',
			'sectype' => 'Sectype',
			'facevalue' => 'Facevalue',
			'discount' => 'Discount',
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
		$criteria->compare('owner',$this->owner);
		$criteria->compare('issuer',$this->issuer,true);
		$criteria->compare('issuedate',$this->issuedate,true);
		$criteria->compare('matdate',$this->matdate,true);
		$criteria->compare('sectype',$this->sectype);
		$criteria->compare('facevalue',$this->facevalue);
		$criteria->compare('discount',$this->discount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}