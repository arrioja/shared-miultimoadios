<?php if(Yii::app()->user->isGuest) : ?>

<div class="login_ancho_widget">
    <div class="marco_top">
        <div class="marco_icono_top">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/login_top_icon.jpg'); ?>
        </div>
        <div class="marco_titulo"> Identifíquese </div>
    </div>
    <div class="marco_cuerpo_salmon" id="login_ancho_cuerpo_widget">
        <div class="form">

            <?php echo CHtml::beginForm(Yii::app()->homeUrl); ?>

            <?php echo CHtml::activeLabel($form,'username'); ?>
            <?php echo CHtml::activeTextField($form,'username') ?>

            <?php echo CHtml::activeLabel($form,'password'); ?>
            <?php echo CHtml::activePasswordField($form,'password') ?>

            <?php echo CHtml::activeCheckBox($form,'rememberMe'); ?>
            <?php echo CHtml::activeLabel($form,'rememberMe'); ?>

            <?php echo CHtml::submitButton('Enviar'); ?>

            <?php echo CHtml::error($form,'password'); ?>
            <?php echo CHtml::error($form,'username'); ?>

            <?php echo CHtml::endForm(); ?>
        </div><!-- form -->
                <p class="hint">
                    <?php echo CHtml::link('Olvidé mis datos!',Yii::app()->createUrl('site/recuperarclave')); ?> <br>
                    <?php echo CHtml::link('Soy un NUEVO USUARIO.',Yii::app()->createUrl('usuario/create')); ?>
                </p>

    </div> <!-- login box bg -->
</div> <!-- login box -->


<?php endif; ?>




