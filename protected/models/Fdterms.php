<?php

/**
 * This is the model class for table "fdterms".
 *
 * The followings are the available columns in table 'fdterms':
 * @property integer $term_id
 * @property string $term_name
 * @property string $term_duration
 */
class Fdterms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Fdterms the static model class
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
		return 'fdterms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('term_name', 'length', 'max'=>45),
			array('term_duration', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('term_id, term_name, term_duration', 'safe', 'on'=>'search'),
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
			'term_id' => 'Term',
			'term_name' => 'Term Name',
			'term_duration' => 'Term Duration',
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

		$criteria->compare('term_id',$this->term_id);
		$criteria->compare('term_name',$this->term_name,true);
		$criteria->compare('term_duration',$this->term_duration,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}