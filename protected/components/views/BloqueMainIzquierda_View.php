<div class="main_bloque_izquierdo">
    <div class="main_bloque_titulo">
        <?=CHtml::link('Todos merecemos poder despedirnos',Yii::app()->createUrl('/site/page', array('view'=>'merecemos_despedirnos')));?>
    </div>
    <div class="main_bloque_imagen">
        <?php echo CHtml::image(Yii::app()->baseUrl.'/images/1page-img1.jpg'); ?>
    </div>
    <div class="main_bloque_descripcion">
        <div class="main_bloque_descripcion_interna">
            <?php echo "Usted merece la oportunidad de despedirse de sus seres queridos en caso de que algo le pase y ya no esté entre nosotros."; ?>
            <?=CHtml::link('Leer más',Yii::app()->createUrl('/site/page', array('view'=>'merecemos_despedirnos')), array('class'=>'main_bloque_descripcion_interna_link'));?>
        </div>
    </div>
</div>


