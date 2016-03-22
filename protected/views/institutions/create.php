<?php
/* @var $this InstitutionsController */
/* @var $model Institutions */

$this->breadcrumbs=array(
	'Institutions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Institutions', 'url'=>array('index')),
	array('label'=>'Manage Institutions', 'url'=>array('admin')),
);
?>

<h1>Create Institutions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>