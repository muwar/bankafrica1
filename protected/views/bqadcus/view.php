<?php
/* @var $this BqadcusController */
/* @var $model Bqadcus */

$this->breadcrumbs=array(
	'Bqadcuses'=>array('index'),
	$model->cdos,
);

$this->menu=array(
	array('label'=>'List Bqadcus', 'url'=>array('index')),
	array('label'=>'Create Bqadcus', 'url'=>array('create')),
	array('label'=>'Update Bqadcus', 'url'=>array('update', 'id'=>$model->cdos)),
	array('label'=>'Delete Bqadcus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cdos),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bqadcus', 'url'=>array('admin')),
);
?>

<h1>View Bqadcus #<?php echo $model->cdos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cdos',
		'cus',
		'typ',
		'val',
		'uti',
		'utimo',
		'dou',
		'dmo',
	),
)); ?>
