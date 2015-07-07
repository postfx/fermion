<?php

/*
    для ролей пользователей
 *  поле role для роли
 *  */

class WebUser extends CWebUser {
    
    
    private $_model = null;
 
    /*
     * для проверки одновременного входа с разных ПК
     */
//    public function init()
//    {
//            parent::init();
//            if ($this->checkDoubleLogin()) {
//                    $this->logout();
//                    Yii::app()->request->redirect(Yii::app()->homeUrl);
//            }
//    }
//    
//    
//    private function checkDoubleLogin()
//    {
//        
//            if (!$this->isGuest) {
//                
//                if ($this->_model === null){
//                    $this->_model = User::model()->findByPk($this->id, array('select' => 'role, isOnePc'));
//                }
//                $user = $this->_model;
//                if ( $user->isOnePc ) {
//                    $hash = Yii::app()->request->cookies['user_hash']->value;
//                    $cache = Yii::app()->cache->get('user_hash' . $this->id);
//                    if (!$hash OR !$cache OR ($hash !== $cache)) {
//                            return true;
//                    }
//                }
//            }
//            return false;
//    }
    /**/
    
    
    function getRole() {
        if( $user = $this->getModel() ){
            return $user->role;
        }
    }
    
//    function get_role() {
//        if( $user = $this->getModel() ){
//            return $user->_type;
//        }
//    }
 
    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
        }
        return $this->_model;
    }
}