<?php

/*
    для ролей пользователей
 *  поле role для роли
 *  */

    $roles = Yii::app()->db->createCommand()->select('id, name, active')->from('role')->where('active=1')->queryAll();
    
    /*$result = array(
        '0' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Администратор',
            'bizRule' => null,
            'data' => null
        ),
    );*/
    $result = array();
    foreach ( $roles as $role ) {
        $result[$role['id']] = array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => $role['name'],
            'bizRule' => null,
            'data' => null
        );
    }

    return $result;