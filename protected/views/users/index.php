<?php
/* @var $this EvutiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evutis',
);

$this->menu=array(
	array('label'=>'Create Evuti', 'url'=>array('create')),
	array('label'=>'Manage Evuti', 'url'=>array('admin')),
);
?>

<h1>Evutis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
