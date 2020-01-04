<?php
$this->pageTitle=Yii::app()->name . ' - Contácto / Soporte / Ayuda / Preguntas / Sugerencias / Publicidad / Retiro';
$this->layout = 'column2users';

// Si el usuario está autenticado se llenan varios datos del formulario.
if (Yii::app()->user->isGuest == false)
{
    $model->name = Usuario::model()->findByPk(Yii::app()->user->ID)->FirstName." ".Usuario::model()->findByPk(Yii::app()->user->ID)->LastName;
    $model->email = Usuario::model()->findByPk(Yii::app()->user->ID)->email;

    if ((isset($_GET['action'])) && ($_GET['action'] == 'cancelar_cuenta'))
    {
        $model->subject = 'Deseo cerrar mi cuenta: '.Yii::app()->user->name;
        $model->body = 'Por favor, sería tan amable de explicar por qué desea eliminar su cuenta?';
    }

}

?>
<br>
<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<div class="main_bloque_formularios_ancho" id="contacto_box_con_margen">
    <div class="main_bloque_titulo">
        <?php echo "<strong>Contácto / Soporte / Ayuda / Preguntas / Sugerencias / Publicidad / Retiro </strong>";?>
    </div>
    <div class="main_bloque_formularios">
        <div class="main_bloque_formularios_interna">
            <div class="form" id="contacts-form">
            <?php $form=$this->beginWidget('CActiveForm'); ?>

                <?php echo $form->errorSummary($model); ?>

                <div class="row">
                    <?php echo $form->labelEx($model,'name'); ?>
                    <?php echo $form->textField($model,'name'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'email'); ?>
                    <?php echo $form->textField($model,'email'); ?>
                </div>

                <div class="row">
                <?php if ($accion == "denunciar") {
                    echo $form->labelEx($model,'Motivo de su Denuncia'); }
                  else
                    { echo $form->labelEx($model,'subject');}
                ?>
                    <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
                </div>

                <div class="row">
                <?php if ($accion == "denunciar") {
                    echo $form->labelEx($model,'Por favor, explique con mas detalle su denuncia'); }
                  else
                    { echo $form->labelEx($model,'body');}
                ?>
                    <?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
                </div>

                <?php if(CCaptcha::checkRequirements()): ?>
                <div class="row">
                    <?php echo $form->labelEx($model,'verifyCode'); ?>
                    <div>
                    <?php $this->widget('CCaptcha', array('buttonLabel'=>'Nuevo Código')); ?>
                    <?php echo $form->textField($model,'verifyCode'); ?>
                    </div>
                    <div class="hint">Por favor, escriba las letras tal y como se muestran en la imagen.
                    <br/>Mayúsculas y minúsculas son indiferentes.
                    <p>( <span class="required">*</span> = dato requerido.)</p>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row buttons">
                    <?php echo CHtml::submitButton('Enviar'); ?>
                </div>

            <?php $this->endWidget(); ?>

            </div><!-- form -->
        </div><!--  -->
    </div> <!-- login box bg -->    
</div> <!-- login box -->

<div class="fb-like-box" data-href="http://www.facebook.com/miultimoadiosonline" data-width="690" data-show-faces="true" data-stream="false" data-header="true"></div>

<?php endif; ?>