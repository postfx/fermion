<?php
    $c = $this->config;
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="key-icon"></i> <span>Восстановление пароля</span>
        </div>
    </div>
    <div class="page-content-wrap">
        
            <?php if ( Yii::app()->user->getFlash('recovery_success')!==true ): ?>
                <?php if ( $c['recoveryPassEmail'] || /*$c['recoveryPassEmail']*/0 ): ?>
                    <div class="recovery-form">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'action'=>array('site/recovery'),
                            'id'=>'recovery-form',
                            'enableAjaxValidation'=>true,
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                'validateOnChange'=>false,
                                'validateOnSubmit'=>true,
                                /*'afterValidate'=>'js:function(form, data, hasError){
                                    if ( !hasError ) {

                                        $.ajax({
                                            type: "POST",
                                            url: form[0].action,
                                            data: $(form).serialize(),
                                            success: function(ret) {
                                                if ( ret==1 ) {

                                                } else {
                                                    alert("Неизвестная ошибка. Повторите позже или обратитесь в поддержку.");
                                                }
                                                location = location;
                                            }
                                        });

                                        return false;
                                    }
                                }',*/
                            ),
                            'htmlOptions'=>array(
                                //'enctype'=>'multipart/form-data',
                                'class'=>'custom-form',
                            ),
                        )); ?>

                            <?php if ( $c['recoveryPassEmail'] ): ?>
                                <div>
                                    <label class="form-text" for="User_login">
                                        Введите email, указанный при регистрации
                                    </label>
                                    <?= $form->textField($model, 'login', array(
                                        'placeHolder'=>$model->getAttributeLabel('login'),
                                    )) ?>
                                    <?= $form->error($model, 'login') ?>
                                </div>
                            <?php endif; ?>

                            <!-- todo for phone -->

                            <div>
                                <?= CHtml::submitButton('Продолжить', array(
                                    'class'=>'custom-btn-gray',
                                )) ?>
                            </div>
                        </div>
                    <?php $this->endWidget(); ?>

                <?php else: ?>

                    <div class="error-text">
                        Функция восстановления пароля недоступна.
                    </div>

                <?php endif; ?>
            <?php else: ?>
                        
                <div class="success-wrap clearfix">
                    <div class="success-content">
                        <div class="success-text">
                            <p>
                                На указанную вами почту было выслано письмо с ссылкой для установки нового пароля.
                            </p>
                        </div>
                    </div>
                    <img src="/images/content/success.jpg" class="success-img">
                </div>
                    
            <?php endif; ?>
            <!--form method="post" action="" class="custom-form">
                <div>
                    <label class="form-text">
                        Введите email, указанный при регистрации
                    </label>
                    <input type="text" name="email">
                </div>
                <div>
                    <label class="form-text">
                        Введите номер телефона
                    </label>
                    <input type="text" name="phone">
                </div>
                <div>
                    <a href="javascript:void(0)" class="custom-btn-gray">Продолжить</a>
                </div>
            </form-->
        
    </div>
</div>