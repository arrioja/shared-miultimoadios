<?php
$this->pageTitle=Yii::app()->name . ' - Todos merecemos poder despedirnos';
$this->layout = 'column2users';
?>



<div class="acerca_ancho_box" >
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/4page-img3-bannerline.jpg'); ?>
        </div>        
        <br>
        <strong>Recibir un mensaje de tus seres queridos fallecidos puede ser la luz que necesitas para poder salir adelante en ese amargo momento...</strong>
        <br><br>
            Conozca de primera mano algunos de los correos que los familiares de nuestros usuarios nos han enviado para compartir con nosotros cómo se sintieron cuando recibieron el mensaje de sus ser querido fallecido...
        <br><br><br>
        <div class="texto_citado">
            "Cuando mi padre murió en ese accidente, la noticia nos destrozó por dentro, quedamos solas mi madre y yo. Papá siempre nos decía que nos quería mucho, pero debo igual nos sentíamos desoladas porque el era el pilar de nuestra familia. Cuando recibimos la notificación de que el nos había dejado un mensaje en MiUltimoAdios.com en caso de que el muriera, fue como una luz en medio de la oscuridad, corrimos a llamar a mis tías y juntos leímos todo lo que nos tenía que decir, lloramos y conseguimos la calma que tanto estabamos buscando. Gracias a todos los de la página Miultimoadios.com porque ustedes nos han cambiado la vida, ahora yo también uso el sitio web porque uno nunca sabe cuando puede pasar algo y de repente ya no estaremos vivos.".
        </div>
        <div class="texto_citado_autor">
            Carmen Ramirez - Caracas, Venezuela.
        </div>


        <br><br><br>
        <div class="texto_citado">
            "Somos 5 hermanos, nuestro hermano menor José Antonio era muy fumador; y el se enteró de que tenía cáncer hace mas o menos como un año, no nos dijo nada a nadie y vivió sus ultimos meses sufriendo en silencio, su muerte fue muy dura para todos nosotros, sobre todo para nuestros padres que veían a través de sus ojos, gracias al mensaje que nos dejó en sus sitio web hemos podido saber las razones por las cuales lo hizo. Comprendimos que nos amaba demasiado a todos como para hacernos sufrir con su enfermedad. Te amo loquillo".
        </div>
        <div class="texto_citado_autor">
            Sasha Rodríguez. Cúcuta, Colombia.
        </div>

        <br><br><br>
        <div class="texto_citado">
            "Trabajo en una oficina grande con un buen grupo de personas, hace nomás un mes que falleció un querido amigo de la oficina y todos nos extrañamos que nuestro jefe no se presentó a la sepultura, nos hemos enterado que Juanelo (mi cuate) utilizó esta página para dejarle un mensajito a nuestro jefe!, su secre nos dijo que la cara del hombre cuando lo leyó no era normal!!! es por eso que yo también decidí usarla para decirle unas cuantas cosas que por ahora no puedo decirle!".
        </div>
        <div class="texto_citado_autor">
            Pedro Hernández, México DF, México.
        </div>

        <br><br><br>
        <div class="texto_citado">
            "Tengo 50 años, soy ama de casa y he sufrido lo que ninguna madre debería sufrir, la desaparición física de mi único hijo. El siempre fue un poco timido y aunque siempre nos llevamos bien nunca fue del tipo comunicativo; un terrible día me enteré que tuvo el accidente en el cual perdió la vida, se me salen las lágrimas al escribir estas líneas pero simplemente queria agradecerles todo lo que miultimoadios.com ha hecho por mi porque gracias a ustedes pude (por medio de mi sobrina) ver el video que mi hijo me había dejado donde me decía todo lo que me quería y lo mucho que disfrutaba los momentos en los que compartíamos; hubiese preferido escucharlo de el en vida, sin embargo, es una bendición de los cielos el poder escucharlo directamente de su voz mientras sus ojitos bellos miraban directo a mi corazón en ese video.".
        </div>
        <div class="texto_citado_autor">
            María González, Buenos Aires, Argentina.
        </div>


        <br><br><br>
        <div class="texto_citado">
            "Un millón de gracias a ustedes por tan bella labor, sois una pasada, gracias por permitirme escuchar la voz de mi padre una última vez, sus mensajes han sido una gran ayuda para poder superar su pérdida.".
        </div>
        <div class="texto_citado_autor">
            Manuel García, Galicia, España.
        </div>

        
        <br><br>


        <div class="marco_titulo">
            Te invitamos a usar nuestro sitio web y a dejarle un mensaje a tus seres queridos en caso de que algo te pase. Pruébalo, es gratis!. <?php echo CHtml::link('Regístrate ahora!',$this->createUrl('usuario/create')); ?>
        </div>
    </div>           
    
</div> <!-- login box -->
    <br><br>
    <?php $this->widget('BloqueMainIzquierda',array('visible'=>true)); ?>
    <?php $this->widget('BloqueMainCentro',array('visible'=>true)); ?>