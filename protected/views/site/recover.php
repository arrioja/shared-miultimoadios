<?php
$this->pageTitle=Yii::app()->name . ' - Recuperar contraseña';
?>

<?php if(Yii::app()->user->hasFlash('sirecover')) { ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('sirecover'); ?>
    </div> <?php } ?>
<?php if(Yii::app()->user->hasFlash('norecover')) { ?>
<div class="flash-error">
	<?php echo Yii::app()->user->getFlash('norecover'); ?>
</div> <?php } ?>
<?php if((!Yii::app()->user->hasFlash('sirecover')) && (!Yii::app()->user->getFlash('norecover'))) { ?>

<div class="recover_ancho_box" id="recover_box_con_margen">
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/login_top_icon.jpg'); ?>
        </div>
        <div class="marco_titulo"> Recuperar Contraseña </div>
    </div>


    <div class="marco_cuerpo_salmon" id="recover_ancho_cuerpo">
        <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(            
            'enableAjaxValidation'=>true,
        )); ?>
            Sólo debe colocar la dirección de correo electrónico que utilizó para registrarse en
            nuestro sitio web y le enviaremos su nueva información de acceso.
            <?php echo $form->errorSummary($model); ?>
            <div class="note">Llene los <span class="required">*</span> datos requeridos.</div>

            <div class="row">
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo $form->textField($model, 'email', array('size' => 45, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>

            <?php if(CCaptcha::checkRequirements()): ?>
            <div class="row">
                <?php echo $form->labelEx($model,'verifyCode'); ?>
                <div>
                <?php $this->widget('CCaptcha', array('buttonLabel'=>'Nuevo Código')); ?>
                <?php echo $form->textField($model,'verifyCode'); ?>
                </div>
                <div class="hint">Por favor, escriba las letras tal y como se muestran en la imagen.
                Mayúsculas y minúsculas son indiferentes.</div>
            </div>
            <?php endif; ?>

            <div class="row buttons">
                <?php echo CHtml::submitButton('Enviar'); ?>
            </div>

        <?php $this->endWidget(); ?>
        </div><!-- form -->
    </div> <!-- login box bg -->
</div> <!-- login box -->

<?php } ?>
