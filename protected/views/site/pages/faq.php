<?php
$this->pageTitle=Yii::app()->name . ' - Preguntas Frecuentes';
$this->layout = 'column2users';
?>

<div class="acerca_ancho_box" >
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/2page-img1-bannerline.jpg'); ?>
        </div>
        <br>
        <div class="marco_titulo"> A continuación tiene las preguntas más frecuentes que hacen otros usuarios, si su duda no se encuentra reflejada aquí o si siente que la respuesta no le satisface, puede <?php echo CHtml::link('comunicarse con nosotros',$this->createUrl('site/contact')); ?>. </div>
    </div>
    <br>
    <div class="marco_cuerpo_salmon">
        <div class="pregunta">
            Puedo usar el sitio de manera gratuita?
        </div>
        <div class="respuesta">
            Si, En MiUltimoAdios.com creemos firmemente en que la oportunidad debe ser brindada a todos, es por ello que hemos creado una suscripción gratuita para todos aquellos que no tengan la posibilidad económica de pagar una membresía, sin embargo, hemos trabajado arduamente y con el corazón para que usted tenga un excelente y confiable servicio, es por ello que si desea colaborar con la membresía usted podrá acceder a muchas otras características que no poseen los usuarios gratuitos.
        </div>
        <br>




        <div class="pregunta">
            Será publicado mi mensaje?
        </div>
        <div class="respuesta">
            No. Sus mensajes son privados entre usted (que es quien lo redacta) y la persona para la cual ha sido escrito (el destinatario), nuestro servicio se encargará de entregar el mensaje a la dirección de correo que usted nos escriba, en ningún momento se publicará el mensaje que haya escrito ni se proporcionará a terceros.
        </div>
        <br>





        <div class="pregunta">
            Puedo escribir lo que yo quiera?
        </div>
        <div class="respuesta">
            Si, respetamos su derecho de expresarse libremente y ya que el mensaje le llegará sólo a su destinatario, usted podrá decirle lo que desee (siempre que no infrinja ninguna ley en el proceso)
        </div>
        <br>




        <div class="pregunta">
            Cómo sabe la página cuando es el momento de enviar mi mensaje?
        </div>
        <div class="respuesta">
            Nos mantendremos monitoreando constantemente su cuenta mediante el envío de un correo periódico a la dirección de email proporcionada al momento de su <?php echo CHtml::link('registro',$this->createUrl('usuario/create')); ?>, una vez que usted reciba el correo sólo tiene que hacer click en el enlace que se proporciona,
            si nuestro sistema detecta que hay varios correos pendientes entonces se enviará su mensaje a su ser querido.
        </div>
        <br>




        <div class="pregunta">
            Y Cualquiera puede ver mi mensaje?
        </div>
        <div class="respuesta">
            No. En el correo que se enviará a su ser querido se especificarán las instrucciones para leer su mensaje. Adicionalmente, hemos implementado ciertas medidas de seguridad que permitirán acceder a su mensaje sólo a la persona a la cual usted se lo ha enviado.
        </div>
        <br>

        <div class="pregunta">
            Puedo enviar mis claves de bancos e información financiera a mis seres queridos usando esta página?
        </div>
        <div class="respuesta">
            Aunque respetamos su deseo de querer darle información tan importante a sus seres queridos cuando usted ya no esté con ellos, es importante que sepa que el objetivo principal de nuestro sitio web es brindar fe, esperanza y tranquilidad a su familia en un momento difícil, por lo tanto, le recomendamos
            que bajo ninguna circunstancia use nuestro sitio web para enviar información bancaria ni alguna otra información que pueda comprometer sus estados financieros o sus bienes en algun momento.
        </div>
        <br>


        <div class="pregunta">
            Aún tengo dudas acerca de cómo funciona el sitio, con quién puedo hablar?
        </div>
        <div class="respuesta">
            En primer lugar, puede leer información detallada acerca del funcionamiento de nuestro sitio web en <?php echo CHtml::link('este enlace.',$this->createUrl('site/page', array('view'=>'como_funciona'))); ?>
            Si aún dese más información, puede utilizar nuestra <?php echo CHtml::link('página de contacto',$this->createUrl('site/contact')); ?> donde le atenderemos con gusto cualquier duda que tenga acerca de nuestro sitio web.
        </div>
        <br>
        <br>

        
        <p>Atentamente, <br>
           El equipo de MiÚltimoAdiós.com</p>
    </div> <!-- login box bg -->
</div> <!-- login box -->
