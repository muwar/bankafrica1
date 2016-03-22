<?php
/* @var $this EvutiController */
/* @var $model Evuti */

$this->breadcrumbs=array(
	'Evutis'=>array('index'),
	$model->cdos,
);

$this->menu=array(
	array('label'=>'List Evuti', 'url'=>array('index')),
	array('label'=>'Create Evuti', 'url'=>array('create')),
	array('label'=>'Update Evuti', 'url'=>array('update', 'id'=>$model->cdos)),
	array('label'=>'Delete Evuti', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cdos),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Evuti', 'url'=>array('admin')),
);
?>

<h1>View Evuti #<?php echo $model->cdos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cdos',
		'uti',
		'nom',
		'sur',
		'pswd',
		'pro',
		'rmk',
		'utic',
		'utimo',
		'dou',
		'dmo',
	),
)); ?>
