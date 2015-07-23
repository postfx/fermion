<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="products-icon"></i> <span>Продукция</span>
        </div>
        <?= $this->renderPartial('application.components.views.calendar') ?>
    </div>
    <div class="page-content-wrap">
        <div class="products-list">
            <div class="product-item product-item-detail clearfix">
                <div class="img-wrap">
                    <?= CHtml::image('/uploads/productCategory/preview/'.$model->img, '', array(
                        'class'=>'img-responsive',
                    )) ?>
                </div>
                <div class="item-content">
                    <div class="item-title">
                        <?= CHtml::encode($model->name) ?>
                    </div>
                    <div class="item-content-text">
                        <?= $model->desc ?>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="item-content-detail clearfix">
                    <div class="item-content-detail-text">
                        <?= $model->text ?>
                        <?= CHtml::link('Перейти в каталог продукции', array('/site/catalog', 'id'=>$model->id), array(
                            'class'=>'custom-btn-gray',
                        )) ?>
                    </div>
                    <?php if ( strlen($model->video)!=0 ): ?>
                        <div class="item-video-wrap">
                            <iframe width="540" height="400" src="<?= $model->video ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>