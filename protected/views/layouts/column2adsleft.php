<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-5 left">

		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();

            echo $this->clips['sidebar']; ?>
            <?php
                $this->widget('MePublicidadCuadro',array('visible'=>Yii::app()->params->ver_publicidad));?>

		</div><!-- sidebar -->

	<div class="span-19 right">
            <div id="content">
                <?php echo $content; ?>
            </div><!-- content -->
	</div>

</div>
<?php $this->endContent(); ?>
