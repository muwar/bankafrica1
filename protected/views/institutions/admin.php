<?php
/* @var $this InstitutionsController */
/* @var $model Institutions */

$this->breadcrumbs=array(
	'Institutions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Institutions', 'url'=>array('index')),
	array('label'=>'Create Institutions', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#institutions-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Institutions</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'institutions-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'institution_id',
		'institution_name',
		'institution_officialname',
		'institution_sector',
		'institution_tel1',
		'institution_tel2',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
