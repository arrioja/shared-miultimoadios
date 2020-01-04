<?php
$this->breadcrumbs=array(
	'Adjuntoses',
);

$this->menu=array(
	array('label'=>'Create Adjuntos', 'url'=>array('create')),
	array('label'=>'Manage Adjuntos', 'url'=>array('admin')),
);
?>

<h1>Adjuntoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
