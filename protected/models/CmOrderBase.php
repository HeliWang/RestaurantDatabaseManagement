<?php

/**
 * This is the model class for table "cm_order_base".
 *
 * The followings are the available columns in table 'cm_order_base':
 * @property integer $oid
 * @property integer $rid
 * @property integer $channel
 * @property integer $uid
 * @property integer $uaid
 * @property integer $status
 * @property string $created
 * @property integer $dltype
 * @property string $dlexp
 * @property string $pretax
 * @property string $total
 * @property string $comment
 */
class CmOrderBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CmOrderBase the static model class
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
		return 'cm_order_base';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rid, channel, uid, uaid, status, dltype, dlexp, pretax, total, comment', 'required'),
			array('rid, channel, uid, uaid, status, dltype', 'numerical', 'integerOnly'=>true),
			array('dlexp, pretax, total', 'length', 'max'=>5),
			array('comment', 'length', 'max'=>255),
			array('created', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('oid, rid, channel, uid, uaid, status, created, dltype, dlexp, pretax, total, comment', 'safe', 'on'=>'search'),
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
			'oid' => 'Oid',
			'rid' => 'Rid',
			'channel' => 'Channel',
			'uid' => 'Uid',
			'uaid' => 'Uaid',
			'status' => 'Status',
			'created' => 'Created',
			'dltype' => 'Dltype',
			'dlexp' => 'Dlexp',
			'pretax' => 'Pretax',
			'total' => 'Total',
			'comment' => 'Comment',
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

		$criteria->compare('oid',$this->oid);
		$criteria->compare('rid',$this->rid);
		$criteria->compare('channel',$this->channel);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('uaid',$this->uaid);
		$criteria->compare('status',$this->status);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('dltype',$this->dltype);
		$criteria->compare('dlexp',$this->dlexp,true);
		$criteria->compare('pretax',$this->pretax,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}