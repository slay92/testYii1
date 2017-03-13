<?php
/**
 * This is the model class for table "t_user".
 *
 * The followings are the available columns in table 't_user':
 * @property integer $id
 * @property integer $user_type
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
        * Returns the static model of the specified AR class.
        * @return CActiveRecord the static model class
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
			array('user_type, sup_user, user_name, user_surname, user_email, salt_password, user_password', 'required'),
			array('user_type, sup_user', 'numerical', 'integerOnly'=>true),
			array('user_name, user_surname, salt_password, user_password', 'length', 'max'=>150),
			array('user_email', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_type, sup_user, user_name, user_surname, user_email, salt_password, user_password', 'safe', 'on'=>'search'),
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
			'infousers' => array(self::HAS_ONE, 'Infouser', 'id_user'),
			'permsusers' => array(self::HAS_ONE, 'Permsuser', 'id_user'),
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
			'user_type' => Yii::t('app','model.profile.user_type'),
			'sup_user' => 'Sup User',
			'user_name' => Yii::t('app','model.profile.name'),
			'user_surname' => Yii::t('app','model.profile.surname'),
			'user_email' => Yii::t('app','model.profile.email'),
			'salt_password' => 'Salt Password',
			'user_password' => Yii::t('app','model.profile.password'),
                    
                        'title' => Yii::t('app','model.profile.title'),
                        'adminUser' => Yii::t('app','model.profile.adminUser'),
                        'ownerUser' => Yii::t('app','model.profile.ownerUser'),
                        'changePicture' => Yii::t('app','model.profile.changePicture'),
                        'titleSpace' => Yii::t('app','model.profile.titleSpace'),
                        'titleUpdate' => Yii::t('app','model.profile.titleUpdate'),
                        'titleInfoBasic' => Yii::t('app','model.profile.titleInfoBasic'),
                        'name' => Yii::t('app','model.profile.name'),
                        'surname' => Yii::t('app','model.profile.surname'),
                        'email' => Yii::t('app','model.profile.email'),
                        'titleExtraInfo' => Yii::t('app','model.profile.titleExtraInfo'),
                        'nickname' => Yii::t('app','model.profile.nickname'),
                        'birthdate' => Yii::t('app','model.profile.birthdate'),
                        'location' => Yii::t('app','model.profile.location'),
                        'state' => Yii::t('app','model.profile.state'),
                        'city' => Yii::t('app','model.profile.city'),
                        'map' => Yii::t('app','model.profile.map'),
                        'viewUser' => Yii::t('app','model.user.viewUser'),
                    
                        'SwalAvatarTitle' => Yii::t('app','swal.Profile.title'),
                        'SwalAvatarSuccess' => Yii::t('app','swal.Profile.success'),
                        'SwalAvatarError' => Yii::t('app','swal.Profile.error'),
		);
	}
        
        public static function label(){
               return (new User)->attributeLabels();
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
        
        public function getProfileObject(){
                $criteria=new CDbCriteria;
                $id_user = Yii::app()->user->id;
                $criteria->with = array('infousers', 'userType');
                $criteria->addCondition('t.id = :id_user');
                $criteria->params = array(':id_user' => $id_user);
                $profile = $this->find($criteria);
                return $profile;
        }
        
        public function getProfileWithId($id_user){
                $criteria=new CDbCriteria;
                $criteria->with = array('infousers', 'userType');
                $criteria->addCondition('t.id = :id_user');
                $criteria->params = array(':id_user' => $id_user);
                $profile = $this->find($criteria);
                return $profile;
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
