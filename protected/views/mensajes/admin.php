<?php
$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Mensajes', 'url'=>array('index')),
	array('label'=>'Create Mensajes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mensajes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <div class="main_bloque_titulo">
        <?php echo "<strong>Administración de mensajes.</strong>"; ?>
    </div>
    <div class="left">
        <?php $this->widget('MeBarraHerramientas',array('visible'=>true)); ?>
    </div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mensajes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		id,
		'para',
//		'cuerpo',
		'asunto',
		'estatus',
//        'cod_registro',
//        'cod_envio',
		array(            
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
    $nro_mensajes = count(Usuario::model()->findByPk(Yii::app()->user->ID)->Msgs);
    // Si el usuario no es premium y además no tiene más mensajes disponibles, se le muestra
    // este mensajito fastidioso.
    If ((Usuario::model()->findByPk(Yii::app()->user->ID)->codRol->level < 20) &&
        (1-$nro_mensajes <= 0))
        { ?>
            <div class="flash-error">
            <?php echo "Usted se encuentra usando una Cuenta Gratuita, en este tipo de cuenta, usted sólo cuenta con
                        un (1) mensaje para su seres queridos (mismo que ya ha utilizado). Si considera que otros seres queridos merecen recibir un mensaje de su parte, le invitamos a conocer las ventajas de nuestra cuenta ".CHtml::link('Premium!)',Yii::app()->createUrl('/site/page', array('view'=>'ventajas_premium')));?>

            </div>            
       <?php }
    
?>




