<?php
/* @var $this ContentController */
/* @var $data Content */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcontent'));

        ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcontent), array('view', 'id'=>$data->idcontent)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title'));  ?>:</b>
	<?php echo CHtml::encode($data->title);  ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
   	<?php echo CHtml::encode($data->image); ?>
   	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

<!--    <b>--><?php //echo CHtml::encode($data->getAttributeLabel('desc')); ?><!--:</b>-->
<!--   	--><?php //echo CHtml::encode($data->desc); ?>
<!--   	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>