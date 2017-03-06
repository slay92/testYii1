<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
        private $_id;
        private $_userName;
        private $_userSurname;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		elseif($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
//		return !$this->errorCode;
            
            $users= User::model()->findByAttributes(array('user_email'=>$this->username));
            
            if($users===null) {
                $this->errorCode = self::ERROR_USERNAME_INVALID;                
            }
            else if(!$users->validatePassword($this->password)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            }
            else {           
                $this->errorCode = self::ERROR_NONE;
                $this->_id = $users->id;
                $this->_userName = $users->user_name;
                $this->_userSurname = $users->user_surname;
            }
            return !$this->errorCode;
        }
        
        public function getName() {
            return $this->_userSurname . ", " . $this->_userName;
	}
        
        public function getId() {
            return $this->_id;
        }
}