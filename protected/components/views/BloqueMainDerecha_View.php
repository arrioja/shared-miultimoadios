<div class="main_bloque_derecho">
    <div class="main_bloque_titulo">
        <?=CHtml::link('Historias de Éxito',Yii::app()->createUrl('/site/page', array('view'=>'historias_de_exito')));?>
    </div>
    <div class="main_bloque_imagen">
        <?php echo CHtml::image(Yii::app()->baseUrl.'/images/4page-img3.jpg'); ?>
    </div>
    <div class="main_bloque_descripcion">
        <div class="main_bloque_descripcion_interna">
            <?php echo "Conozca las historias de éxito de nuestro sitio web y cómo un último mensaje desde el más allá le puede cambiar la vida."; ?>
            <?=CHtml::link('Leer más',Yii::app()->createUrl('/site/page', array('view'=>'historias_de_exito')), array('class'=>'main_bloque_descripcion_interna_link'));?>
        </div>
    </div>
</div>


