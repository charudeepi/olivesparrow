<?php /* @var $this Controller */ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if lt IE 7]>      <html xmlns='http://www.w3.org/1999/xhtml' dir='ltr' lang='en-US' class='ie6'> <![endif]-->
<!--[if IE 7 ]>    <html xmlns='http://www.w3.org/1999/xhtml' dir='ltr' lang='en-US'  class='ie7'>  <![endif]-->
<!--[if IE 8 ]>    <html xmlns='http://www.w3.org/1999/xhtml' dir='ltr' lang='en-US' class='ie8'> <![endif]-->
<!--[if IE 9 ]>    <html xmlns='http://www.w3.org/1999/xhtml' dir='ltr' lang='en-US' class='ie9 modern'> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html xmlns='http://www.w3.org/1999/xhtml' dir='ltr' lang='en-US' class='modern' xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml"> <!--<![endif]-->

<html>

<head>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
    <!--        --><?php //Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <meta property="og:title" content="www.olivesparrow.com"/>
    <meta property="og:image" content="http://www.theawesomeme.com/images/BirdLarger/5.png"/>
    <meta property="og:description" content="Essence of Olive Sparrow is to present contemporary learning concepts in a crisp manner to achieve results."/>

    <?php
    if(Yii::app()->controller->id != 'site') {
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" media="screen, projection" />
        <!--[if lt IE 8]>-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <!--<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/assets/fb461f67/gridview/styles.css">-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/44eaf576/pager.css">

        <?php }


    if($this->activeMenu != 'update' && $this->activeMenu != 'create'){ ?>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/test.js"></script>
        <?php       } ?>

    <!--FOLLOWING on the SERVER-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/olive_v2.css" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta http-equiv="x-ua-compatible" content="IE=8"/>
    <!--    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
    <!--    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>-->
</head>
<body>

<div class="page-container">
    <div id="header">
        <div class="header-left">
            <a href="/"><div class="logo-container"></div></a>
            <div class="social-container">
                <span class="social-item"><a href="https://www.facebook.com/charu.coder" target='_blank'><i class="icon-facebook"></i></a></span>
                <span class="social-item"><a href="https://twitter.com/cool_charu" target='_blank'><i class="icon-twitter"></i></a></span>
                <span class="social-item"><a href="https://www.linkedin.com/in/charuthefrontender" target='_blank'><i class="icon-linkedin"></i></a></span>
                <span class="social-item"><a href="http://www.pinterest.com/codercharu/" target='_blank'><i class="icon-pinterest"></i></a></span>
                <span class="social-item"><a href="https://plus.google.com/u/0/109369563979215632655/" target='_blank'><i class="icon-google-plus"></i></a></span>
            </div>
        </div>
        <div class="header-right">
            <div class="header-bubble">
                <div class="top-rect">
                    <p class="bubble-text">
                        <?php if(isset($this->topBubble) && $this->topBubble != '') {
                        echo $this->topBubble;
                    } ?>

                    </p>

                </div>
                <?php

                if(isset($this->topBubble) && $this->topBubble != '') {
                echo $this->renderPartial('sharebox', array('share'=>$this->topBubble));
                }

                    ?>
            </div>

            <div class="menu-container">
                <a class="menu-item" href="<?php echo Yii::app()->request->baseUrl; ?>/site/trainings"><span>Trainings</span></a>
                <a class="menu-item" href="<?php echo Yii::app()->request->baseUrl; ?>/site/resources"><span>Resources</span></a>
                <a class="menu-item margin-top" href="<?php echo Yii::app()->request->baseUrl; ?>/site/contact"><span>Contact</span></a>
                <a class="menu-item margin-top" href="<?php echo Yii::app()->request->baseUrl; ?>/site/about"><span>About</span></a>
            </div>
        </div>
    </div>

    <?php

    if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
        <?php endif?>

    <div id = "main-container">
        <!-- MAIN CONTENT -->
        <div id="o-content" style="min-height: 100px;">
            <?php echo $content; ?>
            <div class="clear"></div>
        </div>
    </div>

    <div id="footer">
        <ul class="menu">
            <li class="main">Trainings
                <ul class="sub">
                    <?php
                    $command = Yii::app()->db->createCommand("SELECT idcontent,title FROM content where type='training' order by idcontent Desc limit 9");
                    $row = $command->queryAll();
                    foreach($row as $val)
                        echo '<li><a href='.Yii::app()->request->baseUrl.'/site/view/id/'.$val["idcontent"].'>'.$val['title'].'</a></li>';

                    ?>
                </ul>
            </li>
            <li class="main">Resources
                <ul class="sub">
                    <?php
                    echo '<li><a href='.Yii::app()->request->baseUrl.'/site/resources>Forms</a></li>';
                    echo '<li><a href='.Yii::app()->request->baseUrl.'/site/resources>SOPs</a></li>';
                    echo '<li><a href='.Yii::app()->request->baseUrl.'/site/resources>Letters</a></li>';
                    echo '<li><a href='.Yii::app()->request->baseUrl.'/site/resources>Articles</a></li>';

                    ?>
                </ul>
            </li>
            <li class="main">
                <a href="/About/">About</a>
                <ul class="sub">
                    <li><a href="/About/">Vision</a></li>
                    <li><a href="/About/">Misson</a></li>
                    <li><a href="/About/">Simplicity</a></li>
                    <li><a href="/About/">Freedom</a></li>
                </ul>
            <a href="/contact/">Contact</a>

            </li>

            <li class="main"><a href="/testimonials/">Testimonials</a>
                <ul class="sub">
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/testimonials/">Session is Excellent</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/testimonials/">Very interactive and thoughtful</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/testimonials/">Was a lot of fun</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/testimonials/">Nothing to change, trainer was excellent</a>
                </ul>

            </li>
        </ul>
    </div>

    <div class="copyright">Copyright &copy;2014 olivesparrow.com </div>
</div>
</body>
</html>
