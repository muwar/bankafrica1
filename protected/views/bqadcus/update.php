<?php
/* @var $this BqadcusController */
/* @var $model Bqadcus */

$this->breadcrumbs=array(
	'Bqadcuses'=>array('index'),
	$model->cdos=>array('view','id'=>$model->cdos),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bqadcus', 'url'=>array('index')),
	array('label'=>'Create Bqadcus', 'url'=>array('create')),
	array('label'=>'View Bqadcus', 'url'=>array('view', 'id'=>$model->cdos)),
	array('label'=>'Manage Bqadcus', 'url'=>array('admin')),
);
?>

<h1>Update Bqadcus <?php echo $model->cdos; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>