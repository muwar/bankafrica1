<?php

/**
 * This is the model class for table "institutions_quotation".
 *
 * The followings are the available columns in table 'institutions_quotation':
 * @property integer $institutions_quotation_id
 * @property integer $institution_id
 * @property integer $quotation_id
 * @property integer $special_rate
 * @property integer $term_id
 * @property integer $minimum_amount
 * @property integer $other_fees
 * @property integer $setup_charges
 * @property string $date_set
 * @property string $time_set
 * @property double $rate
 */
class InstitutionsQuotation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InstitutionsQuotation the static model class
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
		return 'institutions_quotation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('institution_id, quotation_id, term_id', 'required'),
			array('quotation_id, special_rate, term_id, minimum_amount, other_fees, setup_charges', 'numerical', 'integerOnly'=>true),
			array('lrate,brate', 'numerical'),
			array('date_set, time_set', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('institutions_quotation_id, institution_id, quotation_id, special_rate, term_id, minimum_amount, other_fees, setup_charges, date_set, time_set, lrate,brate', 'safe', 'on'=>'search'),
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
			'institutions_quotation_id' => 'Institutions Quotation',
			'institution_id' => 'Institution',
			'quotation_id' => 'Quotation',
			'special_rate' => 'Special Rate',
			'term_id' => 'Term',
			'minimum_amount' => 'Minimum Amount',
			'other_fees' => 'Other Fees',
			'setup_charges' => 'Setup Charges',
			'date_set' => 'Date Set',
			'time_set' => 'Time Set',
			'lrate' => 'Lending Rate',
                        'brate' => 'Borrowing Rate',
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

		$criteria->compare('institutions_quotation_id',$this->institutions_quotation_id);
		$criteria->compare('institution_id',$this->institution_id);
		$criteria->compare('quotation_id',$this->quotation_id);
		$criteria->compare('special_rate',$this->special_rate);
		$criteria->compare('term_id',$this->term_id);
		$criteria->compare('minimum_amount',$this->minimum_amount);
		$criteria->compare('other_fees',$this->other_fees);
		$criteria->compare('setup_charges',$this->setup_charges);
		$criteria->compare('date_set',$this->date_set,true);
		$criteria->compare('time_set',$this->time_set,true);
		$criteria->compare('rate',$this->rate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}