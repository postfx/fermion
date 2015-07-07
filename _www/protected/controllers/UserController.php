<?php

class UserController extends Controller
{
	public function actionRegister()
	{
		$step = Yii::app()->request->getQuery('step', 1);
		if ($step == 2 && !Yii::app()->user->hasState('referrer_id'))
			$this->redirect(array('user/register'));

		$model = new RegisterFormStep1;
		if ($step == 2)
			$model = new RegisterFormStep2;

		if (isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if (isset($_POST['RegisterFormStep1']))
		{
			$model->attributes = $_POST['RegisterFormStep1'];
			Yii::app()->user->setState('referrer_id', $model->referrer_id);
			$this->redirect(array('user/register', 'step'=>'2'));
		}

		if (isset($_POST['RegisterFormStep2']))
		{
			$model->attributes = $_POST['RegisterFormStep2'];

			if ($model->validate()) {

				$user = new Users;

				$user->status = 0;
				$user->username = $model->username;
				$user->email = $model->email;				

				$user->hash = md5($user->email.uniqid());
				$user->userkey = sha1($user->email.uniqid());
            	$user->password = md5($model->password.$user->hash);
            	$user->city_id = $model->city_id;
            	$user->birthday = date("Y-m-d", strtotime($model->birthday));
            	$user->passport_num = $model->passport_num;
            	$user->passport_date = date("Y-m-d", strtotime($model->passport_date));
            	$user->passport_org = $model->passport_org;
            	$user->post_index = $model->post_index;
            	$user->address = $model->address;
            	$user->phone = $model->phone;
            	$user->mobile_phone = $model->mobile_phone;
            	$user->referrer_id = Yii::app()->user->getState('referrer_id');

				if ($user->save()) {

					$message = $this->renderPartial('/messages/register', array(
						"username" => $model->username,
						"link" => CHtml::link($this->createAbsoluteUrl("user/activate", array("userkey" => $user->userkey)), $this->createAbsoluteUrl("user/activate", array("userkey" => $user->userkey))),
					), true);

	                MyPhpMailer::send($user->email, "Регистрация на FermionAm.ru", $message);
	                Yii::app()->user->setState('referrer_id', NULL);
	                $this->redirect(array('site/index'));

				} else {
					$userSaveError = CHtml::errorSummary($user);
				}
			} else {
				$userSaveError = CHtml::errorSummary($model);
			}
		}

		$this->render('register', array(
			'step' => $step,
			'model' => $model,
			'userSaveError' => $userSaveError,
		));
	}

	public function actionActivate($userkey)
	{
        $model = Users::model()->findByAttributes(array(
            'userkey' => $userkey
        ));

        if (!$model) {
        	$this->redirect(array('site/index'));
		}

		$model->status = 1;

        if ($model->save()) {
        	$identity = new UserActivateIdentity($model->email, '');
			$identity->authenticate();
			$duration = 3600*24*30;
			Yii::app()->user->login($identity, $duration);
		}

        $this->redirect(array('site/index'));
    }

    public function actionRecover()
	{
		$model = new RecoverForm;

		if (isset($_POST['ajax']) && $_POST['ajax']==='recover-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if (isset($_POST['RecoverForm']))
		{
			$model->attributes = $_POST['RecoverForm'];

			if ($model->validate()) {

				$user = Users::model()->findByAttributes(array("email"=>$model->email));

				$password = md5(uniqid());

				$user->hash = md5($user->email.uniqid());
				$user->userkey = sha1($user->email.uniqid());
            	$user->password = md5($password.$user->hash);

				if ($user->save()) {

					$message = $this->renderPartial('/messages/recover', array(
						"username" => $user->username,
						"password" => $password,
					), true);

	                MyPhpMailer::send($user->email, "Восстановление пароля на FermionAm.ru", $message);
	                $this->redirect(array('site/index'));

				} else {
					print(CHtml::errorSummary($user));
					Yii::app()->end();
				}
			} else {
				print(CHtml::errorSummary($model));
				Yii::app()->end();
			}
		}

		$this->render('recover', array(
			'model' => $model,
		));
    }
}