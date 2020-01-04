<?php
/*$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id,
);

$this->menu=array(

	array('label'=>'Update Usuario', 'url'=>array('update')),
);*/
?>

<div class="registro_ancho_box" id="ancho_left_completo">
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/perfil_top_icon.jpg'); ?>
        </div>
        <div class="marco_titulo"> Perfil del Usuario ID: <?php echo $model->id; ?></div>
    </div>
    <div class="marco_cuerpo_salmon" id="ancho_cuerpo_left_completo">

        <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                'login',
                 array('value'=>  $model->FirstName." ".$model->LastName. " / ".$model->email,
                        'label'=>'Nombre',
                        'visible' => Usuario::model()->es_admon() ),
                 array('value'=>  "F: ".$model->facebook." /T: ".$model->twitter,
                        'label'=>'Redes Sociales',
                        'visible' => Usuario::model()->es_admon() ),
                    array('value'=>  Country::model()->findByPk($model->country_code)->Name,
                        'label'=>'País'),
                 array('value'=>  $model->status,
                        'label'=>'Status',
                        'visible' => Usuario::model()->es_admon() ),
            ),
        ));

        ?><br/>

                <?php
                    if (Usuario::model()->es_admon() == true) {
                                $imghtml=CHtml::image('images/editar_documento.png', 'Editar Usuario');
                                echo CHtml::link($imghtml, array('usuario/update','id'=>$model->id));


                 }?>


       <!--  Wall:  -->
        <div id="wall">
        <?php/*
            $dataProvider2 = new CActiveDataProvider('WallMessages',array(
                'criteria'=>array(
                  'condition'=>'id_wall = :id',
                  'params'=>array(':id'=>$model->id)
                    )
            ));

            $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider2,
            'itemView'=>'application.views.wallMessages._view',
        )); */?>
        </div>
<!--          <div class="blog-box-editor">

                    <?php
                    $wallmess = new WallMessages;
                    $form = $this->beginWidget('CActiveForm', array(
                        'action' => Yii::app()->createUrl('blog/create'),
                        'id' => 'blog-form',
                        'enableAjaxValidation' => false,
                            ));
                    ?>
                    <?php echo $form->errorSummary($wallmess); ?>
                    <?php echo $form->textField($wallmess, 'content', array('class' => 'blog-box-textarea')); ?>

                    <div class="share">

                        <?php

                        echo CHtml::ajaxLink('<span>Send</span>',
                                Yii::app()->createUrl('wallmessages/create',array('wall_id'=>$model->id)),
                                array('type' => 'POST', 'update' => '#wall',
                                  ),
                                array('id' => 'blog_cr'));
                          ?>
                    </div>
                    <?php $this->endWidget(); ?>

                </div>
-->
        <br/>
        <strong>Documentos compartidos por este usuario:</strong>
        <?php
         $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view_docs',
        ));
        ?>
    </div> <!-- login box bg -->
</div> <!-- login box -->