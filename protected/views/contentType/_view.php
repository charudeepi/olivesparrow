<?php
/* @var $this ContentTypeController */
/* @var $data ContentType */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('idtype')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtype), array('view', 'id'=>$data->idtype)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />


</div>