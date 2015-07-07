<?php

class ContactForm extends CFormModel
{
	public $name;
	public $email;
        public $subject;
        public $text;
        public $captcha;

	public function rules()
	{
		return array(
                    array('name, email, subject, text, captcha', 'required'),
                    array('name, email, subject', 'length', 'max'=>128),
                    array('email', 'email'),
                    array('captcha', 'captcha'),
                    array('text', 'length', 'max'=>5000),
		);
	}


	public function attributeLabels()
	{
		return array(
                    'name'=>'Ваше имя',
                    'phone'=>'Ваш email',
                    'subject'=>'Тема',
                    'text'=>'Текст',
                    'captcha'=>'Проверочный код',
		);
	}
        
        
        public function goContact()
        {
            include_once "libmail.php";
            $m = new Mail;
            $m->From($this->email.';admin@mir-it.info');
            $m->To(array('admin@mir-it.info', 'dimchazhabin@mail.ru', 'sszhukov@live.ru', 'firstalexxx@gmail.com'));
            $m->Subject($this->subject);
            $m->Body('Отправитель: '.$this->name.'. '.$this->text);
            $m->Send();
        }
}
