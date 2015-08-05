<style>
    .operations li a{
        color: black;
    }
</style>

<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$Cmodel->title=>array('view','id'=>$Cmodel->idcontent),
	'Update',
);

$this->menu=array(
	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Create Content', 'url'=>array('create')),
	array('label'=>'View Content', 'url'=>array('view', 'id'=>$Cmodel->idcontent)),
	array('label'=>'Manage Content', 'url'=>array('admin')),
);
?>

<h1 style="color:#7C9607">You are updating "<?php echo $Cmodel->type.' '.$Cmodel->title; ?>"</h1>

<?php echo $this->renderPartial('_form', array('Cmodel'=>$Cmodel, 'Mmodel' => $Mmodel)); ?>