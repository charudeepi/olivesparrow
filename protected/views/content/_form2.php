<?php
/* @var $this ContentController */
/* @var $Cmodel Content */
/* @var $form CActiveForm */
if($Cmodel["idtype"] != 0 && $Cmodel["idtype"] != ''){
    $idtype = $Cmodel["idtype"];
}else{
    $idtype = '1';
}
?>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
    //<![CDATA[
    $(document).ready(function(){

        jQuery('#content-update').find('textarea').each(function(){
            var thisId = jQuery(this).attr('id');
            new nicEditor({fullPanel : true}).panelInstance(thisId);
        });

        // Add new desc
        var clickCloned = jQuery('#create-new').children().clone(true);

        jQuery('#add-meta').click(function(){
            clickCloned.clone(true).appendTo(jQuery('#create-new'));
            var selBoxes = jQuery('#create-new select'),
                textBoxes = jQuery('#create-new textarea');

            textBoxes.each(function(index){
                var newSelName = 'ContentMetaNew['+index+'][desc]',
                    newSelId = 'new-desc-'+index;
                jQuery(this).attr('name', newSelName);
                jQuery(this).attr('id', newSelId);
            });

            selBoxes.each(function(index){
                var newSelName = 'ContentMetaNew['+index+'][bg_color]';
                jQuery(this).attr('name', newSelName);
            });
        });

        setContentType($("#Content_type option:selected").val(), <?php echo $idtype ;?>);


    });

    var setBgOnchange = function(sel){
        var selObj = jQuery(sel),
            bgClass = selObj.attr('value');

        selObj.prevAll('textarea:first').addClass(bgClass);
    };

    var setContentType = function(type, selId){
        if(typeof selId == 0){
            selId = '';
        }
        var data='type='+type+'&sel='+selId;

        $.ajax({
            type: 'POST',
            //url: 'olive/index.php/content/ctype',
            url: '<?php echo Yii::app()->createAbsoluteUrl("content/ctype"); ?>',
            data:data,
            success:function(data){
                jQuery('#typeName').html(data);
            },
            error: function(data) { // if error occured
                //alert("Error occured.please try again");
                //alert(data);
            },

            dataType:'html'
        });
    };

    var setTextEditor = function(sel){
        var selObj = jQuery(sel),
            thisId = selObj.attr('id');
        new nicEditor({fullPanel : true}).panelInstance(thisId);
    };

</script>

<style type="text/css">
    #create-new-fieldset {
        border: 3px solid #A2CA00;
        margin-bottom: 4px;
        padding: 13px;
        /*color: #A2CA00;*/
    }
    #add-meta {
        width: 100px;
        height: 20px;
        cursor: pointer;
        background-color: #adff2f;
        border: 1px solid #000;
        padding: 2px;
        text-align: center
    }
    .content-meta-bgcolor{
        padding: 4px;
    }
    .content-meta-bgcolor option{height: 20px;}
    legend{color:#A2CA00; font-size: 14px; }
</style>

<div class="form" id="content-form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'content-form',
    'enableAjaxValidation'=>false,'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($Cmodel); ?>

    <div class="row">
        <?php echo $form->labelEx($Cmodel,'title'); ?>
        <?php echo $form->textField($Cmodel,'title',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($Cmodel,'title'); ?>
    </div>
    <div class="row">

        <?php echo $form->labelEx($Cmodel,'type'); ?>
        <?php
        $type = array("training" => "Training", "resource" => "Resource");
        echo $form->dropDownList($Cmodel,'type',$type,array('onchange'=>'setContentType(this.value, '.$idtype.')')); ?>
        <?php echo $form->error($Cmodel,'type'); ?>
    </div>

    <div class="row">
            <?php echo $form->labelEx($Cmodel,'typeName'); ?>
            <span id="typeName"></span>
        </div>


    <div class="row">
        <?php echo $form->labelEx($Cmodel,'description'); ?>
        <?php echo $form->textArea($Cmodel,'description',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($Cmodel,'description'); ?>
    </div>

   
    <div class="row">
        <?php echo $form->labelEx($Cmodel,'image'); ?>
        <?php echo CHtml::activeFileField($Cmodel, 'image'); ?>  
        <?php echo $form->error($Cmodel,'image'); ?>
    </div>
    <?php if($Cmodel->isNewRecord!='1'){ ?>
    <div class="row">
         <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$Cmodel->image,"image",array("width"=>200)); ?> 
    </div>
    <?php }?>
    
    
    <?php
    if($Cmodel['meta']){
        $CMetaArr = unserialize($Cmodel['meta']);
    }else{
        $CMetaArr['objectives'] = $CMetaArr['outline'] = $CMetaArr['competency'] = '';
    }
    //print_r($CMetaArr);
    ?>

    <div class="row">
        <label class="required" for="Content_meta_objectives">Objectives <span class="required">*</span></label>
        <input type="text" value="<?php echo $CMetaArr['objectives']; ?>" id="Content_meta_objectives" name="Content[meta][objectives]" maxlength="255" size="60">
    </div>
    <div class="row">
        <label class="required" for="Content_meta_outline">Outline <span class="required">*</span></label>
        <input type="text" value="<?php echo $CMetaArr['outline']; ?>" id="Content_meta_outline" name="Content[meta][outline]" maxlength="255" size="60">
    </div>
    <div class="row">
        <label class="required" for="Content_meta_competency">Competency <span class="required">*</span></label>
        <input type="text" value="<?php echo $CMetaArr['competency']; ?>" id="Content_meta_competency" name="Content[meta][competency]" maxlength="255" size="60">
    </div>
    <?php  ?>

    <!--	<div class="row">-->
    <!--        --><?php //echo $form->labelEx($Cmodel,'created'); ?>
    <!--		--><?php //echo $form->textField($Cmodel,'created'); ?>
    <!--        --><?php //echo $form->error($Cmodel,'created'); ?>
    <!--	</div>-->

    <div class="row">
        <?php echo $form->labelEx($Cmodel,'status'); ?>
        <?php
        $status = array("0" => "Draft", "1" => "Publish");
        echo $form->dropDownList($Cmodel,'status',$status);
        //echo $form->textField($Cmodel,'status'); ?>
        <?php echo $form->error($Cmodel,'status'); ?>
    </div>

    <fieldset>
        <legend>Mini Description Under Each Training</legend>
        <div id="songs-multiple">
            <div id="content-update">
                <?php
//            print_r($Mmodel);

                if($this->activeMenu === 'update'){
                    $i = 0;
                    $list = array("bg-pale" => "Pale", "bg-dirty-green" => "Dirty Green", "bg-light-gray" => "Light Gray", "bg-light-pink" => "Light Pink");

                    foreach ($Mmodel as $j => $meta) {
                        ?>
                        <div class="row border">
                            <?php echo $form->labelEx($meta,'Mini Desc'); ?>
                            <!--                    --><?php //echo $form->textArea($meta,'desc',array('rows'=>15, 'cols'=>75)); ?>
                            <textarea id="desc-<?php echo $meta['idmcontent']; ?>" class="<?php echo $meta['bg_color']; ?>" name="ContentMeta[<?php echo $meta['idmcontent']; ?>][desc]" cols="75" rows="15"><?php echo $meta['desc']; ?></textarea>
                            <?php

                            echo $form->labelEx($meta,'Mini Desc Background Color'); ?>
                            <select class="content-meta-bgcolor" name = "ContentMeta[<?php echo $meta['idmcontent']; ?>][bg_color]" onchange="setBgOnchange(this);">
                                <option value="none">(Select a color)</option>
                                <?php
                                foreach($list as $k => $v) {
                                    $selected = ($meta['bg_color'] == $k) ? 'selected' : '';
                                    echo '<option title="'.$meta['bg_color'].'" class="'.$k.'" value="'.$k.'" '.$selected.'>'.$v.'</option>';
                                }
                                ?>
                            </select>
                            <?php echo $form->error($meta,'bg_color'); ?>
                        </div>
                        <?php          }
                }

                // else{ ?>
            </div>
            <fieldset id="create-new-fieldset">
                <legend>More info About This Content</legend>
                <div id="create-new">

                    <div class="row">
                        <label for="ContentMeta_Mini_Desc">Mini  Desc</label>
                        <textarea onfocus="setTextEditor(this)" class="" id="new-desc" name="ContentMetaNew[0][desc]" cols="75" rows="15"></textarea>
                        <!--                </div>-->
                        <!--                <div class="row">-->
                        <label for="ContentMeta_Mini_Desc_Background_Color">Mini  Desc  Background  Color</label>
                        <?php
                        $list = array("bg-pale" => "Pale", "bg-dirty-green" => "Dirty Green", "bg-light-gray" => "Light Gray", "bg-light-pink" => "Light Pink"); ?>

                        <select class="content-meta-bgcolor" name = "ContentMetaNew[0][bg_color]" onchange="setBgOnchange(this);">
                            <option value="0">(Select a color)</option>
                            <?php
                            foreach($list as $k => $v) {
                                echo '<option class="'.$k.'" value="'.$k.'">'.$v.'</option>';
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <?php
                if ($this->enable_add_more_meta) { ?>
                    <div id="add-meta" name="Add More Info">Add More Info</div>
                    <?php            }
                ?>
            </fieldset>
        </div>

    </fieldset>


    <!--	<div class="row">-->
    <!--        --><?php //echo $form->labelEx($Cmodel,'modified'); ?>
    <!--		--><?php //echo $form->textField($Cmodel,'modified'); ?>
    <!--        --><?php //echo $form->error($Cmodel,'modified'); ?>
    <!--	</div>-->

    <div class="row buttons">
        <?php echo CHtml::submitButton($Cmodel->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->