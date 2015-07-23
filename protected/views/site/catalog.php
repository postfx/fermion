<?php
    $pageSize = ( Yii::app()->request->cookies['pageSize_product']->value!==null ) ? (int)Yii::app()->request->cookies['pageSize_product']->value : 8;
?>

<script>
    $(document).ready(function(){
        
        render_pageSizeBlock();
        
        $('#category_id, #deliveryType').change(function(){
            /*$('#product-list').yiiListView('update', {
                data: {
                    category_id: $('#category_id').val(),
                    deliveryType: $('#deliveryType').val(),
                }
            });*/
            $.fn.yiiListView.update('product-list', {
                data: {
                    'Product[category_id]': $('#category_id').val(),
                    'Product[deliveryType]': $('#deliveryType').val(),
                }
            });
        });
        
        $('.order-view-filter a').on('click', function () {

            if ( !$(this).hasClass('active') ){
                $('.order-view-filter a').removeClass('active');
                if($(this).hasClass('quick-order-link')){
                    $('.products-list').addClass('quick-order');
                    $('.product-catalogue-item .add-basket').text('В корзину');
                }else{
                    $('.products-list').removeClass('quick-order');
                    $('.product-catalogue-item .add-basket').text('Добавить в корзину');
                }
                $(this).addClass('active');
            }
            
        });
        
        $('[name="radio_counts"]').change(function(){
            $.cookie('pageSize_product', $(this).val(), { path: '/', expires: 30 });
            $.fn.yiiListView.update('product-list');
        });
        
    });
    
//    function render_pageSizeBlock()
//    {
//        $('.list-view .items').after('<div class="filter-counts">'+$('.filter-counts').html()+'</div>');
//        
//        $('[name="radio_counts"]').change(function(){
//            $('.filter-counts.hidden input[name="radio_counts"]').prop('checked', false);
//            $('.filter-counts.hidden input[value="'+$(this).val()+'"]').prop('checked', true);
//            $('[name="radio_counts"]').trigger('refresh');
//            $.cookie('pageSize_product', $(this).val(), { path: '/', expires: 30 });
//            $.fn.yiiListView.update('product-list');
//        });
//    }

    function render_pageSizeBlock()
    {
        if ( !$('.list-view .items > div').length ) {
            $('.filter-counts-product-list').addClass('hidden');
        } else {
            $('.filter-counts-product-list').removeClass('hidden');
        }
        if ( $('.list-view .yiiPager').length ) {
            $('.filter-counts-product-list').css({
                top: -46
            });
        } else {
            $('.filter-counts-product-list').css({
                top: -6
            });
        }
    }
    
    
    function processCount()
    {
        $('.counts .minus').click(function(){
            var current = $(this).siblings('.count').val();
            if(current != 1){
                current--;
                $(this).siblings('.count').val(current);
            }else{
                $(this).siblings('.count').val(current);
            }

            count_sum();
        });

        $('.counts .plus').click(function(){
            var current = $(this).siblings('.count').val();
            if(current != 1000){
                current++;
                $(this).siblings('.count').val(current);
            }else{
                $(this).siblings('.count').val(current);
            }
            count_sum();
        });
    }
</script>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="catalogue-icon"></i> <span>Каталог продукции</span>
        </div>
        <?= $this->renderPartial('application.components.views.productsSale') ?>
    </div>
    <div class="page-content-wrap">
        
        <div class="data-header catalogue-header clearfix">
            <div class="data-header-text">
                Выберите серию:
            </div>
            <div class="select-wrap select-seria-wrap">
                <?= CHtml::dropDownList('category_id', Yii::app()->request->getParam('id', -1), CHtml::listData(
                        array(
                            -1=>array('id'=>-1, 'value'=>'Любая')
                            ) + ProductCategory::items(),
                        'id',
                        'value'
                    )) ?>
            </div>
            <div class="data-header-text">
                Способ получения:
            </div>
            <div class="select-wrap select-delivery-wrap">
                <?= CHtml::dropDownList('deliveryType', Yii::app()->request->getParam('deliveryType', -1), array(
                    '-1'=>'Любой',
                    '0'=>'Самовывоз',
                    '1'=>'Доставка на дом',
                )) ?>
            </div>
            <div class="order-view-filter clearfix">
                <a href="javascript:void(0)" class="active">
                    Обычный<br>
                    заказ
                </a>
                <a href="javascript:void(0)" class="quick-order-link">
                    Быстрый<br>
                    заказ
                </a>
            </div>

        </div>
        <div class="products-list clearfix">
            
            <?php $this->widget('zii.widgets.CListView', array(
                'id'=>'product-list',
                'dataProvider'=>$model->search_catalog(),
                'itemView'=>'_product',
                'template'=>'{items}{pager}',
                'pagerCssClass'=>'dataTables_paginate paging_simple_numbers',
                'afterAjaxUpdate'=>'function(){render_pageSizeBlock();processCount();process_basket();}',
                'pager'=>array(
                    'header'=>'',
                    'prevPageLabel'=>'<',
                    'nextPageLabel'=>'>',
                ),
                'htmlOptions'=>array(
                    //'class'=>'users-table-wrap logs-table-wrap dataTables_wrapper right-table-style',
                ),
            )); ?>
            
        </div>
        
        <div class="filter-counts filter-counts-product-list">
            Количество товаров на странице:
            <form class="filter-counts-form">
                <div class="radio-wrap">
                    <input type="radio" name="radio_counts" value="2" id="counts_2" <?= ($pageSize==2)?'checked':'' ?> />
                    <label for="counts_2">2</label>
                </div>
                <div class="radio-wrap">
                    <input type="radio" name="radio_counts" value="8" id="counts_8" <?= ($pageSize==8)?'checked':'' ?> />
                    <label for="counts_8">8</label>
                </div>
                <div class="radio-wrap">
                    <input type="radio" name="radio_counts" value="16" id="counts_16" <?= ($pageSize==16)?'checked':'' ?> />
                    <label for="counts_16">16</label>
                </div>
                <div class="radio-wrap">
                    <input type="radio" name="radio_counts" value="24" id="counts_24" <?= ($pageSize==24)?'checked':'' ?> />
                    <label for="counts_24">24</label>
                </div>
                <div class="radio-wrap">
                    <input type="radio" name="radio_counts" value="32" id="counts_32" <?= ($pageSize==32)?'checked':'' ?> />
                    <label for="counts_32">32</label>
                </div>
                <div class="radio-wrap">
                    <input type="radio" name="radio_counts" value="0" id="counts_all" <?= ($pageSize==0)?'checked':'' ?> />
                    <label for="counts_all">Все</label>
                </div>
            </form>
        </div>
        
    </div>
</div>