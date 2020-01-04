<?php
$this->breadcrumbs=array(
	'Usuarios',
);

If(isset(Yii::app()->user->rol) && Yii::app()->user->rol == 'Root')
{
  $this->menu=array(
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
}




?>

<h1>Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
