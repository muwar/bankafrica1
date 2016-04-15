<?php
/* @var $this EvutiController */
/* @var $model Evuti */

$this->breadcrumbs = array(
    'Evutis' => array('index'),
    'Create',
);
/*
  $this->menu=array(
  array('label'=>'List Evuti', 'url'=>array('index')),
  array('label'=>'Manage Evuti', 'url'=>array('admin')),
  );
 */
?>
<?php echo $this->renderPartial('_form', array('model' => $model, 'model1' => $model1)); ?>