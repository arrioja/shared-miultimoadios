<div class="main_bloque_centro">
    <div class="main_bloque_titulo">
        <?=CHtml::link('Un mensaje que no esperabas',Yii::app()->createUrl('/site/page', array('view'=>'mensaje_inesperado')));?>
    </div>
    <div class="main_bloque_imagen">
        <?php echo CHtml::image(Yii::app()->baseUrl.'/images/1page-img3.jpg'); ?>
    </div>
    <div class="main_bloque_descripcion">
        <div class="main_bloque_descripcion_interna">
            <?php echo "Que significaría para usted recibir un último mensaje de sus seres queridos que han pasado a mejor vida?"; ?>
            <?=CHtml::link('Leer más',Yii::app()->createUrl('/site/page', array('view'=>'mensaje_inesperado')), array('class'=>'main_bloque_descripcion_interna_link'));?>
        </div>
    </div>
</div>


