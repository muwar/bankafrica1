
<div id="page-wrapper" style="background: #e7e7e7;">
    <div class="row" style="padding-top: 3%;">

<?php
/* @var $this EvutiController */
/* @var $model Evuti */

$this->breadcrumbs=array(
	'Evutis'=>array('index'),
	$model->cdos=>array('view','id'=>$model->cdos),
	'Update',
);

$this->menu=array(
	array('label'=>'List Evuti', 'url'=>array('index')),
	array('label'=>'Create Evuti', 'url'=>array('create')),
	array('label'=>'View Evuti', 'url'=>array('view', 'id'=>$model->cdos)),
	array('label'=>'Manage Evuti', 'url'=>array('admin')),
);
?>

<h1>Update Evuti <?php echo $model->cdos; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
    </div>