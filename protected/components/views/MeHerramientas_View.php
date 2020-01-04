
<div class="herramientas_ancho_widget">
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/herramientas_top_icon.jpg'); ?>
        </div>
        <div class="marco_titulo" style="font-size:12pt;"> Herramientas </div>
    </div>
    <div class="marco_cuerpo_salmon" id="herramientas_ancho_cuerpo_widget">
        <?php            
            echo '<strong>Doc. donados:</strong> '.Documents::numDocsUsr(Yii::app()->user->id).'<br/>';

            $imghtml1=CHtml::image('images/docnuevo.png', 'Donar Otro Documento');
            echo CHtml::link($imghtml1, array('documents/create'));

            $imghtml2=CHtml::image('images/misdocumentos.png', 'Descargar');
            echo CHtml::link($imghtml2, array('documents/admin'));

            $imghtml3=CHtml::image('images/perfil.png', 'Descargar');
            echo CHtml::link($imghtml3, array('usuario/view','id'=>Yii::app()->user->id));

            $imghtml4=CHtml::image('images/perfil_editar.png', 'Descargar');
            echo CHtml::link($imghtml4, array('usuario/update'));



//            $imghtml3=CHtml::image('images/circulo_verde.png', 'Descargar');
//            echo CHtml::link($imghtml3, array('documents/download','file'=>Yii::app()->baseUrl.$model->url,'realn'=>$model->url));

        ?>
    <div> &nbsp; </div>
    </div> <!-- login box bg -->

</div> <!-- login box -->







