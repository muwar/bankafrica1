<?php

/**
 * This is the model class for table "bqcus".
 *
 * The followings are the available columns in table 'bqcus':
 * @property string $cdos
 * @property string $cus
 * @property string $nam
 * @property string $sur
 * @property string $mid
 * @property string $otn
 * @property string $email
 * @property string $telephone
 * @property string $dbir
 * @property string $mna
 * @property string $fna
 * @property string $sex
 * @property string $res
 * @property string $tcus
 * @property string $resnam
 * @property string $rso
 * @property string $breg
 * @property string $tpc
 * @property string $qua
 * @property double $sal
 * @property double $ca
 * @property string $town
 * @property string $tbir
 * @property string $pro
 * @property string $sec
 * @property string $sta
 * @property string $proc
 * @property string $id
 * @property string $idis
 * @property string $idid
 * @property string $ided
 * @property string $psp
 * @property string $pspis
 * @property string $pspid
 * @property string $psped
 * @property string $dcre
 * @property string $uti
 * @property string $utimo
 * @property string $dou
 * @property string $dmo
 */
class Bqcus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bqcus the static model class
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
		return 'bqcus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, telephone', 'required'),
			array('sal, ca', 'numerical'),
			array('cdos, qua', 'length', 'max'=>5),
			array('cus', 'length', 'max'=>15),
			array('nam, sur, mid, otn, breg, tpc, town, tbir, pro', 'length', 'max'=>50),
			array('email, telephone', 'length', 'max'=>45),
			array('mna, fna, resnam, rso, sec', 'length', 'max'=>100),
			array('sex, sta', 'length', 'max'=>2),
			array('res', 'length', 'max'=>3),
                        array('email','email'),
                    array('email', 'unique','message'=>'Email already exists!'),  
			array('proc', 'length', 'max'=>1),
			array('id, idis, psp, pspis', 'length', 'max'=>20),
			array('uti, utimo', 'length', 'max'=>10),
			array('dbir, idid, ided, pspid, psped, dcre, dou, dmo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cdos, cus, nam, sur, mid, otn, email, telephone, dbir, mna, fna, sex, res, tcus, resnam, rso, breg, tpc, qua, sal, ca, town, tbir, pro, sec, sta, proc, id, idis, idid, ided, psp, pspis, pspid, psped, dcre, uti, utimo, dou, dmo', 'safe', 'on'=>'search'),
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
			'nam' => 'Nam',
			'sur' => 'Sur',
			'mid' => 'Mid',
			'otn' => 'Otn',
			'email' => 'Email',
			'telephone' => 'Telephone',
			'dbir' => 'Dbir',
			'mna' => 'Mna',
			'fna' => 'Fna',
			'sex' => 'Sex',
			'res' => 'Res',
			'tcus' => 'Tcus',
			'resnam' => 'Name',
			'rso' => 'Rso',
			'breg' => 'Breg',
			'tpc' => 'Tpc',
			'qua' => 'Qua',
			'sal' => 'Sal',
			'ca' => 'Ca',
			'town' => 'Town',
			'tbir' => 'Tbir',
			'pro' => 'Pro',
			'sec' => 'Sec',
			'sta' => 'Sta',
			'proc' => 'Proc',
			'id' => 'ID',
			'idis' => 'Idis',
			'idid' => 'Idid',
			'ided' => 'Ided',
			'psp' => 'Psp',
			'pspis' => 'Pspis',
			'pspid' => 'Pspid',
			'psped' => 'Psped',
			'dcre' => 'Dcre',
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

		$criteria->compare('cdos',$this->cdos,true);
		$criteria->compare('cus',$this->cus,true);
		$criteria->compare('nam',$this->nam,true);
		$criteria->compare('sur',$this->sur,true);
		$criteria->compare('mid',$this->mid,true);
		$criteria->compare('otn',$this->otn,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('dbir',$this->dbir,true);
		$criteria->compare('mna',$this->mna,true);
		$criteria->compare('fna',$this->fna,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('res',$this->res,true);
		$criteria->compare('tcus',$this->tcus,true);
		$criteria->compare('resnam',$this->resnam,true);
		$criteria->compare('rso',$this->rso,true);
		$criteria->compare('breg',$this->breg,true);
		$criteria->compare('tpc',$this->tpc,true);
		$criteria->compare('qua',$this->qua,true);
		$criteria->compare('sal',$this->sal);
		$criteria->compare('ca',$this->ca);
		$criteria->compare('town',$this->town,true);
		$criteria->compare('tbir',$this->tbir,true);
		$criteria->compare('pro',$this->pro,true);
		$criteria->compare('sec',$this->sec,true);
		$criteria->compare('sta',$this->sta,true);
		$criteria->compare('proc',$this->proc,true);
		$criteria->compare('id',$this->id,true);
		$criteria->compare('idis',$this->idis,true);
		$criteria->compare('idid',$this->idid,true);
		$criteria->compare('ided',$this->ided,true);
		$criteria->compare('psp',$this->psp,true);
		$criteria->compare('pspis',$this->pspis,true);
		$criteria->compare('pspid',$this->pspid,true);
		$criteria->compare('psped',$this->psped,true);
		$criteria->compare('dcre',$this->dcre,true);
		$criteria->compare('uti',$this->uti,true);
		$criteria->compare('utimo',$this->utimo,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('dmo',$this->dmo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}