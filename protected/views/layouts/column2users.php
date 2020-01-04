<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-5b left">
        <?php
            if (Yii::app()->user->isGuest == false)
                {
                    $this->widget('BloqueMainResumenCta',array('visible'=>true));
		

                    If(Usuario::model()->findByPk(Yii::app()->user->ID)->codRol->level == 99)
                    {
                        $this->beginWidget('zii.widgets.CPortlet', array(
                            'title'=>'Operations',
                        ));
                        $this->widget('zii.widgets.CMenu', array(
                            'items'=>$this->menu,
                            'htmlOptions'=>array('class'=>'operations'),
                        ));
                        $this->endWidget();

                        echo $this->clips['sidebar'];
                    }
                } // del if is guest
            else
                {
                    $this->widget('MePublicidadlateral',array('visible'=>Yii::app()->params->ver_publicidad));
                }
         ?>
            <?php
              //  $this->widget('MePublicidadCuadro',array('visible'=>Yii::app()->params->ver_publicidad));?>

		
	</div>

	<div class="span-19b">
		<div id="content">
            <div class="contenido_logueados">
                <?php echo $content; ?>
            </div>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>
