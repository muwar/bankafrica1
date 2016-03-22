<?php
/* @var $this BqadcusController */
/* @var $model Bqadcus */

$this->breadcrumbs=array(
	'Bqadcuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bqadcus', 'url'=>array('index')),
	array('label'=>'Manage Bqadcus', 'url'=>array('admin')),
);
?>

<h1>Create Bqadcus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>