<div class="articles-item clearfix">
    <div class="articles-item-col article-img">
        <div class="articles-item-prev">
            <div class="articles-item-create">
                <div class="articles-item-create-day"><?= date('d', $data->date_create) ?></div>
                <div class="articles-item-create-month"><?= Yii::app()->dateFormatter->format('MMM', $data->date_create) ?></div>
            </div>
            <?= (strlen($data->img)!=0) ? CHtml::image('/uploads/news/preview/'.$data->img, '', array(
                'class'=>'img-responsive',
            )) : '' ?>
        </div>
    </div>
    <div class="articles-item-col article-content">
        <div class="articles-item-title">
            <?= CHtml::encode($data->title) ?>
        </div>
        <div class="article-data">
            <div class="article-data-col">
                <?= CHtml::link($data->category_name, array('/site/news', 'category_id'=>$data->category_id)) ?>
            </div>
            <div class="article-data-col">
                <i class="comment-ico"></i> <?= CHtml::link('Комментарии', array('/site/news', 'slug'=>$data->slug, '#'=>'comments')) ?> <span>|</span> <span class="data-counts"><?= $data->countComments ?></span>
            </div>
            <div class="article-data-col">
                <i class="eye-ico"></i> Просмотры <span>|</span> <span class="data-counts"><?= $data->countViews ?></span>
            </div>
        </div>
        <div class="articles-item-descr">
            <?= $data->_desc ?> <?= CHtml::link('подробнее', array('/site/news', 'slug'=>$data->slug), array(
                'class'=>'news-detail',
            )) ?>
        </div>
    </div>
</div>