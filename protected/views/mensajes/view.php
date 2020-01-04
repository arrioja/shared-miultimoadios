<?php $this->pageTitle=Yii::app()->name." - Vista previa del mensaje"; ?>

<?php
$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Mensajes', 'url'=>array('index')),
	array('label'=>'Create Mensajes', 'url'=>array('create')),
	array('label'=>'Update Mensajes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mensajes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mensajes', 'url'=>array('admin')),
);
?>
<br>
<div class="vista_mensaje_top">
    <h1>Un mensaje para usted...</h1>
    <div class="vista_enlaces_top">
        <?php If (Yii::app()->user->isGuest == false)
              { ?>
            <a href="<?=Yii::app()->createUrl('mensajes/admin');?>"><img src="<?php echo Yii::app()->baseUrl; ?>/images/botones/documentos_small.png" alt="" /></a>
        <?php } ?>
    </div>
    <div class="vista_mensaje_encabezado">
        <br>
        De: <?php echo $model->Usr->FirstName." ".$model->Usr->LastName; ?>
        <br>
        Para: <?php echo $model->para; ?><br>        
    </div>
    <br><br>
</div>
<div class="vista_mensaje_mid">
    <div class="vista_mensaje_mid_cuerpo">
        <strong><?php echo $model->asunto; ?></strong>
        <br><br>
        <?php echo $model->cuerpo; ?>
        <br><br>
    </div>
</div>
<div class="vista_mensaje_bottom">
    <div class="vista_enlaces_bottom">
    <?php If (Yii::app()->user->isGuest == false)
          { ?>
        <a href="<?=Yii::app()->createUrl('mensajes/admin');?>"><img src="<?php echo Yii::app()->baseUrl; ?>/images/botones/documentos_small.png" alt="" /></a>
    <?php } ?>
    </div>
    <br><br><br><br>
</div>
<div class="hint">Este mensaje ha sido dejado por un usuario para ser leído por la persona dueña de la dirección de correo arriba especificada y
                  MiUltimoAdios.com no es responsable del contenido del mismo. Si usted cree que este servicio le ha sido de utilidad, considere <?php echo CHtml::link('registrarse gratis',$this->createUrl('usuario/create')); ?>.
</div>

<?php

/*
 *
id: <?php echo $model->id; ?> <br>
#<?php echo $model->id; ?>

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        'estatus',
		'para',
        'asunto',
		'cuerpo',				
	),
));

 */
  ?>
 
