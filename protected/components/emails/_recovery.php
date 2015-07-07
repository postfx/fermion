<div marginheight="0" marginwidth="0" style="margin:0px;background-color:#ebedef;">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
        <tr>
            <td valign="middle" align="center" height="45">
                <p style="font:13px/24px Arial,sans-serif,Helvetica;color:#939aa4;margin:0px">
                    Здравствуйте<?= (strlen($login)!=0)?', '.$login:'' ?>.
                </p>
            </td>
        </tr>
    </table>
    
    <table align="center" width="580" cellpadding="0" cellspacing="0" style="background-color:#ffffff;border-radius:4px; border-collapse: collapse; font: 15px/20px Helvetica,Arial,sans-serif;">

        <tr>
            <td height="50" style="text-align: center; background-color: #2fa4e7;">
                <p style="font:17px/20px Helvetica,Arial,sans-serif;color:#fff;margin:0;">
                    <strong>
                        Восстановление пароля на сайте <a href="<?= Yii::app()->createAbsoluteUrl('site/index') ?>" style="color: #fff;"><?= $_SERVER['SERVER_NAME'] ?></a>.
                    </strong>
                </p>
            </td>
        </tr>
        
        <tr>
            <td>
                <ul style="padding:1em 1em 1px 3em">
                    <li style="margin-bottom:10px">
                        Ваш логин: <?= $login ?>
                    </li>
                </ul>
                <hr />
            </td>
        </tr>
        
        <tr>
            <td>
                <ul style="padding:1em 1em 1px 3em">
                    <li style="margin-bottom:10px">
                        Для восстановления пароля перейдите по ссылке: <a href="<?= $link ?>"><?= $link ?></a>.
                    </li>
                </ul>
            </td>
        </tr>
        
    </table>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
        <tr>
            <td valign="middle" align="center" height="45">
                <p style="font:13px/24px Arial,sans-serif,Helvetica;color:#939aa4;margin:0px">
                    <a href="<?= Yii::app()->createAbsoluteUrl('site/index') ?>" style="color:#939aa4;"><?= $_SERVER['SERVER_NAME'] ?></a>
                </p>
            </td>
        </tr>
    </table>
    
</div>