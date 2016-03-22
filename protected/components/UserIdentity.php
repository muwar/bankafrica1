<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
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
		
		$username = "";
		$password="";
		$credentials=  Evuti::model()->findAll('nom=:x AND pswd=:y AND user_status=:z',array(':x'=>$this->username,':y'=>$this->password,':z'=>1));
		foreach($credentials as $r){
			$username= $r->nom;
			$password=$r->pswd;
		}
     /*           echo $username;
                echo $password; exit; */
		$users=array(
				$username => $password,
                    
		);

		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}
