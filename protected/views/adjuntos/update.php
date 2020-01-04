<?php
$this->breadcrumbs=array(
	'Adjuntoses'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Adjuntos', 'url'=>array('index')),
	array('label'=>'Create Adjuntos', 'url'=>array('create')),
	array('label'=>'View Adjuntos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Adjuntos', 'url'=>array('admin')),
);
?>

<h1>Update Adjuntos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>