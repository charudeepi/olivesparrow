<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */



$this->pageTitle=Yii::app()->name . ' - Contact Us';
//$this->breadcrumbs=array(
//    'Contact',
//);
?>
<style type="text/css">
    .errorMessage {
        margin-left: 104px;
        margin-top: 28px;
        position: absolute;
        font-size: 14px;
        color: white;
    }
</style>

<!--<h1>Contact Us</h1>-->

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<!--<p>-->
<!--    If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.-->
<!--</p>-->

<div id = "contact-container" class = "left contact-gradient">
    <div class = "contact-inner" style="">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/infographics/olive_iphone.png" alt="" class="phone-bird">
        <div class="form" style="">

            <h1>Contact Olive Sparrow Trainer</h1>

            <p class="left">Contact us to provide you with customized Olive sparrow package  or just a simple advise to best meet your needs.</p>

            <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'contact-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

<!--            <p class="note">Fields with <span class="required">*</span> are required.</p>-->

            <?php echo $form->errorSummary($model); ?>

            <div class="row">
                <?php echo $form->labelEx($model,'name', array ('class' => 'form-label')); ?>
                <?php echo $form->textField($model,'name', array ('class' => 'form-input' )); ?>
                <?php echo $form->error($model,'name'); ?>
            </div>


            <div class="row">
                <?php echo $form->labelEx($model,'email', array ('class' => 'form-label')); ?>
                <?php echo $form->textField($model,'email',  array ('class' => 'form-input')); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'subject',  array ('class' => 'form-label')); ?>
                <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128, 'class' => 'form-input')); ?>
                <?php echo $form->error($model,'subject'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'body',  array ('class' => 'form-label')); ?>
                <?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50, 'class' => 'form-input')); ?>
                <?php echo $form->error($model,'body'); ?>
            </div>

<!--            --><?php //if(CCaptcha::checkRequirements()): ?>
<!--            <div class="row">-->
<!--                --><?php //echo $form->labelEx($model,'verifyCode'); ?>
<!--                <div>-->
<!--                    --><?php //$this->widget('CCaptcha'); ?>
<!--                    --><?php //echo $form->textField($model,'verifyCode'); ?>
<!--                </div>-->
<!--                <div class="hint">Please enter the letters as they are shown in the image above.-->
<!--                    <br/>Letters are not case-sensitive.</div>-->
<!--                --><?php //echo $form->error($model,'verifyCode'); ?>
<!--            </div>-->
<!--            --><?php //endif; ?>

            <div class="row buttons">
                <?php echo CHtml::submitButton('Submit', array ('class' => 'submit-btn')); ?>
            </div>

            <?php $this->endWidget(); ?>


        </div><!-- form -->


    </div>
<!--    <div class="fr" style="margin-top: 22%;">-->
<!--                -->
<!--            </div>-->

</div>

<?php endif; ?>