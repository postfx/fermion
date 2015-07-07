<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionIndex()
	{
		$this->render('index', array(
		));
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionSubscript()
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='subscription-form')
		{
			echo CActiveForm::validate($this->subscription_form);
			Yii::app()->end();
		}

		if (isset($_POST['SubscriptionForm']))
		{
			$this->subscription_form->attributes = $_POST['SubscriptionForm'];

			if ($this->subscription_form->validate()) {

				$s = Subscriptions::model()->findByAttributes(array('email'=>$this->subscription_form->email));
				if ($s) {

					// message, already in list

					$this->redirect(array('site/index'));

				} else {

					$s = new Subscriptions;
					$s->email = $this->subscription_form->email;
					$s->save();

					$this->redirect(array('site/index'));
					
					// message, success
				}
			}
		}
	}

}