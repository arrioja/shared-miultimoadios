
<div class="herramientas_ancho_widget">
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/herramientas_top_icon.jpg'); ?>
        </div>
        <div class="marco_titulo" style="font-size:12pt;"> SITE ADMON </div>
    </div>
    <div class="marco_cuerpo_salmon" id="herramientas_ancho_cuerpo_widget">
        <?php            
            echo '<strong>Nivel:</strong> '.Yii::app()->user->rol.'<br/>';
            echo '<strong>Usuarios:</strong> '.Usuario::numUsuarios().'<br/>';
            echo '<strong>Documentos:</strong> '.Documents::numDocs().'<br/>';

            $imghtml1=CHtml::image('images/admon_categorias.png', 'Donar Otro Documento');
            echo CHtml::link($imghtml1, array('category/admin'));

            $imghtml2=CHtml::image('images/admon_usuarios.png', 'Administrar Usuarios');
            echo CHtml::link($imghtml2, array('usuario/admin'));

            $imghtml3=CHtml::image('images/admon_docs.png', 'Administrar documentos');
            echo CHtml::link($imghtml3, array('documents/adminAll'));

            $imghtml4=CHtml::image('images/admon_file_extensions_images.png', 'Administrar Extensiones de Archivos');
            echo CHtml::link($imghtml4, array('fileExtension/admin'));
        ?>
        </div>
    </div> <!-- login box bg -->

</div> <!-- login box -->







