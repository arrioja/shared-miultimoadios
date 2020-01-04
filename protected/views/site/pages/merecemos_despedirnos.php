<?php
$this->pageTitle=Yii::app()->name . ' - Todos merecemos poder despedirnos';
$this->layout = 'column2users';
?>



<div class="acerca_ancho_box" >
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/1page-img1-bannerline.jpg'); ?>
        </div>

        <div class="marco_titulo">
        <br>
        <strong>¿Conoces algún ser querido que se haya ido de este mundo antes de tiempo?<br>
        ¿Ese ser querido tuvo la oportunidad de despedirse de usted?</strong>
        <br><br>
        De eso se trata precisamente nuestro sitio web, nosotros creemos firmemente que todos merecemos la oportunidad de poder despedirnos de nuestros seres queridos cuando pasemos ese puente inevitable hacia el otro mundo,
        sin embargo casi nadie tiene la oportunidad real de hacerlo; ¿por qué? porque simplemente desconocemos el momento preciso en que moriremos, pensando en esto, te damos la oportunidad de que te despidas de tus seres queridos
        incluso si ya no estás entre nosotros, tienes la oportunidad de decir las cosas que nunca pudiste decir, disculparte, enviar un ultimo mensaje a tus seres queridos para que sepan que incluso en la muerte, tu siempre los amas.
        <br><br>
        Gracias a nuestro sitio web, todos tus seres queridos podrán recibir tus mensajes en caso de que mueras; podrás descansar sabiendo que las personas que amas recibieron tu mensaje y que todos tendrán
        consuelo sabiendo cómo te sentías cuando estabas en vida, cuanto los amabas y todo lo que desees decirle a las personas a las que "no abamas tanto" ;-)
        <br><br>
        Pedir perdón por eso que hiciste y nunca quisiste que se supiera, decirle a tu jefe exactamente lo que deseas decirle pero nunca pudiste por razones obvias, o quizás dejarle un mensaje a tus hijos, a tu madre o padre,
        a tu esposo o esposa una vez que hayas dejado este mundo. Pruébalo, es gratis!. <?php echo CHtml::link('Regístrate ahora!',$this->createUrl('usuario/create')); ?>
        </div>
    </div>           
    
</div> <!-- login box -->
    <br><br>
    <?php $this->widget('BloqueMainCentro',array('visible'=>true)); ?>
    <?php $this->widget('BloqueMainDerecha',array('visible'=>true)); ?>