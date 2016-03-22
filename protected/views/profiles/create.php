<?php
/* @var $this ProfilesController */
/* @var $model Profiles */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	'Create',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>