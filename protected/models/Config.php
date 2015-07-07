<?php

/**
 * This is the model class for table "config".
 *
 * The followings are the available columns in table 'config':
 * @property integer $id
 * @property string $about
 * @property string $phone
 * @property string $phoneInfo
 * @property string $addressInfo
 * @property string $social_twitter
 * @property string $social_facebook
 * @property string $social_google
 * @property string $social_pinterest
 * @property string $social_tumblr
 * @property string $social_instagram
 * @property string $adminEmail
 * @property string $metaTitle
 * @property string $metaKeys
 * @property string $metaDesc
 * @property integer $recoveryPassPhone
 * @property integer $recoveryPassEmail
 * @property integer $paymentPoints
 * @property integer $relatedNews
 * @property integer $checkStockStatus
 * @property integer $reviews
 * @property integer $referralSystem
 */
class Config extends CActiveRecord
{
    

	public function tableName()
	{
            return 'config';
	}


	public function rules()
	{
            return array(
                array('recoveryPassPhone, recoveryPassEmail, paymentPoints, relatedNews, checkStockStatus, reviews, referralSystem', 'numerical', 'integerOnly'=>true),
                array('phone', 'length', 'max'=>16),
                array('phoneInfo, addressInfo, social_twitter, social_facebook, social_google, social_pinterest, social_tumblr, social_instagram, adminEmail, metaTitle', 'length', 'max'=>255),
                array('about, metaKeys, metaDesc', 'safe'),
            
                // search
                    array('id, about, phone, phoneInfo, addressInfo, social_twitter, social_facebook, social_google, social_pinterest, social_tumblr, social_instagram, adminEmail, metaTitle, metaKeys, metaDesc, recoveryPassPhone, recoveryPassEmail, paymentPoints, relatedNews, checkStockStatus, reviews, referralSystem', 'safe', 'on'=>'search'),
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
                'about' => 'About',
                'phone' => 'Phone',
                'phoneInfo' => 'Phone Info',
                'addressInfo' => 'Address Info',
                'social_twitter' => 'Social Twitter',
                'social_facebook' => 'Social Facebook',
                'social_google' => 'Social Google',
                'social_pinterest' => 'Social Pinterest',
                'social_tumblr' => 'Social Tumblr',
                'social_instagram' => 'Social Instagram',
                'adminEmail' => 'Admin Email',
                'metaTitle' => 'Meta Title',
                'metaKeys' => 'Meta Keys',
                'metaDesc' => 'Meta Desc',
                'recoveryPassPhone' => 'Recovery Pass Phone',
                'recoveryPassEmail' => 'Recovery Pass Email',
                'paymentPoints' => 'Payment Points',
                'relatedNews' => 'Related News',
                'checkStockStatus' => 'Check Stock Status',
                'reviews' => 'Reviews',
                'referralSystem' => 'Referral System',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('about',$this->about,true);         
            $criteria->compare('phone',$this->phone,true);         
            $criteria->compare('phoneInfo',$this->phoneInfo,true);         
            $criteria->compare('addressInfo',$this->addressInfo,true);         
            $criteria->compare('social_twitter',$this->social_twitter,true);         
            $criteria->compare('social_facebook',$this->social_facebook,true);         
            $criteria->compare('social_google',$this->social_google,true);         
            $criteria->compare('social_pinterest',$this->social_pinterest,true);         
            $criteria->compare('social_tumblr',$this->social_tumblr,true);         
            $criteria->compare('social_instagram',$this->social_instagram,true);         
            $criteria->compare('adminEmail',$this->adminEmail,true);         
            $criteria->compare('metaTitle',$this->metaTitle,true);         
            $criteria->compare('metaKeys',$this->metaKeys,true);         
            $criteria->compare('metaDesc',$this->metaDesc,true);         
            $criteria->compare('recoveryPassPhone',$this->recoveryPassPhone);         
            $criteria->compare('recoveryPassEmail',$this->recoveryPassEmail);         
            $criteria->compare('paymentPoints',$this->paymentPoints);         
            $criteria->compare('relatedNews',$this->relatedNews);         
            $criteria->compare('checkStockStatus',$this->checkStockStatus);         
            $criteria->compare('reviews',$this->reviews);         
            $criteria->compare('referralSystem',$this->referralSystem);         

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
        
        
        
}
