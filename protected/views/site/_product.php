<div class="product-catalogue-item clearfix">
    <?= CHtml::link($data->get_img('img-responsive'), array('/site/product', 'id'=>$data->id), array(
        'class'=>'product-prev',
    )) ?>
    <div class="product-content">
        
        <div class="product-content-main">
            <div class="product-title">
                <?= CHtml::link(CHtml::encode($data->name), array('/site/product', 'id'=>$data->id)) ?>
            </div>
            <div class="product-price">
                <?= $data->_price ?> руб
                <?= ($data->points>0) ? '<span>баллов при покупке: '.$data->points.'</span>' : '' ?>
            </div>
            <div class="sep"></div>
        </div>

        <div class="product-descr">
            <?= $data->desc ?>
        </div>
        
        <div class="products-actions">
            <div class="counts clearfix">
                <input name="minus" class="minus" value="-" type="button">
                <input name="count" class="count" value="<?= $data->countBasket ?>" readonly="" type="text">
                <input name="plus" class="plus" value="+" type="button">
            </div>
            <a href="javascript:void(0)" class="add-basket" data-id="<?= $data->id ?>"><span class="fa_spec_product">Добавить </span>в корзину</a>
        </div>
        
    </div>
</div>