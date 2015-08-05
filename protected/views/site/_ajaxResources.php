<ul>
    <?php
    $dataProvider = $resDataProvider['res'];
    $catTitle = $resDataProvider['cat']['title'];
    $tempUrl = $this->trainingImgUrl;
    for($i = 0; $i <2; $i++){
        if(isset($dataProvider[$i]['image']) && $dataProvider[$i]['image'] != null){
                           $image = $dataProvider[$i]['image'];
                       }else{
                           $image = 'default';
                       }
        ?>
        <li class="r-item container-border" data-type="<?php echo $catTitle; ?>" id="li-resource-<?php echo $dataProvider[$i]['idcontent']; ?>" data-id="<?php echo $dataProvider[$i]['idcontent']; ?>">
            <span class = "r-title"><?php echo $dataProvider[$i]['title']; ?></span>
            <div class="intro-wrapper">
                <img src="<?php echo $tempUrl.$image.'.jpg'; ?>" class="r-thumb">
                <div class="r-desc"><?php echo $dataProvider[$i]['description']; ?></div>
            </div>
        </li>
        <?php
    }
    ?>
</ul>