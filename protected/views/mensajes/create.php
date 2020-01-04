<?php $this->pageTitle=Yii::app()->name." - ¿Que mensaje le dejarás a tus seres queridos?"; ?>
<?php
$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Mensajes', 'url'=>array('index')),
	array('label'=>'Administrar Mensajes', 'url'=>array('admin')),
);
?>

    <div class="main_bloque_titulo">
        <?php echo "<strong>Crear un nuevo mensaje.</strong>"; ?>
    </div>

<br>
<?php echo "Escriba un mensaje, desde el corazón para sus seres queridos; este mensaje será entregado a su destinatario (Para) cuando ya usted no se encuentre entre nosotros."; ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>