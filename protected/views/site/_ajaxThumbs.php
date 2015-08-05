
    <div class="jscroll-inner">
        <?php
//        if(Yii::app()->request->baseUrl == '/olive') {
//            $bucket = '200px';
//        }else{
//            $bucket = 'infographics';
//        }
        $bucket = 'infographics';
        ?>
        <?php for($i = 0; $i < sizeof($dataProvider); $i++){

        if($dataProvider[$i]['image'] == '' && !isset($dataProvider[$i]['image'])){
            $dataProvider[$i]['image']= '15_Olive_stress.png';
        }
        ?>
        <div class="list">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/view/id/<?php echo $dataProvider[$i]['idcontent']; ?>">
                <img src="https://s3.amazonaws.com/olivesparrow/<?php echo $bucket; ?>/<?php echo $dataProvider[$i]['image'] ?>">
                <h4><?php echo $dataProvider[$i]['title'] ?></h4>

            </a>
        </div>
        <?php }?>
        <div class="next"><a href="/olive/site/trainajax?limit=<?php echo $dataProvider[0]['newlimit']; ?>" data-ui="jscroll-next" class="jscroll-next" style="color:red">more..</a></div>
    </div>

