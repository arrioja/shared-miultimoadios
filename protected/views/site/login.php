<div class="main_body">   
    <div class="main_bloque_grande">
        <div class="main_bloque_grande_titulo">
            <?php echo "Acceso al sitio web"; ?>
        </div>
        <div class="main_bloque_grande_imagen">
            <?php //echo CHtml::image(Yii::app()->baseUrl.'/images/1page-img3.jpg'); ?>
        </div>
        <div class="main_bloque_grande_descripcion">
            <div class="main_bloque_descripcion_interna">

                <div class="form">

                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'login-form',
                    'enableAjaxValidation'=>true,
                )); ?>
                    
                    <div class="izquierda">
                        <div class="row">
                            <?php echo $form->labelEx($model,'username'); ?>
                            <?php echo $form->textField($model,'username'); ?>
                            <?php echo $form->error($model,'username'); ?>
                        </div>

                        <div class="row">
                            <?php echo $form->labelEx($model,'password'); ?>
                            <?php echo $form->passwordField($model,'password'); ?>
                            <?php echo $form->error($model,'password'); ?>
                        </div>
                    
                        <div class="row rememberMe">
                            <?php echo $form->checkBox($model,'rememberMe'); ?>
                            <?php echo $form->label($model,'rememberMe'); ?>
                            <?php echo $form->error($model,'rememberMe'); ?>
                        </div>

                        <div class="row buttons">
                            <?php echo CHtml::submitButton('Login'); ?>
                        </div>
                    </div>
                    <div class="derecha">
                    <?php echo CHtml::image(Yii::app()->baseUrl.'/images/candado.png'); ?>
                        <p class="main_bloque_descripcion">                        
                          <span class="required">*</span> = campos requeridos. <br>
                            <?php echo CHtml::link('Olvidé mis datos de acceso',Yii::app()->createUrl('site/recuperarclave')); ?> <br>
                            <?php echo CHtml::link('Deseo registrarme.',Yii::app()->createUrl('usuario/create')); ?>
                        </p>
                    </div>
                <?php $this->endWidget(); ?>
                </div><!-- form -->
            </div>
        </div>
    </div>

    <?php $this->widget('BloqueMainIzquierda',array('visible'=>true)); ?>
    <?php $this->widget('BloqueMainCentro',array('visible'=>true)); ?>
    <?php $this->widget('BloqueMainDerecha',array('visible'=>true)); ?>
</div>