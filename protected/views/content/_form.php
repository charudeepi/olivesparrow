<?php
/* @var $this ContentController */
/* @var $Cmodel Content */
/* @var $form CActiveForm */
//if($Cmodel["idtype"] != 0 && $Cmodel["idtype"] != ''){
//    $idtype = $Cmodel["idtype"];
//}else{
//    $idtype = '1';
//}
?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script type= 'text/javascript '>

    $(document).ready(function(){
        $('#Content_image').live('change',function(){
            var v = $(this).val();
            $('#fill_image img').attr('src',v);
        });


        CKEDITOR.replace( 'editor1', {
            uiColor: '#14B8C4'
        });

//        $( ".container1" ).keyup(function() {
//           var contValue = $(".container1").html;
//          $("#editor2").append(contValue);
//        });


//        CKEDITOR.on( 'instanceCreated', function( event ) {
//            var editor = event.editor,
//                    element = editor.element;
//
//            // Customize editors for headers and tag list.
//            // These editors don't need features like smileys, templates, iframes etc.
//            if ( element.is( 'h1', 'h2', 'h3' ) || element.getAttribute( 'id' ) == 'taglist' ) {
//                // Customize the editor configurations on "configLoaded" event,
//                // which is fired after the configuration file loading and
//                // execution. This makes it possible to change the
//                // configurations before the editor initialization takes place.
//                editor.on( 'configLoaded', function() {
//
//                    // Remove unnecessary plugins to make the editor simpler.
//                    editor.config.removePlugins = 'colorbutton,find,flash,font,' +
//                            'forms,iframe,image,newpage,removeformat,' +
//                            'smiley,specialchar,stylescombo,templates';
//
//                    // Rearrange the layout of the toolbar.
//                    editor.config.toolbarGroups = [
//                        { name: 'editing',		groups: [ 'basicstyles', 'links' ] },
//                        { name: 'undo' },
//                        { name: 'clipboard',	groups: [ 'selection', 'clipboard' ] },
//                        { name: 'about' }
//                    ];
//                });
//            }
//        });

    });


</script>


<!--<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>-->

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

    <!--    <div class="row">-->
    <!--        --><?php //echo $form->labelEx($Cmodel,'description'); ?>
    <?php //echo $form->textArea($Cmodel,'description',array('size'=>60,'maxlength'=>255)); ?>
    <!--        --><?php //echo $form->error($Cmodel,'description'); ?>
    <!--    </div>-->


    <div class="row">
        <?php echo $form->labelEx($Cmodel,'image'); ?>
        <?php echo CHtml::activeFileField($Cmodel, 'image'); ?>
        <?php echo $form->error($Cmodel,'image'); ?>
    </div>
    <?php if($Cmodel->isNewRecord!='1'){ ?>
    <div class="row" id="fill_image">
        <?php //echo CHtml::image(Yii::app()->baseUrl.'/images/'.$Cmodel->image,"image",array("width"=>200));?>
        <?php
//        if(Yii::app()->request->baseUrl == '/olive') {
//            $bucket = '200px';
//        }else{
//            $bucket = 'infographics';
//        }
        $bucket = 'infographics';
        ?>
        <?php echo CHtml::image('https://s3.amazonaws.com/olivesparrow/'.$bucket.'/'.$Cmodel->image,"image",array("width"=>200));?>
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
    <!--<style rel="stylesheet" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/js/ckeditor/sample.css"></style>-->

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
    <div class="row">
        <?php echo $form->labelEx($Cmodel,'status'); ?>
        <?php
        $status = array("0" => "Draft", "1" => "Publish");
        echo $form->dropDownList($Cmodel,'status',$status); ?>
        <?php echo $form->error($Cmodel,'status'); ?>
    </div>
    <textarea cols="80" id="editor1" name=Content[description] rows="100" style = 'height:500px'>
        <?php


        echo $Cmodel['description'];
//        echo $Mmodel['meta_value'];
//        print_r($Mmodel['meta_key']['description']);
//        if(isset($Mmodel['meta_key']) &&  $Mmodel['meta_key'] = 'description'){
//        echo $Mmodel['meta_value'];
//    }
        ?>
    </textarea>

    <div class="row buttons">
        <?php echo CHtml::submitButton($Cmodel->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>

</textarea>



