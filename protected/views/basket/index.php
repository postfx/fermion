<?php
    
?>

<script>
    $(document).ready(function(){
        
        $('.counts .minus, .counts .plus').click(function(){
            $.ajax({
                url: '/basket/_ajax?action=changeCount',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: $(this).attr('data-id'),
                    count: ( $(this).hasClass('plus') ) ? 1 : -1
                },
                success: function(data) {
                    console.log(data);
                }
            });
        });
        
        $('.remove-from-basket').click(function(){
            var _this = $(this);
            $.ajax({
                url: '/basket/_ajax?action=removeFromBasket',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: $(this).attr('data-id')
                },
                success: function(data) {
                    console.log(data);
                    _this.parent().parent().remove();
                }
            })
        });
        
    });
</script>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="catalogue-icon"></i> <span>Корзина</span>
        </div>
    </div>
    <div class="page-content-wrap">
        <div class="basket-table-wrap">
            <table class="basket-table">
                <tr>
                    <th colspan="2" class="main-td">
                        Товары
                    </th>
                    <th>
                        Цена
                    </th>
                    <th>
                        Количество
                    </th>
                    <th>
                        Стоимость
                    </th>
                    <th>

                    </th>
                </tr>
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$model->search_product(),
                    'itemView'=>'_basket_product',
                    'template'=>'{items}',
                    'emptyText'=>'',
                    'htmlOptions'=>array(
                        //'class'=>'users-table-wrap logs-table-wrap dataTables_wrapper right-table-style',
                    ),
                )); ?>
            </table>
           
            <div class="table-actions clearfix">
                <a href="javascript:void(0)" class="custom-btn-gray">Оформить заказ</a>
            </div>
        </div>
        
        <div class="basket-table-wrap">
            <table class="basket-table basket-event-table">
                <tr>
                    <th class="main-td">
                        События
                    </th>
                    <th>
                        Цена
                    </th>
                    <th>
                        Количество
                    </th>
                    <th>
                        Стоимость
                    </th>
                    <th>

                    </th>
                </tr>
                <!--tr>
                    <td class="main-td product-td-title">
                        <a href="javascript:void(0)">
                            Базовое обучение в Москве 20.04.2015 - 25.04.2015
                        </a>
                    </td>
                    <td class="product-td-price">
                        <span>300</span> руб.
                    </td>
                    <td>
                        <div class="counts clearfix">
                            <input name="minus" class="minus" value="-" type="button">
                            <input name="count" class="count" value="1" readonly="" type="text">
                            <input name="plus" class="plus" value="+" type="button">
                        </div>
                    </td>
                    <td class="product-td-price-rez">
                        <span>600</span> руб.
                    </td>
                    <td class="btn-td">
                        <a href="javascript:void(0)" class="remove-from-basket">удалить</a>
                    </td>
                </tr>
                <tr>
                    <td class="main-td product-td-title">
                        <a href="javascript:void(0)">
                            Семинар "Технологии увеличения объёма продаж" в Москве 09.04.2015
                        </a>
                    </td>
                    <td class="product-td-price">
                        <span>300</span> руб.
                    </td>
                    <td>
                        <div class="counts clearfix">
                            <input name="minus" class="minus" value="-" type="button">
                            <input name="count" class="count" value="1" readonly="" type="text">
                            <input name="plus" class="plus" value="+" type="button">
                        </div>
                    </td>
                    <td class="product-td-price-rez">
                        <span>600</span> руб.
                    </td>
                    <td class="btn-td">
                        <a href="javascript:void(0)" class="remove-from-basket">удалить</a>
                    </td>
                </tr-->
            </table>
            <div class="table-actions clearfix">
                <a href="javascript:void(0)" class="custom-btn-gray">Оформить заказ</a>
            </div>
        </div>
        
    </div>
</div>