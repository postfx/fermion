				<div class="container">
                    <div class="clearfix">
                        <div class="section-title">
                            <i class="key-icon"></i> <span>Восстановление пароля</span>
                        </div>
                    </div>
                    <div class="page-content-wrap">
                        <div class="recovery-form">
                            <?php $form = $this->beginWidget("CActiveForm", array("enableAjaxValidation" => true, "clientOptions" => array("validateOnSubmit" => true), "htmlOptions"=>array("class" => "custom-form"), "id"=>"recover-form")); ?>
                                <div>
                                    <label class="form-text">
                                        Введите email, указанный при регистрации
                                    </label>
                                    <div>
	                                    <?php echo $form->textField($model, "email", array("placeholder"=>$model->getAttributeLabel("email"))); ?>
								        <?php echo $form->error($model, "email"); ?>
									</div>
                                </div>
                                <!--<div>
                                    <label class="form-text">
                                        Введите номер телефона
                                    </label>
                                    <input type="text" name="phone">
                                </div>-->
                                <div>
                                    <?php echo CHtml::submitButton("Продолжить", array("class" => "custom-btn-gray")); ?>
                                </div>
	                        <?php $this->endWidget(); ?>
                        </div>
                    </div>
                </div>