<style type="text/css">
    .operations li a{
            color: black;
        }
</style>

<!--<script src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/js/rs.js"></script>-->
<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Manage Content', 'url'=>array('admin')),
);
?>

<h1>Create Content</h1>

<?php echo $this->renderPartial('_form', array('Cmodel'=>$Cmodel, 'Mmodel' => $Mmodel)); ?>