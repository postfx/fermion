<div class="container">
    <div class="page-content-wrap">
        <div class="product-card">
            <div class="product-card-main-block clearfix">
                <div class="product-main-img">
                    <?= $model->get_img('img-responsive') ?>
                </div>
                <div class="product-main-info">
                    <div class="product-main-title">
                        <?= CHtml::encode($model->name) ?>
                    </div>
                    <div class="product-id">
                        Артикул: <?= CHtml::encode($model->article) ?>
                    </div>
                    <div>
                        <div class="main-price-block">
                            цена <span class="price-val"><?= $model->_price ?> руб</span>
                        </div>
                    </div>
                    <div class="product-main-actions clearfix">
                        <div class="social-share">
                            <div class="social-share-text">
                                Рассказать другу о товаре:
                            </div>
                            <div class="social-share-links">
                                <script type="text/javascript">(function() {
                                if (window.pluso)if (typeof window.pluso.start == "function") return;
                                if (window.ifpluso==undefined) { window.ifpluso = 1;
                                  var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                                  s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                                  s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                                  var h=d[g]('body')[0];
                                  h.appendChild(s);
                                }})();</script>
                                <div class="pluso" data-background="transparent" data-options="medium,square,line,horizontal,nocounter,theme=04" data-services="vkontakte,odnoklassniki,moimir,google,email,print"></div>
                            </div>
                        </div>
                        <div class="products-actions">
                            <div class="counts clearfix">
                                <input name="minus" class="minus" value="-" type="button">
                                <input name="count" class="count" value="<?= $model->countBasket ?>" readonly="" type="text">
                                <input name="plus" class="plus" value="+" type="button">
                            </div>
                            <a href="javascript:void(0)" class="add-basket" data-id="<?= $model->id ?>">В корзину</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="product-tabs-info tabs-container">
                <ul class="tabs">
                    <li class="tab-current"><a>Описание</a></li>
                    <?php if ( strlen($model->ingredients)!=0 ): ?>
                        <li class=""><a>Активные ингридиенты</a></li>
                    <?php endif; ?>
                    <?php if ( strlen($model->structure)!=0 ): ?>
                        <li class=""><a>Состав</a></li>
                    <?php endif; ?>
                    <li class=""><a>Отзывы (<?= '4' /* todo */ ?>)</a></li>
                </ul>
                <div>
                    <div class="tab-content">
                        <?= $model->text ?>
                    </div>
                    <?php if ( strlen($model->ingredients)!=0 ): ?>
                        <div class="tab-content">
                            <?= $model->ingredients ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( strlen($model->structure)!=0 ): ?>
                        <div class="tab-content">
                            <?= $model->structure ?>
                        </div>
                    <?php endif; ?>
                    <div class="tab-content">
                        <!-- todo -->
                        <div class="reviews-list">
                            <div class="reviews-item reviews-text-item clearfix">
                                <div class="reviews-img-wrap clearfix">
                                    <div class="articles-item-create">
                                        <div class="articles-item-create-day">15</div>
                                        <div class="articles-item-create-month">нояб</div>
                                    </div>
                                    <img src="/images/content/review-1.jpg">
                                </div>
                                <div class="reviews-content">
                                    <div class="reviews-name">
                                        Махаева Гульмира Аманжоловна, г.Темиртау:
                                    </div>
                                    <div class="reviews-quote">
                                        «Знакомая история. Нужно только удалять хирургическим путем»
                                    </div>
                                    <div class="reviews-detail-wrap">
                                        <div class="reviews-category">
                                            категории: <a href="javascript:void(0)">фальтонэ</a>
                                        </div>
                                        <div class="review-sec-sep"></div>
                                        <div class="reviews-keywords">
                                            ключевые слова: <a href="javascript:void(0)">уплотнение</a>, <a href="javascript:void(0)">воспаление лимфоузла</a>, <a href="javascript:void(0)">фальтонэ</a>
                                        </div>
                                    </div>
                                    <div class="review-text-descr">
                                        В июне 2014г. я заметила у себя на правой части лица чуть ниже уха небольшое уплотнение. Стала замечать, что уплотнение постепенно увеличивается. Когда его диаметр достиг уже 3 см, я обратилась к врачам. <a href="javascript:void(0)" class="news-detail">подробнее</a>
                                    </div>

                                </div>
                            </div>
                            <div class="reviews-item reviews-video-item clearfix">
                                <div class="reviews-video-wrap">
                                    <iframe width="670" height="370" src="https://www.youtube.com/embed/4ygMTp2aM8M" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="reviews-content">
                                    <div class="reviews-name">
                                        Фамилия Имя Отчество, г. Город:
                                    </div>
                                    <div class="reviews-quote">
                                        «Цитата радостного отзыва из видео. Фрагмент
                                        отзыва из видео. Цитата из видеоотзыва»
                                    </div>
                                    <div class="reviews-keywords">
                                        ключевые слова: <a href="javascript:void(0)">уплотнение</a>, <a href="javascript:void(0)">воспаление лимфоузла</a>, <a href="javascript:void(0)">фальтонэ</a>
                                    </div>
                                    <div class="review-sec-sep"></div>
                                    <div class="reviews-category">
                                        категории: <a href="javascript:void(0)">фальтонэ</a>
                                    </div>
                                    <div class="review-sec-sep"></div>
                                    <div class="reviews-date">
                                        дата: <span>31 марта 2015</span>
                                    </div>
                                </div>
                            </div>
                            <div class="reviews-item reviews-text-item clearfix">
                                <div class="reviews-img-wrap clearfix">
                                    <div class="articles-item-create">
                                        <div class="articles-item-create-day">15</div>
                                        <div class="articles-item-create-month">нояб</div>
                                    </div>
                                    <img src="/images/content/review-1.jpg">
                                </div>
                                <div class="reviews-content">
                                    <div class="reviews-name">
                                        Махаева Гульмира Аманжоловна, г.Темиртау:
                                    </div>
                                    <div class="reviews-quote">
                                        «Знакомая история. Нужно только удалять хирургическим путем»
                                    </div>
                                    <div class="reviews-detail-wrap">
                                        <div class="reviews-category">
                                            категории: <a href="javascript:void(0)">фальтонэ</a>
                                        </div>
                                        <div class="review-sec-sep"></div>
                                        <div class="reviews-keywords">
                                            ключевые слова: <a href="javascript:void(0)">уплотнение</a>, <a href="javascript:void(0)">воспаление лимфоузла</a>, <a href="javascript:void(0)">фальтонэ</a>
                                        </div>
                                    </div>
                                    <div class="review-text-descr">
                                        В июне 2014г. я заметила у себя на правой части лица чуть ниже уха небольшое уплотнение. Стала замечать, что уплотнение постепенно увеличивается. Когда его диаметр достиг уже 3 см, я обратилась к врачам. <a href="javascript:void(0)" class="news-detail">подробнее</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- -->
                    </div>
                </div>

            </div>
            <div class="product-other-info clearfix">
                <!-- todo -->
                <div class="recently-products">
                    <div class="product-section-title">
                        Вы недавно смотрели
                    </div>
                    <div class="recently-product-item clearfix">
                        <div class="recently-product-img-wrap">
                            <a href="javascript:void(0)" class="recently-product-img">
                                <img src="/images/content/r-pr-1.jpg">
                            </a>
                        </div>
                        <div class="recently-product-info">
                            <div class="recently-product-title">
                                <a href="javascript:void(0)">Гель для языка</a>
                            </div>
                            <div class="recently-product-price">
                                <div>
                                    2200 руб.
                                </div>
                                <div>
                                    4600 баллов
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="recently-product-item clearfix">
                        <div class="recently-product-img-wrap">
                            <a href="javascript:void(0)" class="recently-product-img">
                                <img src="/images/content/r-pr-1.jpg">
                            </a>
                        </div>
                        <div class="recently-product-info">
                            <div class="recently-product-title">
                                <a href="javascript:void(0)">Спрей питательный для волос</a>
                            </div>
                            <div class="recently-product-price">
                                <div>
                                    2200 руб.
                                </div>
                                <div>
                                    4600 баллов
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="recently-product-item clearfix">
                        <div class="recently-product-img-wrap">
                            <a href="javascript:void(0)" class="recently-product-img">
                                <img src="/images/content/r-pr-1.jpg">
                            </a>
                        </div>
                        <div class="recently-product-info">
                            <div class="recently-product-title">
                                <a href="javascript:void(0)">Спрей питательный для волос</a>
                            </div>
                            <div class="recently-product-price">
                                <div>
                                    2200 руб.
                                </div>
                                <div>
                                    4600 баллов
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="recently-product-item clearfix">
                        <div class="recently-product-img-wrap">
                            <a href="javascript:void(0)" class="recently-product-img">
                                <img src="/images/content/r-pr-1.jpg">
                            </a>
                        </div>
                        <div class="recently-product-info">
                            <div class="recently-product-title">
                                <a href="javascript:void(0)">Спрей питательный для волос</a>
                            </div>
                            <div class="recently-product-price">
                                <div>
                                    2200 руб.
                                </div>
                                <div>
                                    4600 баллов
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="recently-product-item clearfix">
                        <div class="recently-product-img-wrap">
                            <a href="javascript:void(0)" class="recently-product-img">
                                <img src="/images/content/r-pr-1.jpg">
                            </a>
                        </div>
                        <div class="recently-product-info">
                            <div class="recently-product-title">
                                <a href="javascript:void(0)">Спрей питательный для волос</a>
                            </div>
                            <div class="recently-product-price">
                                <div>
                                    2200 руб.
                                </div>
                                <div>
                                    4600 баллов
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- -->
                <div class="product-other-right">
                    <?php if ( strlen($model->video)!=0 ): ?>
                        <div class="product-video-block">
                            <div class="product-section-title">
                                Обучающее видео
                            </div>
                            <div class="product-video-wrap">
                                <iframe width="670" height="370" src="<?= $model->video ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- todo -->
                    <div class="product-buy-with">
                        <div class="product-section-title">
                            С этим товаром покупают
                        </div>
                        <div class="product-buy-with-items clearfix">
                            <div class="product-buy-with-item">
                                <div>
                                    <a href="javascript:void(0)">
                                        <img src="/images/content/pr-b-1.jpg">
                                    </a>
                                    <div class="recently-product-title">
                                        <a href="javascript:void(0)">Спрей питательный для волос</a>
                                    </div>
                                    <div class="recently-product-price">
                                        <div>
                                            2200 руб.
                                        </div>
                                        <div>
                                            4600 баллов
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-buy-with-item">
                                <div>
                                    <a href="javascript:void(0)">
                                        <img src="/images/content/pr-b-1.jpg">
                                    </a>
                                    <div class="recently-product-title">
                                        <a href="javascript:void(0)">Спрей питательный для волос</a>
                                    </div>
                                    <div class="recently-product-price">
                                        <div>
                                            2200 руб.
                                        </div>
                                        <div>
                                            4600 баллов
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-buy-with-item">
                                <div>
                                    <a href="javascript:void(0)">
                                        <img src="/images/content/pr-b-1.jpg">
                                    </a>
                                    <div class="recently-product-title">
                                        <a href="javascript:void(0)">Спрей питательный для волос</a>
                                    </div>
                                    <div class="recently-product-price">
                                        <div>
                                            2200 руб.
                                        </div>
                                        <div>
                                            4600 баллов
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-buy-with-item">
                                <div>
                                    <a href="javascript:void(0)">
                                        <img src="/images/content/pr-b-1.jpg">
                                    </a>
                                    <div class="recently-product-title">
                                        <a href="javascript:void(0)">Спрей питательный для волос</a>
                                    </div>
                                    <div class="recently-product-price">
                                        <div>
                                            2200 руб.
                                        </div>
                                        <div>
                                            4600 баллов
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                </div>
            </div>
        </div>
    </div>
</div>