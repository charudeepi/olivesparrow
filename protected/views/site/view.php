
<script type="text/javascript">
    $(document).ready(function() {

        $('.see-more').click(function() {

            if($(this).text() == 'Expand') {
                $(this).text('Collapse');
                $('.training-more').show();

            }else{
                $('.training-more').hide();
                $(this).text('Expand');
            }
        });
    });
</script>
<?php

if(Yii::app()->request->baseUrl == '/olive') {
    $bucket = '200px';
}else{
    $bucket = 'infographics';
}
$bucket = 'infographics';
?>

<!--    <script src="../js/training.js" type="text/javascript"></script>-->
    <div id="training-container">
        <div class="training-box-holder">
            <div class="training-title">
                <h2><?php echo $data['title']; ?></h2>
<!--                <div class="short-desc">--><?php //echo $data['description']; ?><!-- </div>-->
            </div>
            <div class="training-box">
                <div class="training-image">
                    <?php
                    if(isset($data['image']) && $data['image'] != ''){
                        $img = $data['image'];
                    }else{
                        $img = '9_Olive_leadership.png';
                    }
                    ?>
                    <img src="https://s3.amazonaws.com/olivesparrow/<?php echo $bucket; ?>/<?php echo $img; ?>">
<!--                    <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/images/infographics/praise_me.png">-->
                </div>
                <div class="training-intro">
                    <?php if($data['meta']){
                                $CMetaArr = unserialize($data['meta']);
                            }else{
                                $CMetaArr['objectives'] = $CMetaArr['outline'] = $CMetaArr['competency'] = '';
                            }
                            ?>
                    <ul>
                        <li><?php echo $CMetaArr['objectives']; ?></li>
                        <li><?php echo $CMetaArr['outline']; ?></li>
                        <li><?php echo $CMetaArr['competency']; ?></li>
                    </ul>
                </div>
                <span><span class="see-more">Expand</span></span>

<!--                <style type="text/css" href='--><?php //echo Yii::app()->request->baseUrl; ?><!--/js/ckeditor/contents.css'></style>-->
                <div class="training-more hide">

                    <div class="more-text" >
<!--                        <span class="more-bubble speech4">-->
<!--                            Regardless of the size of your organization – whether it's a large corporation, a small company, or even a home-based business – you need good communication skills if you want to succeed.-->
<!--                            With more than 75 individual articles, this communication mini-site teaches you these skills.-->
<!--                        </span>-->
<!--                        <span class="more-bubble speech4">-->
<!--                            Have you ever received a memo and felt the sender really wasn't thinking about what you needed to know or hear? Maybe you have attended corporate presentations that have simply left you cold? Or perhaps you've even delivered communications yourself and realized, in retrospect, that you really hadn't got the measure of your audience and their needs.-->
<!--                        </span>-->
<!--                        <span class="more-bubble speech4">-->
<!--                            This is at best frustrating. At worst it is such a huge "turn off" that it can have a negative effect, or even produce an effect that is the exact opposite of the one you had intended.-->
<!--                        </span>-->
<!--                        <span class="more-bubble speech4">-->
<!--                            The first step is to put yourself in the shoes of your audience. What do they need to know, and want to hear? What's their preferred way of receiving information? What will stop them listening to what you have to say? And how will you know that they have got the message?-->
<!--                        </span>-->
<!--                        <span class="more-bubble speech4 wider">-->
<!--                                                    <img src="http://www.opentext.com/file_source/OpenText/en_US/JPG/ccm-diagram-wp8.jpg" />-->
<!--                                                </span>-->

                        <?php echo $data['description']; ?>
                    </div>


                </div>

            </div>
            <?php if($page['prev'] == '' || $page['prev'] == NULL || !isset($page['prev'])) {
            $prev = '/site/trainings';
        }else{
            $prev = "/site/view/id/".$page['prev'];

        }
            if($page['next'] == '' || $page['next'] == NULL || !isset($page['next'])) {
                $next = '/site/trainings';
            }else{
                $next = "/site/view/id/".$page['next'];

            }
            ?>
            <div class="options-box">
                <a href="<?php echo Yii::app()->request->baseUrl; ?><?php echo $prev; ?>"><span class="learn-more">Go back</span></a>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/contact"><span class="options">Buy</span></a>
                <a href="<?php echo Yii::app()->request->baseUrl; ?><?php echo $next; ?>"><span class="next-training">Next Training</span></a>
            </div>
        </div>
    </div>
