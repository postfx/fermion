<?php
    $product = $data->product;
?>
<tr>
    <td class="product-td-img">
        <table class="va ta">
            <tr><td>
                <?= CHtml::link($product->_img, array('/site/product', 'id'=>$product->id), array(
                    'class'=>'fa_basket_link_img',
                )) ?>
            </td></tr>
        </table>
    </td>
    <td class="product-td-title">
        <?= CHtml::link($product->name, array('/site/product', 'id'=>$product->id)) ?>
    </td>
    <td class="product-td-price">
        <span><?= $data->price ?></span> руб.
    </td>
    <td>
        <div class="counts clearfix">
            <input name="minus" class="minus" value="-" type="button" data-id="<?= $data->id ?>">
            <input name="count" class="count" value="<?= $data->count ?>" readonly="" type="text">
            <input name="plus" class="plus" value="+" type="button" data-id="<?= $data->id ?>">
        </div>
    </td>
    <td class="product-td-price-rez">
        <span><?= $data->price*$data->count ?></span> руб.
    </td>
    <td class="btn-td">
        <a href="javascript:void(0)" class="remove-from-basket" data-id="<?= $data->id ?>">удалить</a>
    </td>
</tr>