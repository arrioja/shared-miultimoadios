<div class="main_bloque_grande">
    <div class="main_bloque_grande_titulo">
        <?=CHtml::link('Esperanza...',Yii::app()->createUrl('/site/page', array('view'=>'como_funciona')));?>
    </div>
    <div class="main_bloque_grande_imagen">
        <?php //echo CHtml::image(Yii::app()->baseUrl.'/images/1page-img3.jpg'); ?>
    </div>
    <div class="main_bloque_grande_descripcion">
        <div class="main_bloque_descripcion_interna">
            <?php echo "Nosotros comprendemos el dolor y la soledad que siente tras sufrir la partida de un ser querido, es algo que nunca se olvida, por ello que creemos firmemente en que todos merecemos poder despedirnos dignamente. Nosotros le brindamos la oportunidad de darle a su familia un ultimo mensaje de su parte, que les dará la calma que necesitan en ese momento de dolor. Conozca cómo funcionamos..."; ?>
            <br><br>            
            <a class="main_bloque_grande_descripcion_interna_link" href="<?= Yii::app()->createUrl('/site/page', array('view'=>'como_funciona'));?>"><b>Quiero saber más</b></a>
        </div>
    </div>
</div>


