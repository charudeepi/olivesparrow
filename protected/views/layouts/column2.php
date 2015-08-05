<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<style type="text/css">
    #sidebar{
        float: right;
        border: 1px solid #CCCCCC;
        padding: 5px;;
    }
</style>

<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>