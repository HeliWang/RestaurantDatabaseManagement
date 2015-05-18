<?php

/**
 * This is the model class for table "cm_user".
 *
 * The followings are the available columns in table 'cm_user':
 * @property integer $uid
 * @property string $username
 * @property string $email
 * @property string $activekey
 * @property string $displayname
 * @property string $status
 * @property integer $lastadid
 * @property string $created
 * @property string $token
 * @property string $expired
 */
class CmUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CmUser the static model class
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
		return 'cm_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, username, email, activekey, displayname, status, lastadid, token', 'required'),
			array('uid, lastadid', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>15),
			array('email, displayname', 'length', 'max'=>50),
			array('activekey, token', 'length', 'max'=>32),
			array('status', 'length', 'max'=>5),
			array('created, expired', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, username, email, activekey, displayname, status, lastadid, created, token, expired', 'safe', 'on'=>'search'),
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
			'uid' => 'Uid',
			'username' => 'Username',
			'email' => 'Email',
			'activekey' => 'Activekey',
			'displayname' => 'Displayname',
			'status' => 'Status',
			'lastadid' => 'Lastadid',
			'created' => 'Created',
			'token' => 'Token',
			'expired' => 'Expired',
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

		$criteria->compare('uid',$this->uid);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('activekey',$this->activekey,true);
		$criteria->compare('displayname',$this->displayname,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('lastadid',$this->lastadid);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('token',$this->token,true);
		$criteria->compare('expired',$this->expired,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}