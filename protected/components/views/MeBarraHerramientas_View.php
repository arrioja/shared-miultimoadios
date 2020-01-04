<?php if (!Yii::app()->user->isGuest) { ?>

<div style="float:right">
    <?php
        If(((Usuario::model()->findByPk(Yii::app()->user->ID)->codRol->level <= 10) &&
            (count(Usuario::model()->findByPk(Yii::app()->user->ID)->Msgs) <= 0)) ||
            (Usuario::model()->findByPk(Yii::app()->user->ID)->codRol->level > 10))
          {
              /* Si el usuario es gratuito y tiene cero mensajes, o si es usuario premium
               * entonces se le muestra el boton para que incluya un nuevo mensaje.
               */
            $imghtml0=CHtml::image('images/botones/nuevo_mensaje2.png', 'Nuevo Mensaje');
            echo CHtml::link($imghtml0, array('mensajes/create'));
          }


//        $imghtml1=CHtml::image('images/favoritos.png', 'Descargar');
//        echo CHtml::link($imghtml1, array('documents/SeeFavorites'));

//        $imghtml3=CHtml::image('images/comentarios.png', 'Descargar');
//        echo CHtml::link($imghtml3, array('documents/download','file'=>Yii::app()->baseUrl.$model->url,'realn'=>$model->url));

//        $imghtml5=CHtml::image('images/salir.png', 'Descargar');
//        echo CHtml::link($imghtml5, array('site/logout'));

     ?>

</div>


<?php }; ?>






