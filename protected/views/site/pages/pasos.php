<?php
$this->pageTitle=Yii::app()->name . ' - Pasos para suscribirse';
?>

<div class="acerca_ancho_box" >
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/pasos_top_icon.jpg'); ?>
        </div>
        <div class="marco_titulo"> Pasos para suscribirte </div>
    </div>


    <div class="marco_cuerpo_salmon">
        <h1>titulo en h1! </h1>
        <div>
            <table id="box-table-b">
                <thead>
                    <tr>
                      <th colspan="2">
                        <p>info adicional.</p>
                      </th>
                    </tr>
                </thead>
                <tr>
                    <td width="10%"><strong>Paso 1:</strong> <br><?php echo CHtml::image(Yii::app()->baseUrl.'/images/paso1.png'); ?></td>
                    <td>info
                    </td>
                </tr>
                <tr>
                    <td><strong>Paso 2: </strong><br><?php echo CHtml::image(Yii::app()->baseUrl.'/images/paso2.png'); ?></td>
                    <td>info ?>.
                    </td>
                </tr>
                <tr>
                    <td><strong>NOTA: </strong><br></td>
                    <td>info
                    </td>
                </tr>

            </table>
        </div>            
        <p>Atentamente, <br>
           ssss</p>
    </div> <!-- login box bg -->
</div> <!-- login box -->
