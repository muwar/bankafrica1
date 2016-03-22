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
<div class="container">
    <div class="row" align="center">

        <div class="col-md-6 col-md-offset-6">
            <?php echo $this->renderPartial('_form', array('model' => $model, 'model1' => $model1)); ?>
        </div>
    </div>
</div>