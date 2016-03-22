<?php

/**
 * This is the model class for table "cominvest".
 *
 * The followings are the available columns in table 'cominvest':
 * @property integer $id
 * @property integer $company_id
 * @property integer $investment_type
 * @property integer $investment_need
 * @property string $executive_summary
 * @property string $project_name
 * @property string $cdate
 * @property integer $user
 * @property integer $valid
 * @property string $exec_sum_valid
 */
class Cominvest extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cominvest the static model class
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
		return 'cominvest';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, investment_type, investment_need, executive_summary, project_name, cdate, user', 'required'),
			array('company_id, investment_type, investment_need, user, valid', 'numerical', 'integerOnly'=>true),
			array('project_name', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, investment_type, investment_need, executive_summary, project_name, cdate, user, valid, exec_sum_valid', 'safe', 'on'=>'search'),
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
			'company_id' => 'Company',
			'investment_type' => 'Investment Type',
			'investment_need' => 'Investment Need',
			'executive_summary' => 'Executive Summary',
			'project_name' => 'Project Name',
			'cdate' => 'Cdate',
			'user' => 'User',
			'valid' => 'Valid',
			'exec_sum_valid' => 'Exec Sum Valid',
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
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('investment_type',$this->investment_type);
		$criteria->compare('investment_need',$this->investment_need);
		$criteria->compare('executive_summary',$this->executive_summary,true);
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('user',$this->user);
		$criteria->compare('valid',$this->valid);
		$criteria->compare('exec_sum_valid',$this->exec_sum_valid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}