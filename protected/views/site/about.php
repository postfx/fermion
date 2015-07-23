<?php
    $config = $this->config;
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="articles-icon"></i> <span>О системе</span>
        </div>
        <?= $this->renderPartial('application.components.views.calendar') ?>
    </div>
    <div class="page-content-wrap about-text">
        <?= $config['about'] ?>
    </div>
</div>