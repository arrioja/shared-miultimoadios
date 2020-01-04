<?php $this->pageTitle=Yii::app()->name." - Un ser querido le ha dejado un mensaje"; ?>
<br>
    <div class="main_bloque_titulo">
        <?php echo "<strong>Un ser querido nos ha confiado un mensaje para usted.</strong>"; ?>
    </div>

<br>
<?php echo "Un ser querido nos ha confiado un mensaje para usted, para recibirlo, es necesario que coloque los siguientes datos, que le han llegado a su correo."; ?>
<?php echo $this->renderPartial('_form_recibir', array('model'=>$model)); ?>