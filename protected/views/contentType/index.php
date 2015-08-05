<style type="text/css">
    #yw0 .view {
        border: 1px solid #CCCCCC;
        padding: 2px;
        margin-bottom: 2px;
    }
</style>
<?php
/* @var $this ContentTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Content Types',
);

$this->menu=array(
	array('label'=>'Create ContentType', 'url'=>array('create')),
	array('label'=>'Manage ContentType', 'url'=>array('admin')),
);
?>

<h1>Content Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
