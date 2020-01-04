<?php
$this->pageTitle=Yii::app()->name . ' - Todos merecemos poder despedirnos';
$this->layout = 'column2users';
?>



<div class="acerca_ancho_box" >
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/1page-img3-bannerline.jpg'); ?>
        </div>

        <div class="marco_titulo">
        <br>
        <strong>Son muchas las personas en el mundo que no tienen esta oportunidad, de poder leer, escuchar e incluso ver a sus seres queridos aunque hayan fallecido.</strong>
        <br><br>
        Imaginate la alegría y el sentimiento que sentirías si en cualquier momento recibes un mensaje de correo diciendote que ese ser querido a quien tanto amabas y que ya no se encuentra contigo te ha dejado un 
        ultimo mensaje y quiere que tu lo veas... Un último mensaje de despedida, una carta de amor, un poema, un mensaje para los hijos, un ultimo abrazo en familia para que sepas que todo estará bien y que esa persona
        siempre te cuidará desde el más allá.
        <br><br>
        Creemos que tu familia merece recibir ese ultimo mensaje que los llenará de alegría cuando estén en momentos de desesperanza, y sabemos que tambien hubieses dado lo que fuese por una ultima oportunidad de escuchar
        a tu ser querido una ultima vez, ¿qué mejor oportunidad para poder hacer realidad este sentimiento para ti y para tu familia? Sabemos que tus seres queridos merecen esto y más!
        <br><br>
        Es por eso que te invitamos a <?php echo CHtml::link('unirte gratis a la oportunidad',$this->createUrl('usuario/create')); ?> de llevar un momento de felicidad adicional a tu familia una vez que ya no te
        encuentres con nosotros y hacerles a ellos un regalo muy especial... un ultimo mensaje.
        </div>
    </div>           
    
</div> <!-- login box -->
    <br><br>
    <?php $this->widget('BloqueMainIzquierda',array('visible'=>true)); ?>
    <?php $this->widget('BloqueMainDerecha',array('visible'=>true)); ?>
