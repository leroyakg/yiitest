<?php

/**
 * This is the model class for table "tbl_sale".
 *
 * The followings are the available columns in table 'tbl_sale':
 * @property integer $seqNo
 * @property string $date_sale
 * @property integer $userSeqNo
 * @property integer $clientSeqNo
 * @property integer $prod
 * @property integer $payout
 *
 * The followings are the available model relations:
 * @property User $userSeqNo0
 * @property Client $clientSeqNo0
 */
class Sale extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_sale';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userSeqNo, clientSeqNo, prod, payout', 'required'),
			array('userSeqNo, clientSeqNo, prod, payout', 'numerical', 'integerOnly'=>true),
			array('date_sale', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('seqNo, date_sale, userSeqNo, clientSeqNo, prod, payout', 'safe', 'on'=>'search'),
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
			'userSeqNo0' => array(self::BELONGS_TO, 'User', 'userSeqNo'),
			'clientSeqNo0' => array(self::BELONGS_TO, 'Client', 'clientSeqNo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'seqNo' => 'Seq No',
			'date_sale' => 'Date Sale',
			'userSeqNo' => 'User Seq No',
			'clientSeqNo' => 'Client Seq No',
			'prod' => 'Prod',
			'payout' => 'Payout',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('seqNo',$this->seqNo);
		$criteria->compare('date_sale',$this->date_sale,true);
		$criteria->compare('userSeqNo',$this->userSeqNo);
		$criteria->compare('clientSeqNo',$this->clientSeqNo);
		$criteria->compare('prod',$this->prod);
		$criteria->compare('payout',$this->payout);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sale the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
