<div class="buscar_margen">
    <div class="img_busqueda_izda">
        <?php echo CHtml::image(Yii::app()->baseUrl.'/images/buscar_left.jpg'); ?>
    </div>
    <?php echo CHtml::beginForm(Yii::app()->createUrl('documents/SearchBox'),'get'); ?>
        <div class="buscar_texto">
            <?php echo CHtml::textField('buscar','',array('id'=>'buscar', 'class' =>'text_blanco_busqueda','tabindex'=>'1'));?>
        </div>
        <div class="buscar_boton">
            <?php echo CHtml::submitButton('', array('id' =>'boton_negro_buscar','tabindex'=>'4'));?>
        </div>
    <?php echo CHtml::endForm(); ?>
    <div class="buscar_texto">
        <?php echo CHtml::image(Yii::app()->baseUrl.'/images/buscar_right.jpg'); ?>
    </div>
</div>


