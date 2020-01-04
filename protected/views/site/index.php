<?php $this->pageTitle=Yii::app()->name; ?>
<!--
<div class="main_izquierda">
    <h4><i><?php echo CHtml::encode(Yii::app()->name); ?></i> esta es la página de inicio para los usuarios no autenticados!</h4>
</div>
-->

<!--    *****************      Side Bar con Info!    *********************** -->

<?php // $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar')); ?>
    <?php // $this->widget('MeLogin',array('visible'=>Yii::app()->user->isGuest)); ?>
<?php // $this->endWidget();?>

<div class="main_body">
    <?php $this->widget('BloqueMainInfoGrande',array('visible'=>true)); ?>
    <?php $this->widget('BloqueMainIzquierda',array('visible'=>true)); ?>
    <?php $this->widget('BloqueMainCentro',array('visible'=>true)); ?>
    <?php $this->widget('BloqueMainDerecha',array('visible'=>true)); ?>
</div>
