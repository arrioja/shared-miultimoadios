<div class="main_bloque_izquierdo_usuario">
    <div class="main_bloque_titulo">
        <?php echo "<strong>Resúmen de su cuenta</strong>"; ?>
    </div>
        <div class="main_bloque_izquierdo_usuario_descripcion main_bloque_izquierdo_usuario_descripcion_interna">
            <?php echo "<strong>Tipo de Cuenta:</strong> ".Usuario::model()->findByPk(Yii::app()->user->ID)->codRol->name;?><br>
            <?php $nro_mensajes = count(Usuario::model()->findByPk(Yii::app()->user->ID)->Msgs);
            If(Usuario::model()->findByPk(Yii::app()->user->ID)->codRol->level >= 20)
            { // Si el usuario es premium, no tiene limite de mensajes
                echo "Mensajes Disponibles: Ilimitados";
            }
            else
            {
             echo "Mensajes Disponibles: ".(1-$nro_mensajes)." ";
             if (1-$nro_mensajes >= 1)
                {// si aún no tiene mensajes creados se coloca el link para que redacte uno.
                    echo CHtml::link('(Redactar)',Yii::app()->createUrl('/mensajes/create'));
                }
             else
                { // si ya tiene mensaje creado y es gratuito, se coloca el link para que obtenga su cuenta premium.
                    echo CHtml::link('(Quiero Más!)',Yii::app()->createUrl('/site/page', array('view'=>'ventajas_premium')));
                }
            }
            ?><br>
            <?php echo "Mensajes Usados: ".$nro_mensajes ?> 
            <?php if ($nro_mensajes > 0) echo CHtml::link('(Ver/Editar)',Yii::app()->createUrl('/mensajes/admin')); ?><br>
            <?php echo "Notificaciones : 0 "; ?><?php echo "(Sigo vivo!!)"; ?><br>
        </div>
    <div class="main_bloque_titulo">
        <?php echo "<strong>Herramientas</strong>"; ?>
    </div>
    <div>
         <a href="<?=Yii::app()->createUrl('mensajes/admin');?>"><img src="<?php echo Yii::app()->baseUrl; ?>/images/botones/documentos.png" alt="" /></a>
         <?php
        If(Usuario::model()->findByPk(Yii::app()->user->ID)->codRol->level <= 10)
           {?>
             <a href="<?=Yii::app()->createUrl('/site/page', array('view'=>'ventajas_premium'));?>"><img src="<?php echo Yii::app()->baseUrl; ?>/images/botones/premium.png" alt="" /></a>                          
     <?php }
        If(Usuario::model()->findByPk(Yii::app()->user->ID)->codRol->level >= 20)
           {
             //echo CHtml::image(Yii::app()->baseUrl.'/images/botones/buscar.png');
           }
         ?>
            <a href="<?=Yii::app()->createUrl('site/contact');?>"><img src="<?php echo Yii::app()->baseUrl; ?>/images/botones/contacto.png" alt="" /></a>
            <a href="<?=Yii::app()->createUrl('site/contact', array('action'=>'cancelar_cuenta'));?>"><img src="<?php echo Yii::app()->baseUrl; ?>/images/botones/roto.png" alt="" /></a>
       
    </div>

    <div class="main_bloque_descripcion">
        <div class="main_bloque_descripcion_interna">
            Conoce las ventajas de ser usuario
            <?php echo CHtml::link('Premium',Yii::app()->createUrl('/site/page', array('view'=>'ventajas_premium')));?>            
            o revisa <?php echo CHtml::link('cómo funciona',Yii::app()->createUrl('/site/page', array('view'=>'como_funciona')));?> nuestro sitio
        </div>
    </div>
</div>


