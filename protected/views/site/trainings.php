<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jscroll.js"></script>
<script type="text/javascript">
    <!---->
//    var counter = 1;
//    function onScrollDown() {
//        var limit='limit='+counter;
//        $.ajax({
//            type: 'POST',
//            url: '/olive/site/trainajax',
//            data: limit,
//            success:function(data){
//                jQuery('#infinite-scroll').append(data);
//                $('#infinite-scroll').jscroll({
//                    loadingHtml: '<span>Loading...</span>',
//                    autoTrigger: false
//                });
//
//                counter++;
//            },
//            error: function(data) { // if error occured
//
//            },
//
//            dataType:'html'
//        });
//    }

    $(document).ready(function () {
        $('#infinite-scroll').jscroll({
            loadingHtml: '<span>Loading...</span>',
            autoTrigger: true,
            nextSelector: 'a.jscroll-next:last',
            autoTriggerUntil: 1
//            contentSelector: 'div.list'
        });
    });

</script>

<div id="infographics-col" class="infographics-col">
    <div class="infinite-scroll" id="infinite-scroll" data-ui="jscroll-default">
        <div class="jscroll-inner">
            <?php
//            if(Yii::app()->request->baseUrl == '/olive') {
//                $bucket = '200px';
//            }else{
//                $bucket = 'infographics';
//            }
            $bucket = 'infographics';
            ?>

            <?php for($i = 0; $i < sizeof($dataProvider); $i++){
            ?>
            <div class="list">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/view/id/<?php echo $dataProvider[$i]['idcontent']; ?>">
                    <img src="https://s3.amazonaws.com/olivesparrow/<?php echo $bucket; ?>/<?php echo $dataProvider[$i]['image'] ?>">
                    <h4><?php echo $dataProvider[$i]['title'] ?></h4>

                </a>
            </div>
            <?php } ?>
            <div class="next"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/trainajax?limit=2 " data-ui="jscroll-next" class="jscroll-next" style="color:red">more..</a></div>
        </div>
    </div>

</div>

</div>