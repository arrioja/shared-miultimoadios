
<div class="herramientas_ancho_widget">
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/populares_top_icon.jpg'); ?>
        </div>
        <div class="marco_titulo" style="font-size:12pt;">+ Destacados </div>
    </div>
    <div class="marco_cuerpo_salmon" id="herramientas_ancho_cuerpo_widget">            
            <?php echo Usuario::destacados(); ?>
    </div> <!-- login box bg -->

</div> <!-- login box -->







