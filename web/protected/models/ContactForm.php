<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $subject;
	public $body;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, subject, body', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels(){
		return array(
			'title'=>Yii::t('app','model.contact.title'),
			'newMsg'=>Yii::t('app','model.contact.newMsg'),
			'name'=>Yii::t('app','model.contact.name'),
			'email'=>Yii::t('app','model.contact.email'),
			'subject'=>Yii::t('app','model.contact.subject'),
			'body'=>Yii::t('app','model.contact.body'),
			'verificationcode'=>Yii::t('app','model.contact.verificationcode'),
			'verificationText'=>Yii::t('app','model.contact.verificationText'),
			'send'=>Yii::t('app','model.contact.send'),
		);
	}
        
        public static function label(){
               return (new ContactForm)->attributeLabels();
        }
}