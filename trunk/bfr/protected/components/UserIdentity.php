<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user with DB connection.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		$user = Yii::app()->db->createCommand()
		->select('id, username, password')
		->from('user u')
		->where('u.username=:username and u.password=md5(:password)', array(':username'=>$this->username, ':password'=>$this->password))
		->queryRow();

		if($user === false) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else {
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}