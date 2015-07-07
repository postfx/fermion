<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserActivateIdentity extends CUserIdentity
{
    private $_id;

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
        $criteria = new CDbCriteria();
        $criteria->compare('email', $this->username);

        $record = Users::model()->find($criteria);

        if($record === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if($record->status != 1)
            $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
        else {
            $this->_id=$record->id;
            $this->setState('data', $record);
            $this->errorCode=self::ERROR_NONE;
        }

        return !$this->errorCode;
	}

    public function getId()
    {
        return $this->_id;
    }
}