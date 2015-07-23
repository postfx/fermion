<?php
    
    $db = Yii::app()->db;
    $slides = $db->createCommand()->select('*')->from('slide')->order('zIndex ASC, id ASC')->queryAll();
    if ( !$slides ) {
        return false;
    }

?>

<div class="slider">
    <div class="slider-nav-wrap">
        <div class="slider-nav"></div>
    </div>
    <ul class="main-slider">
        <?php foreach ( $slides as $slide ): ?>
            <li>
                <div class="slide" style="background: url(/uploads/slide/<?= $slide['img'] ?>) no-repeat center; max-height: 713px;<?= (strlen($slide['link'])!=0) ? ' cursor: pointer;' : '' ?>"<?= (strlen($slide['link'])!=0) ? ' onclick="if ( !$(this).find(\'.btn.circle-btn\').is(\':hover\') ) window.open(\''.$slide['link'].'\', \'_blank\')"' : '' ?>>
                    <div class="container">
                        <?php if ( strlen($slide['name'])!=0 ): ?>
                            <div class="slide-title">
                                <?= CHtml::encode($slide['name']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( strlen($slide['text'])!=0 ): ?>
                            <div class="slide-text">
                                <?= $slide['text'] ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( strlen($slide['spec_text'])!=0 ): ?>
                            <a href="<?= ( strlen($slide['spec_link'])!=0 ) ? $slide['spec_link'] : 'javascript:void(0)' ?>" class="btn circle-btn" target="_blank">
                                <div class="circle-btn-inside">
                                    <div class="circle-btn-text">
                                        <?= $slide['spec_text'] ?>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>