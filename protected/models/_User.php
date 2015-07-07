<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $login
 * @property string $password
 * @property integer $role
 * @property string $name
 * @property integer $date_create
 * @property integer $time_rest_day1
 * @property integer $time_rest_day2
 * @property integer $time_rest_day3
 * @property integer $time_rest_day4
 * @property integer $time_rest_day5
 * @property integer $time_rest_day6
 * @property integer $time_rest_day7
 * @property integer $time_work_day1
 * @property integer $time_work_day2
 * @property integer $time_work_day3
 * @property integer $time_work_day4
 * @property integer $time_work_day5
 * @property integer $time_work_day6
 * @property integer $time_work_day7
 */
class User extends CActiveRecord
{
    
    private $_identity;
    public static $roles = array(
        0   =>  'Обычный пользователь',
        1   =>  'Администратор',
    );
    
    public $pass;
    public $passR;

    public function tableName()
	{
            return 'taskm_user';
	}


	public function rules()
	{
            return array(
//                array('login, password', 'required'),
//                array('role, time_rest_day1, time_rest_day2, time_rest_day3, time_rest_day4, time_rest_day5, time_rest_day6, time_rest_day7, time_work_day1, time_work_day2, time_work_day3, time_work_day4, time_work_day5, time_work_day6, time_work_day7', 'numerical', 'integerOnly'=>true),
//                array('login, password, name', 'length', 'max'=>64),
                
                // login
                    array('login, password', 'required', 'on'=>'login'),
                    array('password', 'authenticate', 'on'=>'login'),
                
                // signup
                    array('login, pass, passR', 'required', 'on'=>'signup'),
                    array('login', 'unique', 'on'=>'signup'),
                    array('login', 'email', 'on'=>'signup'),
                    array('login', 'length', 'max'=>64, 'on'=>'signup'),
                    array('pass', 'length', 'min'=>6, 'max'=>16, 'on'=>'signup'),
                    array('passR', 'compare', 'compareAttribute'=>'pass', 'on'=>'signup'),
                    array('name', 'length', 'max'=>64, 'on'=>'signup'),
                
                // update
                    array('pass', 'length', 'min'=>6, 'max'=>16, 'on'=>'update'),
                    array('passR', 'compare', 'compareAttribute'=>'pass', 'on'=>'update'),
                    array('name', 'length', 'max'=>64, 'on'=>'update'),
                
                // create_admin, update_admin
                    array('login', 'required', 'on'=>'create_admin, update_admin'),
                    array('password', 'required', 'on'=>'create_admin'),
                    array('login', 'unique', 'on'=>'create_admin, update_admin'),
                    array('login', 'email', 'on'=>'create_admin, update_admin'),
                    array('login', 'length', 'max'=>64, 'on'=>'create_admin, update_admin'),
                    array('password', 'length', 'min'=>6, 'max'=>16, 'on'=>'create_admin, update_admin'),
                    array('name', 'length', 'max'=>64, 'on'=>'create_admin, update_admin'),
                    array('time_rest_day1, time_rest_day2, time_rest_day3, time_rest_day4, time_rest_day5, time_rest_day6, time_rest_day7, time_work_day1, time_work_day2, time_work_day3, time_work_day4, time_work_day5, time_work_day6, time_work_day7', 'numerical', 'integerOnly'=>true, 'on'=>'create_admin, update_admin'),
            
                // search
                    array('id, login, password, role, name, date_create, time_rest_day1, time_rest_day2, time_rest_day3, time_rest_day4, time_rest_day5, time_rest_day6, time_rest_day7, time_work_day1, time_work_day2, time_work_day3, time_work_day4, time_work_day5, time_work_day6, time_work_day7', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
                'project'=>array(self::HAS_MANY, 'Project', 'user_id', 'order'=>'`id` ASC'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'login' => 'Логин / E-mail',
                'password' => 'Пароль',
                'role' => 'Роль',
                'name' => 'Имя',
                'date_create'=>'Дата создания',
                'pass'=>'Пароль',
                'passR'=>'Повтор пароля',
                'time_rest_day1' => 'Время на отдых, пн',
                'time_rest_day2' => 'Время на отдых, вт',
                'time_rest_day3' => 'Время на отдых, ср',
                'time_rest_day4' => 'Время на отдых, чт',
                'time_rest_day5' => 'Время на отдых, пт',
                'time_rest_day6' => 'Время на отдых, сб',
                'time_rest_day7' => 'Время на отдых, вс',
                'time_work_day1' => 'Время на задачи, пн',
                'time_work_day2' => 'Время на задачи, вт',
                'time_work_day3' => 'Время на задачи, ср',
                'time_work_day4' => 'Время на задачи, чт',
                'time_work_day5' => 'Время на задачи, пт',
                'time_work_day6' => 'Время на задачи, сб',
                'time_work_day7' => 'Время на задачи, вс',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id,true);         
            $criteria->compare('login',$this->login,true);         
            $criteria->compare('password',$this->password,true);         
            $criteria->compare('role',$this->role);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('time_rest_day1',$this->time_rest_day1);         
            $criteria->compare('time_rest_day2',$this->time_rest_day2);         
            $criteria->compare('time_rest_day3',$this->time_rest_day3);         
            $criteria->compare('time_rest_day4',$this->time_rest_day4);         
            $criteria->compare('time_rest_day5',$this->time_rest_day5);         
            $criteria->compare('time_rest_day6',$this->time_rest_day6);         
            $criteria->compare('time_rest_day7',$this->time_rest_day7);         
            $criteria->compare('time_work_day1',$this->time_work_day1);         
            $criteria->compare('time_work_day2',$this->time_work_day2);         
            $criteria->compare('time_work_day3',$this->time_work_day3);         
            $criteria->compare('time_work_day4',$this->time_work_day4);         
            $criteria->compare('time_work_day5',$this->time_work_day5);         
            $criteria->compare('time_work_day6',$this->time_work_day6);         
            $criteria->compare('time_work_day7',$this->time_work_day7);         

            $dataProvider = new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));

            $dataProvider->sort->defaultOrder = '`id` DESC';

            return $dataProvider;
	}


	public static function model($className=__CLASS__)
	{
            return parent::model($className);
	}
        
        
        public function authenticate($attribute, $params)
	{
            if( !$this->hasErrors() ) {
                $this->_identity = new UserIdentity($this->login, $this->password);
                if( !$this->_identity->authenticate() ) {
                    $this->addError('password', 'Неверный логин или пароль.');
                }
            }
	}


	public function login()
	{
            if ( $this->_identity===null ) {
                $this->_identity=new UserIdentity($this->login, $this->password);
                $this->_identity->authenticate();
            }
            if ( $this->_identity->errorCode===UserIdentity::ERROR_NONE ) {
                $duration = 3600*24*30;
                Yii::app()->user->login($this->_identity, $duration);
                /*User::model()->updateByPk(Yii::app()->user->id, array(
                    'date_last_login'=>time(),
                ));*/
                return true;
            }
            else {
                return false;
            }
	}
        
        
        public function get_role()
        {
            return self::$roles[$this->role];
        }
        
        
        public function signup()
        {
            $this->password = CPasswordHelper::hashPassword($this->pass);
            $this->date_create = time();
            if ( $this->save(false) ) {
               
                $db = Yii::app()->db->createCommand();
                $db->insert('taskm_direction', array(
                    'user_id'=>$this->id,
                    'name'=>'Саморазвитие',
                ));
                $db->insert('taskm_direction', array(
                    'user_id'=>$this->id,
                    'name'=>'Здоровье',
                ));
                $db->insert('taskm_direction', array(
                    'user_id'=>$this->id,
                    'name'=>'Семья',
                ));
                $db->insert('taskm_direction', array(
                    'user_id'=>$this->id,
                    'name'=>'Текущий заработок',
                ));
                $db->insert('taskm_direction', array(
                    'user_id'=>$this->id,
                    'name'=>'Путешествия',
                ));
                
                return true;
            } else {
                return false;
            }
        }
        
        
        public function get_name()
        {
            return ( strlen($this->name)!=0 ) ? $this->name : $this->login;
        }
        
        
        public function get_hoursAtDay($dayOfWeek=null)
        {
            $projects = $this->project;
            $result = 0;
            foreach ( $projects as $row ) {
                if ( $dayOfWeek!=null ) {
                    $temp = 'day'.$dayOfWeek;
                    $result += $row->$temp;
                } else {
                    $result += $row->day1;
                    $result += $row->day2;
                    $result += $row->day3;
                    $result += $row->day4;
                    $result += $row->day5;
                    $result += $row->day6;
                    $result += $row->day7;
                }
            }
            return $result;
        }
        
        
        public function get_timeAllDays()
        {
            return $this->time_work_day1+$this->time_work_day2+$this->time_work_day3+$this->time_work_day4+$this->time_work_day5+$this->time_work_day6+$this->time_work_day7;
        }
        public function get_timeAllDays_rest()
        {
            return $this->time_rest_day1+$this->time_rest_day2+$this->time_rest_day3+$this->time_rest_day4+$this->time_rest_day5+$this->time_rest_day6+$this->time_rest_day7;
        }
        public function get_timeAllDays_sleep()
        {
            return 24*7-($this->_timeAllDays+$this->_timeAllDays_rest);
        }
        
        
        public function update_user()
        {
            if ( strlen($this->pass)!=0 ) {
                $this->password = CPasswordHelper::hashPassword($this->pass);
            }
            if ( $this->save(false) ) {
                return true;
            } else {
                return false;
            }
        }
        
        
        public function get_projects()
        {
            $result = array();
            $projects = $this->project;
            foreach ( $projects as $row ) {
                //$result[$row->id] = $row->name;
                $result[$row->id] = array(
                    'name'=>$row->name,
                    'color'=>$row->color->rgb,
                );
            }
            
            return $result;
        }
        
        
        public function pre_admin()
        {
            $this->password = null;
        }
        public function create_admin()
        {
            $this->date_create = time();
            $this->password = CPasswordHelper::hashPassword($this->password);
            if ( $this->save(false) ) {
                return true;
            } else {
                return false;
            }
        }
        public function update_admin()
        {
            if ( strlen($this->password)!=0 ) {
                $this->password = CPasswordHelper::hashPassword($this->password);
            }
            if ( $this->save(false) ) {
                return true;
            } else {
                return false;
            }
        }
        
        
        public static function items()
        {            
            $result = array(
                //''=>'',
            );
            $criteria = new CDbCriteria;
            //$criteria->compare('role', $role);
            $criteria->order = '`login` ASC';
            $values = self::model()->findAll($criteria);
            
            foreach ( $values as $value ) {
                $result[$value->id] = $value->login;
            }
            
            return $result;
        }
}
