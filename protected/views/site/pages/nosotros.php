<?php
$this->pageTitle=Yii::app()->name . ' - Sobre Nosotros';
$this->layout = 'column2users';
?>
<br>
<div class="acerca_ancho_box" >
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/logo_pequeno.png'); ?>
        </div>
    </div>
<br><br>

    <div class="marco_cuerpo_salmon">
        <h3>Llevamos un mensaje de paz cuando las familias más lo necesitan...</h3>
        <br>
        Gracias por tomarse unos momentos para leer estas líneas, MiUltimoAdios.com nace con la idea de poder llevar un último mensaje de amor a las familias cuando se encuentran en sus momentos más dolorosos por la pérdida de un ser querido.
        <br><br>
        Sabemos que para usted significaría mucho poder leer, escuchar e incluso ver a esa persona especial una vez más, sobre todo si ya no la podrá ver con vida de nuevo; ¿cuánto daría por poder escuchar su voz?, ¿por saber cuáles fueron sus ultimos pensamientos?, ¿sus últimas palabras para usted?.
        <br><br>
        De eso se trata nuestro sitio, de poder brindar esa satisfacción a sus familiares cuando ese momento inevitable llegue.
        <br>
        <br>
        MiUltimoAdiós.com es un sitio web perteneciente a la Corporación SkyBusiNet, quien gracias a un grupo de jóvenes innovadores lleva hasta sus manos ideas que le llenarán de esperanza.
        <br>
        <br>
        Si lo desea, puede ponerse en <?php echo CHtml::link('contacto',$this->createUrl('site/contact')); ?> con nosotros.
    </div> <!-- login box bg -->
</div> <!-- login box -->
