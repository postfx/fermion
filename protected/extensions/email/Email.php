<?php

class Email extends CApplicationComponent {
	
    public $to;
    public $from;
    public $subject;
    public $view;
    public $viewVars;
    public $real;
    
    public function mime_header_encode($str)
    {
        $str=iconv('UTF-8', 'windows-1251'.'//IGNORE', $str);
        
        return ('=?windows-1251?B?'.base64_encode($str).'?=');
    }
    
    public function getHeaders()
    {
        $headers = "";
        $headers .= "Mime-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=windows-1251\r\n";
        if ( $this->from!==null && $this->real!==null )
            $headers .= "From: ".$this->from." <".$this->real.">\r\n";
        
        return $headers;
    }
    
    public function getMessage()
    {
        return Yii::app()->controller->renderPartial('application.views.email.'.$this->view, $this->viewVars, true);
    }
    
    public function send()
    {
        mail($this->to, $this->mime_header_encode($this->subject), iconv('UTF-8', 'windows-1251'.'//IGNORE', $this->message), $this->headers);
    }
    
}