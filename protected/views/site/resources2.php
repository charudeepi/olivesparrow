<style type="text/css">
    .resource-inner{width: 47%; margin: 10px; float: left;}
    .fields-section{min-height: 300px;}
    #details-container .training-box-wrapper .traindesc .description-block{padding: 0; background: none;}
</style>
<div class = "title-bar ginner-bg container-border">
<!--    <h1 id="main-heading title-bar">Resources</h1><h2 id="active-training"></h2>-->
    <h1 id="main-heading" class="title-bar" data-hide="trainings-wrapper" data-show="thumbnail-wrapper">Resources</h1>
    <h1 id="active-training-cat" class="breadcrumb" data-hide="thumbnail-wrapper" data-show="trainings-wrapper"></h1>
    <h2 id="active-training" class="breadcrumb"></h2>
</div>
<div id = "resources-container" class = "container-border" class = "content-container">
    <ul  id="resources-menu" class="menu-container">
        <?php
        $tempUrl = $this->trainingImgUrl;
        for($i = 0; $i < 6; $i++){
//            if(isset($dataProvider[$i]['image']) && $dataProvider[$i]['image'] != null){
//                               $image = $dataProvider[$i]['image'];
//                           }else{
//                               $image = 'default';
//                           }
            ?>
            <li class="r-cat-item container-border" id="li-resource-cat-<?php echo $dataProvider[$i]['idtype']; ?>" data-id="<?php echo $dataProvider[$i]['idtype']; ?>">
                <span class = "r-title"><?php echo $dataProvider[$i]['title']; ?></span>
<!--                <div class="intro-wrapper">-->
<!--                    <img src="--><?php //echo $tempUrl.$image.'.jpg'; ?><!--" class="r-thumb">-->
<!--                    <div class="r-desc">--><?php //echo $dataProvider[$i]['description']; ?><!--</div>-->
<!--                </div>-->
            </li>
            <?php
        }
        ?>
    </ul>

    <div id="resources-holder" class="res-container"></div>

</div>
<!--<div id = "resources-container" class = "container-border">-->
<!---->
<!--</div>-->


<div id = "details-container"  style="display: none;">

</div>