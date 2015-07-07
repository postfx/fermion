<?php
    $categories = Yii::app()->controller->_categories;
    
    $l = $this->l;
?>

<div class="categoriesHeader"><?= Yii::t('m', 'Категории') ?></div>
<ul id="categories">
    <?php foreach ( $categories as $category ): ?>
        <li><?= CHtml::link(BsHtml::encode($category->{name_.$l}), array('site/catalog', 'id'=>$category->id)) ?></li>
    <?php endforeach; ?>
</ul>