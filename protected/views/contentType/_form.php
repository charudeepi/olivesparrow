<?php
/* @var $this ContentTypeController */
/* @var $model ContentType */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content-type-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'type'); ?>
		<?php //echo $form->textField($model,'type',array('size'=>60,'maxlength'=>255)); ?>
<!--		--><?php //echo $form->error($model,'type'); ?>
<!--	</div>-->

    <div class="row">

        <?php echo $form->labelEx($model,'type'); ?>
        <?php
        $type = array("training" => "Training", "resource" => "Resource");
        echo $form->dropDownList($model,'type',$type); ?>
        <?php echo $form->error($model,'type'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'icon'); ?>
        <?php echo CHtml::activeFileField($model, 'icon'); ?>  
        <?php echo $form->error($model,'icon'); ?>
    </div>
    <?php if($model->isNewRecord!='1'){ ?>
        <div class="row">
             <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/contentType/'.$model->icon,"icon",array("width"=>200)); ?> 
        </div>
    <?php }?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->