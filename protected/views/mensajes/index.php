<?php
$this->breadcrumbs=array(
	'Mensajes',
);

$this->menu=array(
	array('label'=>'Create Mensajes', 'url'=>array('create')),
	array('label'=>'Manage Mensajes', 'url'=>array('admin')),
);
?>

<h1>Estos mensajes se enviarán cuando llegue el momento</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
