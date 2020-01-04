<?php

$this->pageTitle=Yii::app()->name . ' - Registro de nuevo usuario';
$this->layout = 'column2users';

//$this->breadcrumbs=array( 'Usuarios'=>array('index'), 'Create', );

If(isset(Yii::app()->user->rol) && Yii::app()->user->rol == 'Root')
{
    $this->menu=array(
        array('label'=>'List Usuario', 'url'=>array('index')),
        array('label'=>'Manage Usuario', 'url'=>array('admin')),
    );
}


?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>