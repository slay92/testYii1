<?php

/**
 * This is the model class for table "t_infouser".
 *
 * The followings are the available columns in table 't_infouser':
 * @property integer $id
 * @property integer $id_user
 * @property string $nickname
 * @property string $birthdate
 * @property string $State
 * @property string $City
 * @property integer $max_space
 * @property string $date_created
 *
 * The followings are the available model relations:
 * @property User $idUser
 */
class Infouser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_infouser';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, date_created', 'required'),
			array('id_user, max_space', 'numerical', 'integerOnly'=>true),
			array('nickname, State, City', 'length', 'max'=>150),
			array('birthdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, nickname, birthdate, State, City, max_space, date_created', 'safe', 'on'=>'search'),
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
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Id User',
			'nickname' => 'Nickname',
			'birthdate' => 'Birthdate',
			'State' => 'State',
			'City' => 'City',
			'max_space' => 'Max Space',
			'date_created' => 'Date Created',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('State',$this->State,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('max_space',$this->max_space);
		$criteria->compare('date_created',$this->date_created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Infouser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
