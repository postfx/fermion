<?php
    $callback = $_GET['CKEditorFuncNum'];
    $dir = dirname(__FILE__).'/../../uploads/ckeditor/';
    
    $imageExtention = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    $imageName      = substr(md5($_FILES['upload']['name'].microtime()), 0, 28).'.'.$imageExtention;
    
    $full_path = $dir.$imageName;
    $http_path = '/uploads/ckeditor/'.$imageName;
    $error = '';
    if( move_uploaded_file($_FILES['upload']['tmp_name'], $full_path) ) {
    } else {
        $error = 'error!';
        $http_path = '';
    }
    echo "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(".$callback.
    ",\"".$http_path."\", \"".$error."\" );</script>";
?>