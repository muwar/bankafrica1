<?php

/**
 * This is the model class for table "evuti".
 *
 * The followings are the available columns in table 'evuti':
 * @property string $cdos
 * @property string $uti
 * @property string $nom
 * @property string $sur
 * @property string $pswd
 * @property string $pro
 * @property string $rmk
 * @property string $utic
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Evuti extends CActiveRecord
{
    public $confirm_your_password;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Evuti the static model class
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
		return 'evuti';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
    //                array('nom, pswd,pro', 'required'),
 //                   array('pswd', 'length', 'min' => 6, 'max'=>20, 
  //  'tooShort'=>Yii::t("translation", "{attribute} is too short."),
  //  'tooLong'=>Yii::t("translation", "{attribute} is too long.")),

			array('cdos', 'length', 'max'=>5),
			array('uti', 'length', 'max'=>45),
			array('nom, sur, pswd, pro, rmk', 'length', 'max'=>50),
			array('utic, utimo', 'length', 'max'=>10),
			array('dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, uti, nom, sur, pswd, pro, rmk, utic, country_id,utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'uti' => 'Uti',
			'nom' => 'Username',
			'sur' => 'Sur',
			'pswd' => 'Password',
			'pro' => 'Account type',
			'rmk' => 'Rmk',
			'utic' => 'Utic',
			'country_id'=>'Country',
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
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('nom',$this->nom,true);
		$criteria->compare('sur',$this->sur,true);
		$criteria->compare('pswd',$this->pswd,true);
		$criteria->compare('pro',$this->pro,true);
		$criteria->compare('rmk',$this->rmk,true);
		$criteria->compare('utic',$this->utic,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}