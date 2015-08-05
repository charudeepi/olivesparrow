<?php
echo "<pre>";
//print_r($data); die();
echo "</pre>";
//$tempUrl = '../../images/trainings/';
$tempUrl = $this->trainingImgUrl;

    $img = ($data['image'] != '') ? $data['image'] : 'default';
?>

<!--<div id="hidden-header">-->
<!--    <h1 id="main-heading" class="title-bar" data-hide="trainings-wrapper" data-show="thumbnail-wrapper">--><?php //echo ucfirst($data['type']); ?><!--s</h1>-->
<!--    <h1 id="active-training-cat" class="breadcrumb" data-hide="thumbnail-wrapper" data-show="trainings-wrapper"> > --><?php //echo $data['cat']['title']; ?><!--</h1>-->
<!--    <h2 id="active-training" class="breadcrumb"> > --><?php //echo $data['title']; ?><!--</h2>-->
<!--</div>-->

<div id="training-content" data-catid = "<?php echo $data['cat']['idtype']; ?>" data-cattitle = "<?php echo $data['cat']['title']; ?>">

    <div class="training-box-wrapper">
        <div class="trainingpic">
            <div class="fancy-img-wrapper">
                <div id="selected-training-img" ><img class="training-thumb selected" src="<?php echo $tempUrl.$img.'.jpg'; ?>"></div>
                <!--                    <img id="selected-training-img" src="http://static-img-cf-1.hgcdn.net/Media/CHG_023Drinking04_TallTales480x360.jpg" class="training-thumb">-->
            </div>

        </div>
        <?php
        if($data['meta']){
            $CMetaArr = unserialize($data['meta']);
        }else{
            $CMetaArr['objectives'] = $CMetaArr['outline'] = $CMetaArr['competency'] = '';
        }
        //print_r($CMetaArr);
        ?>
        <div class="traindesc">
            <h1 id = "training-title"><?php echo $data['title']; ?></h1>
            <div class="description-block">
                <?php if($data['type'] == 'training') { ?>
                <div class="desc-line"><span class="desc-title">Objectives: </span><span class="desc-info"><?php echo $CMetaArr['objectives']; ?></span></div>
                <div class="desc-line"><span class="desc-title">Outline: </span><span class="desc-info"><?php echo $CMetaArr['outline']; ?></span></div>
                <div class="desc-line"><span class="desc-title">Compentency: </span><span class="desc-info"><?php echo $CMetaArr['competency']; ?></span></div>
                <?php } else {?>
                <p><?php echo $data['description']; ?></p>
                <?php } ?>
            </div>

        </div>
    </div>
    <div class="training-desc-body">
        <div class="train-tab-wrapper">
            <?php foreach($data['more'] as $k => $v){ ?>
            <?php if($data['type'] == 'resource') { ?>
        <div class = "resource-inner">
        <?php } ?>
            <div class="fields-section <?php echo $v['bg_color']; ?>">
                <?php echo $v['desc']; ?>
            </div>
            <?php if($data['type'] == 'resource') { ?>
            </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

