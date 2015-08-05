<style type="text/css">
    #yw0 .view {
        border: 1px solid #CCCCCC;
        padding: 2px;
        margin-bottom: 2px;
    }

    .operations li a{
        color: black;
    }

</style>
<?php
/* @var $this ContentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contents',
);

$this->menu=array(
	array('label'=>'Create Content', 'url'=>array('create')),
	array('label'=>'Manage Content', 'url'=>array('admin')),
);
?>

<h1>Contents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
