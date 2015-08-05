<?php
/* @var $this ContentTypeController */
/* @var $model ContentType */

$this->breadcrumbs=array(
	'Content Types'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ContentType', 'url'=>array('index')),
	array('label'=>'Create ContentType', 'url'=>array('create')),
	array('label'=>'Update ContentType', 'url'=>array('update', 'id'=>$model->idtype)),
	array('label'=>'Delete ContentType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtype),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentType', 'url'=>array('admin')),
);
?>

<h1>View ContentType #<?php echo $model->idtype; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idtype',
		'title',
		'type',
		 array(        
                     'name'=>'icon',
					 'type'=>'html',
                     'value'=>  CHtml::image(Yii::app()->request->baseUrl.'/images/contentType/'.$model->icon,"icon",array("width"=>200)),
                ),
		
		
	),
)); ?>
