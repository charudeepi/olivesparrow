<?php
/* @var $this ContentController */
/* @var $Mmodel ContentMeta */

?>

<div class="form">


    <?php
   // echo CHtml::beginForm();
    ?>
    <div class="meta-<?php echo $counter ?>">
        <div class="row">
            <?php
            // if this is an 'update' use case (form re-use), render also the id of the song itself (so upon submission we'll
            // know which song to update. Check if $song->id exists...
            ?>
        </div>

        <div class="row">
            <?php
            print_r($model['desc']);
            echo CHtml::textArea('Description', $model['desc'],
            array('id'=>'desc',
                'rows'=>15,
                'cols'=>75));
            ?>
<!--               		--><?php //echo $form->labelEx($Mmodel,'Mini Desc'); ?>
<!--               		--><?php //echo $form->textArea($Mmodel,'desc',array('rows'=>15, 'cols'=>75)); ?>
<!--               		--><?php //echo $form->error($Mmodel,'desc'); ?>
        </div>

        <div class="row">
            <?php
            $list = array("1" => "red", "2" => "green", "3" => "blue");
            echo CHtml::dropDownList('bg_color', $model['bg_color'],
                $list,
                array('empty' => '(Select a color)'));
            ?>
<!--            --><?php
//                $list = array("1" => "red", "2" => "green", "3" => "blue");
//              echo $form->labelEx($Mmodel,'Mini Desc Background Color'); ?>
<!--       		--><?php //echo $form->dropDownList($Mmodel, 'bg_color',$list); ?>
<!--       		--><?php //echo $form->error($Mmodel,'bg_color'); ?>

        </div>



    </div>


    <?php //CHtml::endForm(); ?>

</div><!-- form -->