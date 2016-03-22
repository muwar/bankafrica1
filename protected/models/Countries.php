<?php

/**
 * This is the model class for table "countries".
 *
 * The followings are the available columns in table 'countries':
 * @property string $id_countries
 * @property string $name
 * @property string $iso_alpha2
 * @property string $iso_alpha3
 * @property integer $iso_numeric
 * @property string $currency_code
 * @property string $currency_name
 * @property string $currrency_symbol
 * @property string $flag
 */
class Countries extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Countries the static model class
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
		return 'countries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iso_numeric', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>200),
			array('iso_alpha2', 'length', 'max'=>2),
			array('iso_alpha3, currency_code, currrency_symbol', 'length', 'max'=>3),
			array('currency_name', 'length', 'max'=>32),
			array('flag', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_countries, name, iso_alpha2, iso_alpha3, iso_numeric, currency_code, currency_name, currrency_symbol, flag', 'safe', 'on'=>'search'),
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
			'id_countries' => 'Id Countries',
			'name' => 'Name',
			'iso_alpha2' => 'Iso Alpha2',
			'iso_alpha3' => 'Iso Alpha3',
			'iso_numeric' => 'Iso Numeric',
			'currency_code' => 'Currency Code',
			'currency_name' => 'Currency Name',
			'currrency_symbol' => 'Currrency Symbol',
			'flag' => 'Flag',
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

		$criteria->compare('id_countries',$this->id_countries,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('iso_alpha2',$this->iso_alpha2,true);
		$criteria->compare('iso_alpha3',$this->iso_alpha3,true);
		$criteria->compare('iso_numeric',$this->iso_numeric);
		$criteria->compare('currency_code',$this->currency_code,true);
		$criteria->compare('currency_name',$this->currency_name,true);
		$criteria->compare('currrency_symbol',$this->currrency_symbol,true);
		$criteria->compare('flag',$this->flag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}