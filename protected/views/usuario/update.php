<?php
/*$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(

	array('label'=>'View Usuario', 'url'=>array('view', 'id'=>$model->id)),
	
);*/
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'accion'=>'editar')); ?>