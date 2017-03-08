<?php
/* @var $this InfouserController */
/* @var $model Infouser */

$this->breadcrumbs=array(
	'Infousers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Infouser', 'url'=>array('index')),
	array('label'=>'Create Infouser', 'url'=>array('create')),
	array('label'=>'View Infouser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Infouser', 'url'=>array('admin')),
);
?>

<h1>Update Infouser <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>