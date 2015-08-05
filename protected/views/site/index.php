<div id="main-col">
    <div class="content-item home-bg-test2">

<!--        <div class="buff-container buff-1">-->
<!--            <div class="inner-text-holder">-->
<!--                <h1>Trainings</h1>-->
<!--                <p class="intro">-->
<!--                    Olive Sparrow is a new age learning and training site which focuses-->
<!--                    learning practical concepts and ideas to enhance personal and business performance.-->
<!--                </p>-->
<!--                <a class="go-link">Go <i class="icon-double-angle-right"></i></a>-->
<!--            </div>-->
<!--        </div>-->
        <div class="buff-container buff-5">
            <div class="inner-text-holder">
                <h1>Trainings</h1>
                <p class="intro">Various articles and tool to help you achieve your goals.</p>
                <a class="go-link" href="<?php echo Yii::app()->request->baseUrl; ?>/site/trainings">Go <i class="icon-double-angle-right"></i></a>
            </div>
            <div class="inner-bubble">
                <div class="speech3">
                    <p class="bubble-text">
                        <?php $bubbleText[0] = 'Olive Sparrow is a new age learning and training site which focuses learning practical concepts and ideas to enhance personal and business performance.';
                        echo $bubbleText[0];
                        ?>
                    </p>
                </div>

                <?php echo $this->renderPartial('sharebox', array('share'=>$bubbleText[0])); ?>
            </div>
        </div>
        <div class="buff-container buff-2">
            <div class="inner-text-holder">
                <h1>Resources</h1>
                <p class="intro">Various tools to help your achieve your goals.</p>
                <a class="go-link" href="<?php echo Yii::app()->request->baseUrl; ?>/site/resources">Go <i class="icon-double-angle-right"></i></a>
            </div>
            <div class="inner-bubble">
                <div class="speech3">
                    <p class="bubble-text">
                        <?php $bubbleText[1] = 'Forms, SOPs, Forms, Articles and much more, that you need to set up your Human Resource Department.';
                        echo $bubbleText[1];
                        ?>
                    </p>
                </div>
                <?php echo $this->renderPartial('sharebox', array('share'=>$bubbleText[1])); ?>

            </div>
        </div>
        <div class="buff-container buff-4">
            <div class="inner-text-holder">
                <h1>About</h1>
                <p class="intro">Various articles and tool to help you achieve your goals.</p>
                <a class="go-link" href="<?php echo Yii::app()->request->baseUrl; ?>/site/about">Go <i class="icon-double-angle-right"></i></a>
            </div>
            <div class="inner-bubble">
                <div class="speech3">
                    <p class="bubble-text">
                        <?php $bubbleText[0] = "Would you like to know, what people say about us?";
                        echo $bubbleText[0];
                        ?>
                    </p>
                </div>

                <?php echo $this->renderPartial('sharebox', array('share'=>$bubbleText[0])); ?>
            </div>
        </div>

    </div>
</div>