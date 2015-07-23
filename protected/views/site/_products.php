<div class="product-item clearfix">
    <div class="img-wrap">
        <?= CHtml::image('/uploads/productCategory/preview/'.$data->img, '', array(
            'class'=>'img-responsive',
        )) ?>
    </div>
    <div class="item-content">
        <div class="item-title">
            <?= CHtml::encode($data->name) ?>
        </div>
        <div class="item-content-text">
            <?= $data->desc ?>
        </div>
        <?= CHtml::link('подробнее', array('/site/products', 'id'=>$data->id), array(
            'class'=>'item-detail',
        )) ?>
    </div>
</div>