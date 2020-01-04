<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mensajes-form',
	'enableAjaxValidation'=>false,
)); ?>
    <br>
	<p class="note"><span class="required">*</span> = requerido.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 250)); ?>
        <?php echo $form->error($model, 'para'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cod2'); ?>
        <?php echo $form->textField($model, 'cod2', array('size' => 80, 'maxlength' => 250)); ?>
        <?php echo $form->error($model, 'cod2'); ?>
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
        </div>
    </div>
    <?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Recibir'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->