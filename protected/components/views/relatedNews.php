<?php

    $config = $this->config;
    if ( !$config['relatedNews'] ) {
        return false;
    }

    $criteria = new CDbCriteria();
    $criteria->select = '`id`, `title`, `date_create`, `desc`, `slug`, `img`';
    $criteria->compare('active', 1);
    $criteria->compare('category_id', $category_id);
    $time = time();
    $criteria->addCondition('`date_begin`<'.$time.' AND `date_end`>'.$time);        //  mb edit
    $criteria->limit = 4;
    $criteria->order = '`id` DESC';
    $news = News::model()->findAll($criteria);

?>

<?php if ( count($news)!=0 ): ?>
    <div class="quick-nav-block">
        <div class="quick-nav">
            <a href="javascript:void(0)" class="quick-nav-link"><span>Похожие новости</span></a>
            <div class="quick-nav-hide">
                <div class="quick-nav-content">
                    <div class="other-item-list">
                        <?php foreach ( $news as $n ): ?>
                            <div class="other-item-item">
                                <div class="other-item-header clearfix">
                                    <div class="other-item-img">
                                        <?= (strlen($n->img)!=0) ? CHtml::image('/uploads/news/preview/'.$n->img, '', array(
                                            'class'=>'img-responsive',
                                        )) : '' ?>
                                    </div>
                                    <div class="other-item-top">
                                        <div class="other-item-title">
                                            <?= CHtml::encode($n->title) ?>
                                        </div>
                                        <div class="other-item-date">
                                            <?= Yii::app()->dateFormatter->format('dd MMMM yyyy', $n->date_create) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="other-item-descr">
                                    <?= $n->_descShort ?>
                                </div>
                                <div class="other-item-actions clearfix">
                                    <?= CHtml::link('подробнее', array('/site/news', 'slug'=>$n->slug), array(
                                        'class'=>'news-detail',
                                    )) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>