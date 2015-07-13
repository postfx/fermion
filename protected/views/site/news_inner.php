<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="articles-icon"></i> <a href="javascript:void(0)">Новости компании</a>
        </div>
        <?= $this->renderPartial('application.components.views.relatedNews', array(
            'category_id'=>$model->category_id,
        )) ?>
    </div>
    <div class="news-block page-content-wrap">
        <div class="news-content clearfix">
            <div class="articles-item-title">
                <?= CHtml::encode($model->title) ?>
            </div>
            <div class="articles-item-col article-img">
                <div class="articles-item-prev">
                    <div class="articles-item-create">
                        <div class="articles-item-create-day"><?= date('d', $model->date_create) ?></div>
                        <div class="articles-item-create-month"><?= Yii::app()->dateFormatter->format('MMM', $model->date_create) ?></div>
                    </div>
                    <?= (strlen($model->img)!=0) ? CHtml::image('/uploads/news/preview/'.$model->img, '', array(
                        'class'=>'img-responsive',
                    )) : '' ?>
                </div>
            </div>
            <div class="news-content-block">
                <div class="article-data">
                    <div class="article-data-col">
                        <?= CHtml::link($model->category_name, array('/site/news', 'category_id'=>$model->category_id)) ?>
                    </div>
                    <div class="article-data-col">
                        <i class="comment-ico"></i> <?= CHtml::link('Комментарии', '#comments') ?> <span>|</span> <span class="data-counts"><?= $model->countComments ?></span>
                    </div>
                    <div class="article-data-col">
                        <i class="eye-ico"></i> Просмотры <span>|</span> <span class="data-counts"><?= $model->countViews ?></span>
                    </div>
                </div>
                <div class="articles-item-descr">
                    <?= $model->text ?>
                </div>
            </div>


        </div>
        <div id="comments"></div>
        <div class="news-share-block clearfix">

            <div class="social">
                <script type="text/javascript">(function() {
                    if (window.pluso)if (typeof window.pluso.start == "function") return;
                    if (window.ifpluso==undefined) { window.ifpluso = 1;
                      var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                      s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                      s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                      var h=d[g]('body')[0];
                      h.appendChild(s);
                    }})();
                </script>
                <div class="pluso" data-background="transparent" data-options="medium,square,line,horizontal,nocounter,theme=06" data-services="facebook,twitter,linkedin,google,tumblr"></div>

            </div>
            <div class="news-share-block-title">
                Поделиться новостью
            </div>
        </div>
        
        <div class="news-comments">
            <div class="default-title">
                Коментарии (<?= $model->countComments ?>)
            </div>
            <div class="news-comments-list">
                <?php foreach ( $comments as $c ): ?>
                    <div class="news-comments-item clearfix">
                        <div class="news-comments-block">
                            <div class="news-comments-header clearfix">
                                <div class="user-name">
                                    <?= $c->user->name ?>
                                </div>
                            </div>
                            <div class="news-comments-date">
                                <?= Yii::app()->dateFormatter->format('dd MMMM yyyy, HH:mm', $c->date_create) ?>
                            </div>
                            <div class="news-comments-text">
                                <?= CHtml::encode($c->text) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if ( !Yii::app()->user->isGuest ): ?>
                <div class="comment-form-wrap">
                    <div class="default-title">
                        Оставить комментарий
                    </div>
                    <div class="comment-form">

                        <?php if ( Yii::app()->user->getFlash('comment_success') ): ?>

                            <div class="success-message">
                                <p>Спасибо за Ваш комментарий.</p>
                            </div>

                        <?php else: ?>

                            <?php $form=$this->beginWidget('CActiveForm', array(
                                //'action'=>array('site/signup'),
                                'id'=>'newsComment-form',
                                //'focus'=>array($comment,'text'),
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
                                ),
                            )); ?>

                                <div class="form-row clearfix">
                                    <?= $form->textArea($comment, 'text', array(
                                        'placeHolder'=>$comment->getAttributeLabel('text'),
                                    )) ?>
                                </div>
                                <div class="form-row clearfix">
                                    <button type="submit">Отправить</button>
                                </div>

                            <?php $this->endWidget(); ?>

                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>