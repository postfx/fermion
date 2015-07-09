<?php

class UserIdentity extends CUserIdentity
{    
    protected $_id;
    public $active;
    
    public function authenticate()
    {
        $user = User::model()->findByAttributes(array('login'=>$this->username));
        $this->active = $user->active;
        if ( $user===null )
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if( !CPasswordHelper::verifyPassword($this->password, $user->password) && $this->password!==$user->password )
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id = $user->id;
            //$hash = CPasswordHelper::generateSalt();
            //Yii::app()->cache->set('user_hash' . $user->id, $hash);
            //Yii::app()->request->cookies['user_hash'] = new CHttpCookie('user_hash', $hash);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}