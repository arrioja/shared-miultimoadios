<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mensajes-form',
	'enableAjaxValidation'=>false,
)); ?>
    <br>
	<p class="note"><span class="required">*</span> = requerido.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'para'); ?>
        <?php echo $form->textField($model, 'para', array('size' => 60, 'maxlength' => 250)); ?>
        <?php echo $form->error($model, 'para'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'asunto'); ?>
        <?php echo $form->textField($model, 'asunto', array('size' => 80, 'maxlength' => 250)); ?>
        <?php echo $form->error($model, 'asunto'); ?>
    </div>

	<div class="row">
		<?php// echo $form->labelEx($model,'cuerpo'); ?>
		<?php// echo $form->textArea($model,'cuerpo',array('rows'=>6, 'cols'=>50)); ?>
		<?php // echo $form->error($model,'cuerpo'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'cuerpo'); ?>
		<?php //echo $form->textArea($model,'cuerpo',array('rows'=>6, 'cols'=>50)); ?>
        <?php
        $this->widget('application.extensions.fckeditor.FCKEditorWidget', array(
                "model" => $model,
                "attribute" => 'cuerpo',
                "height" => '600px',
                "width" => '100%',
                "toolbarSet" => 'Default',
                "fckeditor" => Yii::app()->basePath . "/../protected/vendors/fckeditor/fckeditor.php",
                "fckBasePath" => Yii::app()->baseUrl . "/protected/vendors/fckeditor/",
        ));
        ?>
	</div>

 <div class="row">

<?php
/*
$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('controller/upload'),
               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
               //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
               //'messages'=>array(
               //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
               //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
               //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
               //                  'emptyError'=>"{file} is empty, please select files again without it.",
               //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
               //                 ),
               //'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 
 */   ?>


    <?php
    /*
    $this->widget('ext.EAjaxUpload.EAjaxUpload',
    array(
            'id'=>'uploadFile',
            'config'=>array(
                   'action'=>Yii::app()->createUrl('upload/upload'),
                   'allowedExtensions'=>array("jpg","jpeg","gif","tif","png","mov","avi","mpeg","mp4","pdf","txt","doc","docx","odt","xls","ods","xlsx","ppt","pptx","odp"),
                   'sizeLimit'=>100*1024*1024, // maximum file size in bytes
                   'minSizeLimit'=>1024, // minimum file size in bytes
                   //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
                   // Para enviar parámetros con el evento submit se usa esto:
                   
//                   'onSubmit'=>'js:function(file, ext){
//                    var del=$("#delete-previous-checkbox").is(":checked") ? 1 : 0;
//                    this.params.delete = del;
//                    }',
                   
                   'messages'=>array(
                                     'typeError'=>"{file} tiene una extensión no permitida. Sólo se permiten las extensiones: {extensions}",
                                     'sizeError'=>"{file} es muy grande, el máximo permitido es {sizeLimit}.",
                                     'minSizeError'=>"{file} es muy pequeño, el mínimo permitido es {minSizeLimit}.",
                                     'emptyError'=>"{file} está vacío, por favor, seleccione el archivo de nuevo o seleccione otro archivo.",
                                     'onLeave'=>"Los archivos están siendo cargados, si se sale de esta página antes de terminar, dicho proceso se cancelará."
                                    ),
                   'showMessage'=>"js:function(message){ alert(message); }"
                  )
    ));
*/
    ?>
</div>

    <div class="row">
        <?php echo $form->labelEx($model, 'estatus'); ?>
        <?php echo $form->dropdownlist($model, 'estatus', array('BORRADOR'=>'Borrador','DEFINITIVO'=>'Definitivo')); ?>
        <p class="note">
            <?php echo "Sólo los mensajes marcados como 'Definitivo' serán enviados"; ?>
        </p>
        <?php echo $form->error($model, 'estatus'); ?>
    </div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->