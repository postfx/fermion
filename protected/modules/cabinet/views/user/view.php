<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="event-card-ico"></i> <span>Просмотр пользователя - "<?= CHtml::encode($model->login) ?>"</span>
        </div>
        <?php if ( $this->role->opt_user_update ): ?>
            <?= CHtml::link('редактировать', array('update', 'id'=>$model->id), array(
                'class'=>'edit-link',
            )) ?>
        <?php endif; ?>
    </div>
    <div class="full-width-content">
        
        <div class="product-card-top">
            <div class="product-card-create">
                Пользователь создан: <?= Yii::app()->dateFormatter->format('dd.MM.yyyy', $model->date_create) ?>
                <br />
                Пользователь обновлен: <?= (strlen($model->date_update)!=0)?Yii::app()->dateFormatter->format('dd.MM.yyyy, HH:mm', $model->date_update):'-' ?>
                <br />
                Последняя активность: <?= (strlen($model->date_activity)!=0)?Yii::app()->dateFormatter->format('dd.MM.yyyy, HH:mm', $model->date_activity):'-' ?>
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
                        <?= $model->getAttributeLabel('login') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->login ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        ФИО
                    </label>
                    <div class="item-value">
                        <?= $model->_fio ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('role') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::link($model->_role->name, array('/cabinet/role/view', 'id'=>$model->role), array('target'=>'_blank')) ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('referer_id') ?>
                    </label>
                    <div class="item-value">
                        <?= ($model->referer_id!==null) ? CHtml::link($model->referer->login, array('/cabinet/user/view', 'id'=>$model->referer_id), array('target'=>'_blank')) : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('country_id') ?>
                    </label>
                    <div class="item-value">
                        <?= ( $model->country_id>0 ) ? $model->country->name : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('region_id') ?>
                    </label>
                    <div class="item-value">
                        <?= ( $model->region_id>0 ) ? $model->region->name : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('city_id') ?>
                    </label>
                    <div class="item-value">
                        <?= ( $model->city_id>0 ) ? $model->city->name : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('postcode') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->postcode)!=0 ) ? $model->postcode : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('address') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->address)!=0 ) ? $model->address : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('office_id') ?>
                    </label>
                    <div class="item-value">
                        <?= ( $model->office_id>0 ) ? $model->office->name : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('phone') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->phone) ) ? $model->phone : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('phoneHome') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->phoneHome)!=0 ) ? $model->phoneHome : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('skype') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->skype)!=0 ) ? $model->skype : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('passport_num') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->passport_num)!=0 ) ? $model->passport_num : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('passport_date') ?>
                    </label>
                    <div class="item-value">
                        <?= (strlen($model->passport_date)!=0) ? date('d.m.Y', $model->passport_date) : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('passport_issuingAuthority') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->passport_issuingAuthority)!=0 ) ? $model->passport_issuingAuthority : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('date_birthday') ?>
                    </label>
                    <div class="item-value">
                        <?= (strlen($model->date_birthday)!=0) ? date('d.m.Y', $model->date_birthday) : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('info') ?>
                    </label>
                    <div class="item-value item-value-wide">
                        <?=  ( strlen($model->info)!=0 ) ? $model->info : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('balance') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->balance ?>
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
            </div>
        </div>

    </div>
</div>

