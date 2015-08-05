<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/rs.js"></script>

<style>

</style>
<script>
    $(document).ready(function(){
        //$(".peKenBurns").peKenburnsSlider()
        $(".rslides").responsiveSlides({
            auto: true,             // Boolean: Animate automatically, true or false
            speed: 800,            // Integer: Speed of the transition, in milliseconds
            timeout: 7000,          // Integer: Time between slide transitions, in milliseconds
            pager: true,           // Boolean: Show pager, true or false
            nav: false,             // Boolean: Show navigation, true or false
            random: false,          // Boolean: Randomize the order of the slides, true or false
            pause: true,           // Boolean: Pause on hover, true or false
            pauseControls: true,    // Boolean: Pause when hovering controls, true or false
            prevText: "<i class='icon-arrow-left left'></i>",   // String: Text for the "previous" button
            nextText: "<i class='icon-arrow-right left'></i>",       // String: Text for the "next" button
            maxwidth: "1250px",           // Integer: Max-width of the slideshow, in pixels
            navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
            manualControls: "",     // Selector: Declare custom pager navigation
            namespace: "rslides",   // String: Change the default namespace used
            before: function(){},   // Function: Before callback
            after: function(){}     // Function: After callback
        });
    });
</script>
<?php
$tempUrl = '../images/slide/';
$tempImgUrl = '../images/trainings/';
$tempOliveUrl = '../images/olive/';
?>
<!-- skin stylesheet -->
<!--<link rel="stylesheet" href="js/pe.kenburns/themes/default/skin.min.css" />-->

<!-- Ken burns slider plugin -->
<!--<script type="text/javascript" src="js/pe.kenburns/jquery.pixelentity.kenburnsSlider.min.js" /></script>-->
<div id="index-container" class="container-padding-i3 index-3">
    <div id="slide-holder" class="index-item-mar index3" style="width:58%">
        <ul class="rslides">
            <?php
            $sparrowQuotes = array(
                'There is special providence in teh fall of a sparrow- William Shakespeare',
                'I am only sparrow amongst a great flock of sparrows- Evita Person ',
                'Youth of a sparrow is better than old age of an eagle',
                'Be like a sparrow aspiring to be an ostrich-Jarod Kintz'
            );
            //$tempSlideUrl = 'images/slide/train/';
            $tempSlideUrl = '../images/slide/';
            for($i = 0; $i < 5; $i++){
                $tdata = $data['training'][$i];
                ?>
                <li>
<!--                    <div class="banner-container">-->
<!--                        <div class="banner">-->
<!--                            <div class="l-triangle-top"></div>-->
<!--                            <div class="l-triangle-bottom"></div>-->
<!--                            <div class="rectang bg-color">--><?php //echo $tdata['title']; ?><!--</div>-->
<!--                            <!--todo add class channels -->
<!--                        </div>-->
<!--                        <div class="banner-text">-->
<!--                            <span>--><?php //echo $tdata['title']; ?><!--</span>-->
<!--                        </div>-->
<!--                    </div>-->

                    <img style="height:393px;" src="<?php echo $tempSlideUrl.'ss'.$i.'.png'; ?>" alt="">
                </li>
                <?php } ?>

        </ul>
    </div>
    <div class="horiz index-right fr"  id="featured-trainings" style="width: 41%;">

        <h2 class="i3">Featured Trainings</h2>

        <div id="tkm" class="tkm">
            <?php

            $traningArr = array('Leadership Skills', 'Time Management', 'Anger Management', 'Attention Management', 'Change Management', 'Human Resource Management');
            $tIcons = array('icon-group', 'icon-cogs', 'icon-trophy', 'icon-paper-clip');
            for($i = 0; $i <= 3; $i++){
                $tdata = $data['training'][$i];

                if(isset($tdata['image']) && $tdata['image'] != null){
                    $image = $tdata['image'];
                }else{
                    $image = 'default';
                }

                ?>

                <a href="<?php echo $tempUrl.'/trainings#training='.$tdata['idcontent']; ?>" class="fl ml">

                    <div class="btntext">
                        <span class="<?php echo $tIcons[$i];?> icon"></span>
                        <span class="i-text"><?php echo $tdata['title']; ?></span>
                    </div>

                    <div class="training-flyout">
                        <div class="flyout-inner-container">
                            <div class="flyout-left-container">
                                <div class="flyout-icon"><img src="<?php echo $tempImgUrl.$image.'.jpg'; ?>" alt=""></div>
                                <div class="flyout-likes">20 likes</div>
                            </div>
                            <div class="flyout-desc"><?php echo $tdata['description']; ?></div>
                        </div>
                    </div>
                </a>

                <?php } ?>
        </div>

    </div>
    <ul class="horiz index-left fl index-item-mar bottom-li">
        <?php
        $bottomList = array('Our Passion', 'Our Mission', 'Our Services', 'We Offer');
        $bottomText = 'Our goal is to provide provide tea to everyone in the morning, so that you get the needed caffine for the day and you perform like a horse :P';
        $tempUrl = '../images/trainings/';
        for($i = 0; $i < 4; $i++){
            $tdata = $data['training'][$i];
            ?>
            <li>
<!--                <div class="banner-container btm">-->
<!--                    <div class="banner">-->
<!--                        <div class="l-triangle-top"></div>-->
<!--                        <div class="l-triangle-bottom"></div>-->
<!--                        <div class="rectang bg-color">--><?php //echo $bottomList[$i]; ?><!--</div>-->
<!--                        <!--todo add class channels -->
<!--                    </div>-->
<!--                    <div class="banner-text">-->
<!--                        <span>--><?php //echo $bottomList[$i]; ?><!--</span>-->
<!--                    </div>-->
<!--                </div>-->
                <img src="<?php echo $tempUrl.'t'.$i.'.jpg'; ?>">
                <h4><?php echo $bottomText; ?></h4>

                <!--                            <img src="--><?php //echo $tempUrl.'ss'.$i.'.jpg'; ?><!--" alt="">-->
            </li>
            <?php } ?>
    </ul>
</div>