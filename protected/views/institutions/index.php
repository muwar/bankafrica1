<?php
/* @var $this InstitutionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Institutions',
);

$this->menu=array(
	array('label'=>'Create Institutions', 'url'=>array('create')),
	array('label'=>'Manage Institutions', 'url'=>array('admin')),
);
?>

<h1>Institutions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
