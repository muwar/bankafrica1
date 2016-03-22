<?php
/* @var $this PersonsController */
/* @var $model Persons */

$this->breadcrumbs=array(
	'Persons'=>array('index'),
	$model->person_id,
);

$this->menu=array(
	array('label'=>'List Persons', 'url'=>array('index')),
	array('label'=>'Create Persons', 'url'=>array('create')),
	array('label'=>'Update Persons', 'url'=>array('update', 'id'=>$model->person_id)),
	array('label'=>'Delete Persons', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->person_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Persons', 'url'=>array('admin')),
);
?>

<h1>View Persons #<?php echo $model->person_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'person_id',
		'user_id',
		'person_surname',
		'person_middlename',
		'persons_othername',
		'person_dob',
		'person_pob',
		'person_mname',
		'person_fname',
		'person_gender',
		'person_tel1',
		'person_tel2',
		'person_email',
		'person_rcountry',
		'person_profession',
		'person_dc',
		'person_dlm',
		'profession_id',
		'countries_id',
	),
)); ?>
