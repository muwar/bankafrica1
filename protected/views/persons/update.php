<?php
/* @var $this PersonsController */
/* @var $model Persons */

$this->breadcrumbs=array(
	'Persons'=>array('index'),
	$model->person_id=>array('view','id'=>$model->person_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Persons', 'url'=>array('index')),
	array('label'=>'Create Persons', 'url'=>array('create')),
	array('label'=>'View Persons', 'url'=>array('view', 'id'=>$model->person_id)),
	array('label'=>'Manage Persons', 'url'=>array('admin')),
);
?>

<h1>Update Persons <?php echo $model->person_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>