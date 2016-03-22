<?php
/* @var $this BqadcusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bqadcuses',
);

$this->menu=array(
	array('label'=>'Create Bqadcus', 'url'=>array('create')),
	array('label'=>'Manage Bqadcus', 'url'=>array('admin')),
);
?>

<h1>Bqadcuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
