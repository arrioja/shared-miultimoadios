<?php
$this->breadcrumbs=array(
	'Adjuntoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Adjuntos', 'url'=>array('index')),
	array('label'=>'Manage Adjuntos', 'url'=>array('admin')),
);
?>

<h1>Create Adjuntos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>