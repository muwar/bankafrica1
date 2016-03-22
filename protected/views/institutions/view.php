<?php
/* @var $this InstitutionsController */
/* @var $model Institutions */

$this->breadcrumbs=array(
	'Institutions'=>array('index'),
	$model->institution_id,
);

$this->menu=array(
	array('label'=>'List Institutions', 'url'=>array('index')),
	array('label'=>'Create Institutions', 'url'=>array('create')),
	array('label'=>'Update Institutions', 'url'=>array('update', 'id'=>$model->institution_id)),
	array('label'=>'Delete Institutions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->institution_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Institutions', 'url'=>array('admin')),
);
?>

<h1>View Institutions #<?php echo $model->institution_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'institution_id',
		'institution_name',
		'institution_officialname',
		'institution_sector',
		'institution_tel1',
		'institution_tel2',
		'institution_email',
		'institution_website',
		'institution_cr',
		'institution_tr',
		'institution_dc',
		'institution_dlm',
		'user_id',
		'logo_pic_data',
		'logo_filename',
		'logo_filesize',
		'logo_filetype',
		'gdp_ly',
		'bizdate_creation',
		'tpcn',
		'countries_id',
	),
)); ?>
