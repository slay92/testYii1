<?php
/**
 * This is the model class for table "t_user".
 *
 * The followings are the available columns in table 't_user':
 * @property integer $id
 * @property integer $user_type
 * @property integer $user_info
 * @property integer $user_perms
 * @property integer $sup_user
 * @property string $user_name
 * @property string $user_surname
 * @property string $user_email
 * @property string $salt_password
 * @property string $user_password
 *
 * The followings are the available model relations:
 * @property Infouser[] $infousers
 * @property Permsuser[] $permsusers
 * @property Typeuser $userType
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_type, user_info, user_perms, sup_user, user_name, user_surname, user_email, salt_password, user_password', 'required'),
			array('user_type, user_info, user_perms, sup_user', 'numerical', 'integerOnly'=>true),
			array('user_name, user_surname, salt_password, user_password', 'length', 'max'=>150),
			array('user_email', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_type, user_info, user_perms, sup_user, user_name, user_surname, user_email, salt_password, user_password', 'safe', 'on'=>'search'),
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
			'infousers' => array(self::HAS_MANY, 'Infouser', 'id_user'),
			'permsusers' => array(self::HAS_MANY, 'Permsuser', 'id_user'),
			'userType' => array(self::BELONGS_TO, 'Typeuser', 'user_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_type' => 'User Type',
			'user_info' => 'User Info',
			'user_perms' => 'User Perms',
			'sup_user' => 'Sup User',
			'user_name' => 'User Name',
			'user_surname' => 'User Surname',
			'user_email' => 'User Email',
			'salt_password' => 'Salt Password',
			'user_password' => 'User Password',
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
	public function search(){
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_type',$this->user_type);
		$criteria->compare('user_info',$this->user_info);
		$criteria->compare('user_perms',$this->user_perms);
		$criteria->compare('sup_user',$this->sup_user);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_surname',$this->user_surname,true);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('salt_password',$this->salt_password,true);
		$criteria->compare('user_password',$this->user_password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
        
        // hash password
        public function hashPassword($password, $salt){
            return md5($salt.$password);
        }

        // password validation
        public function validatePassword($password){
            return $this->hashPassword($password,$this->salt_password)===$this->user_password;
        }

        //generate salt
        public function generateSalt(){
            return uniqid('',true);
        }

        public function beforeValidate(){
            $this->salt_password = $this->generateSalt();
            return parent::beforeValidate();
        }

        public function beforeSave(){
            $this->user_password = $this->hashPassword($this->user_password, $this->salt_password);
            return parent::beforeSave();
        }
}
