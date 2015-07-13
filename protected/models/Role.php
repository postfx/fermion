<?php

/**
 * This is the model class for table "role".
 *
 * The followings are the available columns in table 'role':
 * @property integer $id
 * @property integer $zIndex
 * @property string $name
 * @property string $name_genitive
 * @property integer $date_create
 * @property integer $active
 * @property string $desc
 * @property integer $opt_role_create
 * @property integer $opt_role_read
 * @property integer $opt_role_update
 * @property integer $opt_role_delete
 * @property integer $opt_user_create
 * @property integer $opt_user_read
 * @property integer $opt_user_update
 * @property integer $opt_user_delete
 */
class Role extends CActiveRecord
{
    

	public function tableName()
	{
            return 'role';
	}


	public function rules()
	{
            return array(
                array('name, name_genitive', 'required'),
                array('zIndex, active', 'numerical', 'integerOnly'=>true),
                array('name, name_genitive', 'length', 'max'=>32),
                array('desc, date_create', 'safe'),
                array(''
                    
                    . 'opt_news_create,'
                    . 'opt_news_read,'
                    . 'opt_news_update,'
                    . 'opt_news_delete,'
                    
                    . 'opt_newsCategory_create,'
                    . 'opt_newsCategory_read,'
                    . 'opt_newsCategory_update,'
                    . 'opt_newsCategory_delete,'
                    
                    . 'opt_user_create,'
                    . 'opt_user_read,'
                    . 'opt_user_update,'
                    . 'opt_user_delete,'
                    
                    . 'opt_role_create,'
                    . 'opt_role_read,'
                    . 'opt_role_update,'
                    . 'opt_role_delete'
                    
                    
                    , 'numerical', 'integerOnly'=>true),
            
                // search
                    array('id, zIndex, name, name_genitive, date_create, active, desc', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'zIndex' => 'Порядок',
                'name' => 'Название',
                'name_genitive' => 'Название (род. падеж)',
                'date_create' => 'Дата создания',
                'active' => 'Активность',
                'desc' => 'Описание',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('name_genitive',$this->name_genitive,true);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('active',$this->active);         
            $criteria->compare('desc',$this->desc,true);           

            $dataProvider = new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>10,
                ),
            ));

            $dataProvider->sort->defaultOrder = '`zIndex` ASC, `id` ASC';

            return $dataProvider;
	}


	public static function model($className=__CLASS__)
	{
            return parent::model($className);
	}
        
        
        public function getBlockUser()
        {
            return (   $this->opt_user_create || $this->opt_user_read || $this->opt_user_update || $this->opt_user_delete
                    || $this->opt_role_create || $this->opt_role_read || $this->opt_role_update || $this->opt_role_delete
                    );
        }
        public function getBlockNews()
        {
            return (   $this->opt_news_create || $this->opt_news_read || $this->opt_news_update || $this->opt_news_delete
                    || $this->opt_newsCategory_create || $this->opt_newsCategory_read || $this->opt_newsCategory_update || $this->opt_newsCategory_delete
                    );
        }
        
        
        public function get_active()
        {
            return ($this->active)?'Активная':'Неактивная';
        }
        
        
        public function getPerimssionsTable($form=null)
        {
            $data = array(
                'Категории пользователей'=>array(
                    'type'=>'0',
                    'data'=>'role',
                ),
                'Пользователи'=>array(
                    'type'=>'0',
                    'data'=>'user',
                ),
                'Категории новостей'=>array(
                    'type'=>'0',
                    'data'=>'newsCategory',
                ),
                'Новости'=>array(
                    'type'=>'0',
                    'data'=>'news',
                ),
            );
            
            $result = '<table>';
            
            foreach ( $data as $k => $v ) {
                if ( $v['type']==0 ) {
                    if ( $form!==null ) {
                        $inner = 
                            '<td>
                                <label class="checkbox-wrap permissions-check">
                                    '.$form->checkBox($this, 'opt_'.$v['data'].'_create').'
                                    Создание
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-wrap permissions-check">
                                    '.$form->checkBox($this, 'opt_'.$v['data'].'_read').'
                                    Просмотр
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-wrap permissions-check">
                                    '.$form->checkBox($this, 'opt_'.$v['data'].'_update').'
                                    Редактирование
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-wrap permissions-check">
                                    '.$form->checkBox($this, 'opt_'.$v['data'].'_delete').'
                                    Удаление
                                </label>
                            </td>';
                    } else {
                        $inner = 
                            '<td>
                                <label class="checkbox-wrap permissions-check">
                                    '.CHtml::checkBox('opt_'.$v['data'].'_create', $this->{'opt_'.$v['data'].'_create'}, array('disabled'=>'disabled')).'
                                    Создание
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-wrap permissions-check">
                                    '.CHtml::checkBox('opt_'.$v['data'].'_read', $this->{'opt_'.$v['data'].'_read'}, array('disabled'=>'disabled')).'
                                    Просмотр
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-wrap permissions-check">
                                    '.CHtml::checkBox('opt_'.$v['data'].'_update', $this->{'opt_'.$v['data'].'_update'}, array('disabled'=>'disabled')).'
                                    Редактирование
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-wrap permissions-check">
                                    '.CHtml::checkBox('opt_'.$v['data'].'_delete', $this->{'opt_'.$v['data'].'_delete'}, array('disabled'=>'disabled')).'
                                    Удаление
                                </label>
                            </td>';
                    }
                } else {
                    $inner = null;      // todo
                }
                $result .= 
                    '<tr>
                        <td>'.$k.'</td>
                        '.$inner.'
                    </tr>';
            }
            
            $result .= '</table>';
            
            return $result;
        }
        
        
        public function preSave()
        {
            if ( $this->isNewRecord ) {
                $this->date_create = time();
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
            $criteria->order = '`zIndex` ASC, `id` ASC';
            $values = self::model()->findAll($criteria);
            
            foreach ( $values as $value ) {
                //$result[$value->id] = $value->name;
                $result[] = array(
                    'id'=>$value->id,
                    'value'=>$value->name,
                );
            }
            
            return $result;
        }
}
