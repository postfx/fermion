				<div class="container">
                    <div class="clearfix">
                        <div class="section-title">
                            <i class="people-icon"></i> <span>Регистрация</span>
                        </div>
                    </div>
                    <div class="page-content-wrap border-left-wrap">
                        <?php $form = $this->beginWidget("CActiveForm", array("enableAjaxValidation" => true, "clientOptions" => array("validateOnSubmit" => true), "id"=>"register-form")); ?>
                        	<?php if ($step == 2):?>
                            <div class="reg-section">
                                <!--<div class="overlayer"></div>-->
                                <div class="reg-section-title">
                                    шаг 2
                                </div>
                                <?php if (!empty($userSaveError)):?>
                                <div class="error-message">
                                    <a href="javascript:void(0)" class="close-message"></a>
                                    <div class="error-default-text">
                                        <?php echo $userSaveError; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="enter-section-text">
                                    поля помеченные  <span>*</span> , обязательны для заполнения
                                </div>
                                <div class="clearfix">
                                    <div class="reg-col">
                                        <div class="col-title">
                                            Паспортные данные
                                        </div>
                                        <div class="reg-field">
                                            <label>ФИО <span>*</span></label>
                                            <?php echo $form->textField($model, "username", array("placeholder"=>$model->getAttributeLabel("username"))); ?>
								            <?php echo $form->error($model, "username"); ?>
                                        </div>
                                        <div class="reg-field">
                                            <label>Дата рождения <span>*</span></label>
                                            <div class="clearfix">
                                                <i class="event-reg-icon"></i>
                                                <?php echo $form->textField($model, "birthday", array("placeholder"=>$model->getAttributeLabel("birthday"), "class"=>"datepicker-birth")); ?>
									            <?php echo $form->error($model, "birthday"); ?>
                                            </div>

                                        </div>
                                        <div class="reg-field">
                                            <label>Серия и № паспорта <span>*</span></label>
                                            <?php echo $form->textField($model, "passport_num", array("placeholder"=>$model->getAttributeLabel("passport_num"))); ?>
								            <?php echo $form->error($model, "passport_num"); ?>
                                        </div>
                                        <div class="reg-field">
                                            <label>Дата выдачи <span>*</span></label>
                                            <div class="clearfix">
                                                <i class="event-reg-icon"></i>
                                                <?php echo $form->textField($model, "passport_date", array("placeholder"=>$model->getAttributeLabel("passport_date"), "class"=>"datepicker-pass")); ?>
									            <?php echo $form->error($model, "passport_date"); ?>
                                            </div>

                                        </div>
                                        <div class="reg-field">
                                            <label>Кем выдан <span>*</span></label>
                                            <?php echo $form->textField($model, "passport_org", array("placeholder"=>$model->getAttributeLabel("passport_org"))); ?>
								            <?php echo $form->error($model, "passport_org"); ?>
                                        </div>
                                    </div>
                                    <div class="reg-col">
                                        <div class="col-title">
                                            Место проживания
                                        </div>
                                        <div class="reg-field data-header">
                                            <label>Страна <span>*</span></label>
                                            <div class="select-wrap">
                                            	<?php echo $form->dropDownList($model, "country_id", CHtml::listData(BglGeoCountry::model()->findAll('id=3159'), 'id', 'name')); ?>
                                            	<?php echo $form->error($model, "country_id"); ?>
                                            </div>
                                        </div>
                                        <div class="reg-field data-header">
                                            <label>Область</label>
                                            <div class="select-wrap">
                                            	<?php echo $form->dropDownList($model, "region_id", array(''=>'') + CHtml::listData(BglGeoRegion::model()->findAll('countryid=3159'), 'id', 'name')); ?>
                                            	<?php echo $form->error($model, "region_id"); ?>
                                            </div>
                                        </div>
                                        <div class="reg-field data-header">
                                            <label>Город</label>
                                            <div class="select-wrap">
                                            	<?php echo $form->dropDownList($model, "city_id", array()); ?>
                                            	<?php echo $form->error($model, "city_id"); ?>
                                            </div>
                                        </div>
                                        <div class="reg-field">
                                            <label>Индекс <span>*</span></label>
                                            <?php echo $form->textField($model, "post_index", array("placeholder"=>$model->getAttributeLabel("post_index"))); ?>
								            <?php echo $form->error($model, "post_index"); ?>
                                        </div>
                                        <div class="reg-field">
                                            <label>Улица, дом, квартира</label>
                                            <?php echo $form->textField($model, "address", array("placeholder"=>$model->getAttributeLabel("address"))); ?>
								            <?php echo $form->error($model, "address"); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="reg-col">
                                    <div class="col-title">
                                        Контактные данные
                                    </div>
                                    <div class="reg-field">
                                        <label>Мобильный телефон</label>
                                        <?php echo $form->textField($model, "mobile_phone", array("placeholder"=>$model->getAttributeLabel("mobile_phone"))); ?>
								        <?php echo $form->error($model, "mobile_phone"); ?>
                                    </div>
                                    <div class="reg-field">
                                        <label>Городской телефон</label>
                                        <?php echo $form->textField($model, "phone", array("placeholder"=>$model->getAttributeLabel("phone"))); ?>
								        <?php echo $form->error($model, "phone"); ?>
                                    </div>
                                    <div class="reg-field">
                                        <label>Электронная почта</label>
                                        <?php echo $form->textField($model, "email", array("placeholder"=>$model->getAttributeLabel("email"))); ?>
								        <?php echo $form->error($model, "email"); ?>
                                    </div>
                                </div>
                                <div class="reg-col">
                                    <div class="col-title">
                                        Данные для сайта
                                    </div>
                                    <div class="reg-field">
                                        <label>Придумайте пароль</label>
                                        <?php echo $form->passwordField($model, "password", array("placeholder"=>$model->getAttributeLabel("password"))); ?>
							            <?php echo $form->error($model, "password"); ?>
                                    </div>
                                    <div class="reg-field">
                                        <label>Подтвердите пароль</label>
                                        <?php echo $form->passwordField($model, "password_repeat", array("placeholder"=>$model->getAttributeLabel("password_repeat"))); ?>
							            <?php echo $form->error($model, "password_repeat"); ?>
                                    </div>
                                </div>
                                <?php echo CHtml::submitButton("Регистрация", array("class" => "custom-btn-gray")); ?>
                            </div>
							<?php else: ?>
							<div class="reg-section">
                                <div class="reg-section-title">
                                    шаг 1
                                </div>
                                <div class="enter-section-text">
                                    Введите номер договора (ID) консультанта, который дал вам рекомендацию.<br>
                                    Если вы зашли на сайт самостоятельно, позвоните в Компанию по бесплатному номеру  8 (800) 2000-420
                                </div>
                                <div class="reg-field">
                                    <?php echo $form->textField($model, "referrer_id", array("placeholder"=>$model->getAttributeLabel("referrer_id"))); ?>
						            <?php echo $form->error($model, "referrer_id"); ?>
                                </div>
                                <?php echo CHtml::submitButton("Продолжить", array("class" => "custom-btn-gray reg-continue")); ?>
                            </div>
                            <?php endif; ?>
						<?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>