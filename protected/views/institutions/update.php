<?php
/* @var $this InstitutionsController */
/* @var $model Institutions */

$this->breadcrumbs=array(
	'Institutions'=>array('index'),
	$model->institution_id=>array('view','id'=>$model->institution_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Institutions', 'url'=>array('index')),
	array('label'=>'Create Institutions', 'url'=>array('create')),
	array('label'=>'View Institutions', 'url'=>array('view', 'id'=>$model->institution_id)),
	array('label'=>'Manage Institutions', 'url'=>array('admin')),
);
?>

<h1>Update Institutions <?php echo $model->institution_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>