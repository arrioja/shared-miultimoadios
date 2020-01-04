<?php
$this->pageTitle=Yii::app()->name . ' - Cómo funciona nuestro sitio web?';
$this->layout = 'column2users';
?>

<div class="acerca_ancho_box" >
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/4page-img1-bannerline.jpg'); ?>
        </div>        
        <br>
        <strong>Una excelente oportunidad de dar paz y esperanza a su familia en caso de que algo le pase a usted, de una manera muy comprensible, simple y fácil...</strong>
        <br><br>
            Queremos darle paz mental, por esta razón nos hemos tomado el tiempo de hacer el uso de nuestra web muy fácil. Tan fácil como preparar un correo que será enviado cuando el momento llegue.
            En sólo tres pasos, funcionamos de la siguiente manera:
        <br><br>
        <div class="texto_como_funciona_paso1">
            <strong>1.- Usted se inscribe de manera gratuita en nuestro sitio web</strong>, usando nuestra sencilla pantalla, donde colocará algunos datos de contacto y la información necesaria para acceder al sitio web.
        </div>        
        <div class="texto_como_funciona_paso2">
            <strong>2.- Redacte un mensaje que será entregado a sus seres queridos cuando llegue el momento de su partida</strong>, en primera instancia, usted puede <?php echo CHtml::link('redactar',Yii::app()->createUrl('/mensajes/create'));?> un mensaje de texto que será enviado a la dirección de correo electónico de su ser querido del cual desea despedirse, adicionalmente, si usted así lo decide, podrá optar por colocar fotos, audios y videos.
        </div>        
        <div class="texto_como_funciona_paso3">
            <strong>3.- Periódicamente le enviaremos un correo para que nos diga que se encuentra bien</strong>, No se preocupe, no le enviaremos tantos correos, sólo un email cada 15 días o cada mes, al cual usted sólo tendrá que hacerle click y listo, así sabremos que se encuentra bien.
        </div>
        
        <br><br><br><br><br><br><br><br><br><br>
        
        
        <br><br>
        
        <div class="marco_titulo">
            Es así de simple!, <?php echo CHtml::link('únete a nuestra creciente comunidad',$this->createUrl('usuario/create')); ?> de personas que queremos aliviar el sufrimiento de nuestra familia cuando ya no estemos con ellos...
        </div>
    </div>           
    
</div> <!-- login box -->
