<?php
    $config = $this->config;
?>

<script>
    $(document).ready(function(){
        
        $('.option-radio-wrap input').styler();

        $('.option-radio-wrap input.option-radio[type="radio"]').each(function(){
            if($(this).parents('.jq-radio').hasClass('checked')){
                $(this).parents('.jq-radio.checked').parents('.option-radio-wrap').addClass('active');
            }
        });


        $('body').on("change", '.option-radio-wrap input.option-radio[type="radio"]', function(){
             $(this).parents('.function-options-section').find('.option-radio-wrap').removeClass('active');
             $(this).parents('.jq-radio.checked').parents('.option-radio-wrap').addClass('active');
        });

        $('.option-radio-wrap input.option-radio[type="checkbox"]').each(function(){
            if($(this).parents('.jq-checkbox').hasClass('checked')){
                $(this).parents('.jq-checkbox.checked').parents('.option-radio-wrap').addClass('active');
            }
        });


        $('body').on("change", '.option-radio-wrap input.option-radio[type="checkbox"]', function(){
            if($(this).parents('.jq-checkbox').hasClass('checked')){
                $(this).parents('.jq-checkbox.checked').parents('.option-radio-wrap').addClass('active');
            }else{
                $(this).parents('.jq-checkbox').parents('.option-radio-wrap').removeClass('active');
            }
        });
        
        /**/
        $('[name="reviews-enable"], [name="calendar-enable"], [name="pay-points-enable"], [name="similar-news-enable"], [name="check-product-enable"], [name="ref-enable"]').change(function(){
            var _this = $(this);
            $.ajax({
                url: '/cabinet/config/_ajax?action='+$(this).attr('name'),
                type: 'POST',
                dataType: 'json',
                data: {
                    value: ($(this).val()=='on') ? 1 : 0
                },
                success: function(data) {
                    if ( data==1 ) {
                        var ppppp = _this.parent().parent().parent().parent().parent();
                        if ( !ppppp.find('.fa_alert_saved').length ) {
                            ppppp.append('<div class="fa_alert_saved">Изменения сохранены</div>');
                        }
                        ppppp.find('.fa_alert_saved').animate({
                            opacity: 1
                        }, 300, function(){
                            setTimeout(function(__this){
                                __this.animate({
                                    opacity: 0
                                }, 300);
                            }, 4000, $(this));
                        });
                    }
                }
            });
        });
        
        $('[name="recoveryPassPhone"], [name="recoveryPassEmail"]').change(function(){
            var _this = $(this);
            $.ajax({
                url: '/cabinet/config/_ajax?action='+$(this).attr('name'),
                type: 'POST',
                dataType: 'json',
                data: {
                    value: ($(this).prop('checked')) ? 1 : 0
                },
                success: function(data) {
                    if ( data==1 ) {
                        var ppppp = _this.parent().parent().parent().parent().parent();
                        if ( !ppppp.find('.fa_alert_saved').length ) {
                            ppppp.append('<div class="fa_alert_saved">Изменения сохранены</div>');
                        }
                        ppppp.find('.fa_alert_saved').animate({
                            opacity: 1
                        }, 300, function(){
                            setTimeout(function(__this){
                                __this.animate({
                                    opacity: 0
                                }, 300);
                            }, 4000, $(this));
                        });
                    }
                }
            });
        });
        
    });
</script>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="user-icon"></i> <span>Работа с сайтом</span>
        </div>
    </div>
    <div class="full-width-content">
        <div class="options-section">
            <div class="options-section-title">
                функциональные настройки
            </div>
            <form method="post" class="function-options-list clearfix">
                <div class="function-options-col">
                    <!--div class="function-options-section options-language-section">
                        <div class="function-options-header">
                            <div>
                                Переключить язык
                            </div>

                        </div>
                        <div class="options-section-list clearfix">
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/lang-ico.png">
                                        </div>
                                        <div class="option-title">
                                            RUS
                                        </div>
                                    </div>
                                    <input type="radio" name="lang" value="ru" class="option-radio">
                                </label>



                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/lang-ico.png">
                                        </div>
                                        <div class="option-title">
                                            Eng
                                        </div>
                                    </div>
                                    <input type="radio" name="lang" value="eng" class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/lang-ico.png">
                                        </div>
                                        <div class="option-title">
                                            FR
                                        </div>
                                    </div>
                                    <input type="radio" name="lang" value="fr" class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/lang-ico.png">
                                        </div>
                                        <div class="option-title">
                                            UKR
                                        </div>
                                    </div>
                                    <input type="radio" name="lang" checked value="UKR" class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <a href="javascript:void(0)" class="add-option">
                                    <div>
                                        добавить
                                    </div>
                                    <div>
                                        <img src="/images/icons/add-ico.png">
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div-->
                    <div class="function-options-section options-reviews-section">
                        <div class="function-options-header">
                            <div>
                                Отзыв о купленном ранее товаре
                            </div>
                        </div>
                        <div class="options-section-list clearfix">
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/product-yes.png">
                                        </div>
                                        <div class="option-title">
                                            Вкл
                                        </div>
                                    </div>
                                    <input type="radio" name="reviews-enable" value="on" <?= ($config['reviews'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/product-no.png">
                                        </div>
                                        <div class="option-title">
                                            Откл
                                        </div>
                                    </div>
                                    <input type="radio" name="reviews-enable" value="off" <?= (!$config['reviews'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="function-options-col">
                    <div class="function-options-section">
                        <div class="function-options-header">
                            <div>
                                Календарь событий
                            </div>

                        </div>
                        <div class="options-section-list clearfix">
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/calendar-yes.png">
                                        </div>
                                        <div class="option-title">
                                            Вкл
                                        </div>
                                    </div>
                                    <input type="radio" name="calendar-enable" value="on" <?= ($config['eventCalendar'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/calendar-no.png">
                                        </div>
                                        <div class="option-title">
                                            Откл
                                        </div>
                                    </div>
                                    <input type="radio" name="calendar-enable" value="off" <?= (!$config['eventCalendar'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="function-options-section">
                        <div class="function-options-header">
                            <div>
                                Оплата баллами
                            </div>

                        </div>
                        <div class="options-section-list clearfix">
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/money-yes.png">
                                        </div>
                                        <div class="option-title">
                                            Вкл
                                        </div>
                                    </div>
                                    <input type="radio" name="pay-points-enable" value="on" <?= ($config['paymentPoints'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/money-no.png">
                                        </div>
                                        <div class="option-title">
                                            Откл
                                        </div>
                                    </div>
                                    <input type="radio" name="pay-points-enable" value="off" <?= (!$config['paymentPoints'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                        </div>
                    </div>
                    <!--<div class="function-options-section">
                        <div class="function-options-header">
                            <div>
                                Начисление баллов за отзыв
                            </div>

                        </div>
                        <div class="options-section-list clearfix">
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/money-yes.png">
                                        </div>
                                        <div class="option-title">
                                            Вкл
                                        </div>
                                    </div>
                                    <input type="radio" name="reviews-points-enable" value="on" checked class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/money-no.png">
                                        </div>
                                        <div class="option-title">
                                            Откл
                                        </div>
                                    </div>
                                    <input type="radio" name="reviews-points-enable" value="off" class="option-radio">
                                </label>
                            </div>
                        </div>
                    </div>-->
                </div>
                <div class="function-options-col">
                    <div class="function-options-section">
                        <div class="function-options-header">
                            <div>
                                Список похожих новостей
                            </div>

                        </div>
                        <div class="options-section-list clearfix">
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/news-yes.png">
                                        </div>
                                        <div class="option-title">
                                            Вкл
                                        </div>
                                    </div>
                                    <input type="radio" name="similar-news-enable" value="on" <?= ($config['relatedNews'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/news-no.png">
                                        </div>
                                        <div class="option-title">
                                            Откл
                                        </div>
                                    </div>
                                    <input type="radio" name="similar-news-enable" value="off" <?= (!$config['relatedNews'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                        </div>
                    </div>
                    <!--div class="function-options-section options-payment-section">
                        <div class="function-options-header">
                            <div>
                                Способы оплаты / пополнения
                            </div>

                        </div>
                        <div class="options-section-list clearfix">
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div class="option-title">
                                            Yandex Money
                                        </div>
                                    </div>
                                    <input type="checkbox" name="payment" value="ym" class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div class="option-title">
                                            RoboKassa
                                        </div>
                                    </div>
                                    <input type="checkbox" name="payment" value="rk" class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div class="option-title">
                                            WebMoney
                                        </div>
                                    </div>
                                    <input type="checkbox" name="payment" value="wm" class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div class="option-title">
                                            VISA
                                        </div>
                                    </div>
                                    <input type="checkbox" name="payment" checked value="visa" class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <a href="javascript:void(0)" class="add-option">
                                    <div>
                                        добавить
                                    </div>
                                    <div>
                                        <img src="/images/icons/add-ico.png">
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div-->
                </div>
                <div class="function-options-col">
                    <div class="function-options-section">
                        <div class="function-options-header">
                            <div class="small-font-header">
                                Обязательная проверка наличия товаров на складе
                            </div>

                        </div>
                        <div class="options-section-list clearfix">
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/check-product-yes.png">
                                        </div>
                                        <div class="option-title">
                                            Вкл
                                        </div>
                                    </div>
                                    <input type="radio" name="check-product-enable" value="on" <?= ($config['checkStockStatus'])?'checked':'' ?> class="option-radio">
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/check-product-no.png">
                                        </div>
                                        <div class="option-title">
                                            Откл
                                        </div>
                                    </div>
                                    <input type="radio" name="check-product-enable" value="off" <?= (!$config['checkStockStatus'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="function-options-section recovery-pass-section">
                        <div class="function-options-header">
                            <div>
                                Восстановление пароля
                            </div>

                        </div>
                        <div class="options-section-list clearfix">
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/phone-yes.png">
                                        </div>
                                        <div class="option-title">
                                            Телефон
                                        </div>
                                    </div>
                                    <input type="checkbox" name="recoveryPassPhone" <?= ($config['recoveryPassPhone'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/email-yes.png">
                                        </div>
                                        <div class="option-title">
                                            E-mail
                                        </div>
                                    </div>
                                    <input type="checkbox" name="recoveryPassEmail" <?= ($config['recoveryPassEmail'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="function-options-section">
                        <div class="function-options-header">
                            <div>
                                Реферальная система
                            </div>

                        </div>
                        <div class="options-section-list clearfix">
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/ref-yes.png">
                                        </div>
                                        <div class="option-title">
                                            Вкл
                                        </div>
                                    </div>
                                    <input type="radio" name="ref-enable" value="on" <?= ($config['referralSystem'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                            <div class="options-section-item">
                                <label class="option-radio-wrap">
                                    <div class="option-radio-content">
                                        <div>
                                            <img src="/images/icons/ref-no.png">
                                        </div>
                                        <div class="option-title">
                                            Откл
                                        </div>
                                    </div>
                                    <input type="radio" name="ref-enable" value="off" <?= (!$config['referralSystem'])?'checked':'' ?> class="option-radio">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>