<?php
$this->breadcrumbs=array(
	'Adjuntoses'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Adjuntos', 'url'=>array('index')),
	array('label'=>'Create Adjuntos', 'url'=>array('create')),
	array('label'=>'Update Adjuntos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Adjuntos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Adjuntos', 'url'=>array('admin')),
);
?>

<h1>View Adjuntos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mid',
		'title',
		'ext',
		'url',
		'upload_date',
		'status_id',
	),
)); ?>
