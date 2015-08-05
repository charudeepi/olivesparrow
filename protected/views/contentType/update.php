<?php
/* @var $this ContentTypeController */
/* @var $model ContentType */

$this->breadcrumbs=array(
	'Content Types'=>array('index'),
	$model->title=>array('view','id'=>$model->idtype),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContentType', 'url'=>array('index')),
	array('label'=>'Create ContentType', 'url'=>array('create')),
	array('label'=>'View ContentType', 'url'=>array('view', 'id'=>$model->idtype)),
	array('label'=>'Manage ContentType', 'url'=>array('admin')),
);
?>

<h1>Update ContentType <?php echo $model->idtype; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>