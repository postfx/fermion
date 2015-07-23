<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="event-card-ico"></i> <span>КАРТОЧКА ТОВАРА - "<?= CHtml::encode($model->name).' ('.CHtml::encode($model->article).')' ?>"</span>
        </div>
        <?php if ( $this->role->opt_product_update ): ?>
            <?= CHtml::link('редактировать', array('update', 'id'=>$model->id), array(
                'class'=>'edit-link',
            )) ?>
        <?php endif; ?>
    </div>
    <div class="full-width-content">
        
        <div class="product-card-top">
            <div class="product-card-create">
                Товар создан: <?= Yii::app()->dateFormatter->format('dd.MM.yyyy', $model->date_create) ?>
                <br />
                Товар обновлен: <?= (strlen($model->date_update)!=0)?Yii::app()->dateFormatter->format('dd.MM.yyyy, HH:mm', $model->date_update):'-' ?>
                <br />
                Добавлено пользователем: <?= CHtml::link($model->user->login, array('/cabinet/user/view', 'id'=>$model->user_id)) ?>
            </div>
            <div class="product-card-publish">
                <?= $model->_active ?>
            </div>
        </div>
        
        <div class="product-card-center clearfix">
            <div class="product-card-col event-card-col">
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('id') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->id ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('name') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->name ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('article') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->article ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('category_id') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::link($model->category->name, array('/cabinet/productCategory/view', 'id'=>$model->category_id)) ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('price') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->price ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('points') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->points ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('countBasket') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->countBasket ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('shelfLife') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->shelfLife)!=0 ) ? $model->shelfLife : '-' ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('countPack') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->countPack)!=0 ) ? $model->countPack.' '.$model->countPack_unit : '-' ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('packSize') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->packSize)!=0 ) ? $model->packSize : '-' ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('weight') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->weight)!=0 ) ? $model->weight.' '.$model->weight_unit : '-' ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('volume') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->volume)!=0 ) ? $model->volume.' '.$model->volume_unit : '-' ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('desc') ?>
                    </label>
                    <div class="item-value item-value-wide">
                        <?= $model->desc ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('text') ?>
                    </label>
                    <div class="item-value item-value-wide">
                        <?= $model->text ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('ingredients') ?>
                    </label>
                    <div class="item-value item-value-wide">
                        <?= ( strlen($model->ingredients)!=0 ) ? $model->ingredients : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('structure') ?>
                    </label>
                    <div class="item-value item-value-wide">
                        <?= ( strlen($model->structure)!=0 ) ? $model->structure : '-' ?>
                    </div>
                </div>

                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('img') ?>
                    </label>
                    <div class="item-value item-value-wide">
                        <?= $model->_img ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('video') ?>
                    </label>
                    <div class="item-value">
                        <?php if ( strlen($model->video)!=0 ): ?>
                            <iframe width="540" height="400" src="<?= $model->video ?>" frameborder="0" allowfullscreen></iframe>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
</div>

