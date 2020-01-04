<br>
<div class="main_bloque_formularios_ancho">
    <div class="main_bloque_titulo">
        <?php if ($accion == "editar") {
                echo "Editando Datos del Usuario ID: ".$model->id; }
              else
                { echo "Gracias por pensar en su familia, bienvenido(a), regístrese gratis!.";}
        ?>
    </div>
    <div class="main_bloque_formularios" id="registro_ancho_cuerpo">
        <div class="main_bloque_formularios_interna">
            <div class="form">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'usuario-form',
                    'enableAjaxValidation' => true,
                        ));
                ?>

                <?php
                if ($accion == "editar") { ?>
                    Verifique los datos que desee editar y luego confirme con el botón al final de este formulario.
                    <?php }
                  else
                    { ?>
                        Llene el siguiente formulario para completar su registro.
                      <?php  }?>

                    <?php echo $form->errorSummary($model); ?>

                <div class="row">
                    <?php echo $form->labelEx($model, 'login'); ?>
                    <?php echo $form->textField($model, 'login', array('size' => 20, 'maxlength' => 20)); ?>
                    <?php echo $form->error($model, 'login'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'password'); ?>
                    <?php echo $form->passwordField($model, 'password', array('size' => 50, 'maxlength' => 50)); ?>
                    <?php echo $form->error($model, 'password'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 250)); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'FirstName'); ?>
                    <?php echo $form->textField($model, 'FirstName', array('size' => 60, 'maxlength' => 250)); ?>
                    <?php echo $form->error($model, 'FirstName'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'LastName'); ?>
                    <?php echo $form->textField($model, 'LastName', array('size' => 60, 'maxlength' => 250)); ?>
                    <?php echo $form->error($model, 'LastName'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'birth_date'); ?>
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'birth_date',
                        'options' => array('changeMonth' => 'true',
                            'changeYear' => 'true',
                             'dateFormat'=>'yy-mm-dd',
                            'showButtonPanel' => 'true',
                            'constrainInput' => 'false')));
                    ?>

                    <?php echo $form->error($model, 'birth_date'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'sex'); ?>
                    <?php echo $form->dropdownlist($model, 'sex', array('M'=>'Masculino','F'=>'Femenino')); ?>
                    <?php echo $form->error($model, 'sex'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'country_code'); ?>
                    <?php echo $form->dropdownlist($model, 'country_code',CHtml::ListData(Country::model()->findAll(),'Code','Name')); ?>
                    <?php echo $form->error($model, 'country_code'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'facebook'); ?>
                    <?php echo $form->textField($model, 'facebook', array('size' => 50, 'maxlength' => 100)); ?>
                    <?php echo $form->error($model, 'facebook'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'twitter'); ?>
                    <?php echo $form->textField($model, 'twitter', array('size' => 50, 'maxlength' => 100)); ?>
                    <?php echo $form->error($model, 'twitter'); ?>
                </div>

                <?php if (Usuario::model()->es_admon() == true) { ?>
                    <div class="row">
                        <?php echo $form->labelEx($model, 'status'); ?>
                        <?php echo $form->dropdownlist($model, 'status', array('OK'=>'OK','SUSPENDIDO'=>'SUSPENDIDO','PENDIENTE'=>'PENDIENTE','EXPULSADO'=>'EXPULSADO', 'VACIO'=>'VACIO', 'NUEVO'=>'NUEVO')); ?>
                        <?php echo $form->error($model, 'status'); ?>
                    </div>
                 <?php } ?>
                <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Guardar'); ?>
                </div>

            <?php $this->endWidget(); ?>

            </div><!-- form -->

        </div>
        
    </div> <!-- login box bg -->
</div> <!-- login box -->