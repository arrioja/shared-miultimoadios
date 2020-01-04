<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/botones.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tablas.css" />

	<title><?php echo CHtml::encode($this->pageTitle)." - Todos tenemos la oportunidad de decir las cosas que nunca pudimos, incluso después de la muerte. "; ?></title>
    <!-- Añade esta etiqueta en la cabecera o delante de la etiqueta body. -->

<!--
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js">
      {lang: 'es-419'}
    </script>
-->
    <!-- Etiqueta para Google Analitics 
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-26426615-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
-->

<body>
<!-- Codigo Necesario para usar el Boton Me Gusta del Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




<div class="container" id="page">
	<div id="header">

        <div id="logo"><?php echo CHtml::image(Yii::app()->baseUrl.'/images/logo_pequeno.png'); ?></div>
            <div class="header_publicidad">
                <?php  $this->widget('MePublicidadHeader',array('visible'=>Yii::app()->params->ver_publicidad)); ?>
            </div>

        <div id="mainmenu">
<!--            <div class="img_esquina_menu_superior_left"><?php echo CHtml::image(Yii::app()->baseUrl.'/images/menu_bg_left.png'); ?></div>  -->
<!--            <div class="img_esquina_menu_superior_right"><?php echo CHtml::image(Yii::app()->baseUrl.'/images/menu_bg_right.png'); ?></div> -->
                <?php $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                        array('label'=>'Inicio', 'url'=>array('/site/index')),
                        array('label'=>'Recibir un mensaje', 'url'=>array('/mensajes/recibir')),
                        array('label'=>'Contacto', 'url'=>array('/site/contact')),
//                        array('label'=>'Red Social', 'url'=>array('/site/social')),
                        array('label'=>'Registrarse', 'url'=>array('usuario/create'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Entrar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                  ),
                ));
            ?>
        </div><!-- mainmenu -->
	</div><!-- header -->



<!-- Esto lo quite porque me descuadra todo el asunto. Lo puedo poner pero dentro del Content porque aqui no me funciona
	  -->    <!-- breadcrumbs -->
<!--
    <div class="barra_de_busqueda">
        <?php $this->widget('MeBarraBuscar',array('visible'=>true)); ?>
        <?php $this->widget('MeBarraHerramientas',array('visible'=>!Yii::app()->user->isGuest)); ?>
        <div class="izquierda">            
            <?php
                $imghtml=CHtml::image('images/facebook.png', 'Facebook');
                echo CHtml::link($imghtml, 'http://www.facebook.com/miultimoadiosonline');
                $imghtml=CHtml::image('images/twitter.png', 'Twitter');
                echo CHtml::link($imghtml, 'http://www.twitter.com/miultimoadios01'); ?>
        </div>
    </div>
-->
<!--
        <div style="float:left;">
            <!-- Añade esta etiqueta donde quieras colocar el botón +1 
            <g:plusone></g:plusone>
            
        </div>
        <div style="float:left;">
        <?php //$this->widget('zii.widgets.CBreadcrumbs', array(
		//'links'=>$this->breadcrumbs,
	//)); ?>
          </div> -->

	<?php echo $content;  ?> 

	<div id="footer">
		<?php echo CHtml::encode($this->pageTitle); ?> &copy; <?php echo date('Y'); ?>
		SkyBusinet &copy Todos los derechos reservados <br/>
		<?php // If(Yii::app()->user->isGuest) echo CHtml::link('Cómo registrarse? |',$this->createUrl('site/page', array('view'=>'pasos'))); ?>
        <?php // If(Yii::app()->user->isGuest) echo CHtml::link('Términos del Servicio y Políticas de Privacidad |',$this->createUrl('site/page', array('view'=>'pasos'))); ?>
<!--         <?php // echo CHtml::link('Normas de Conducta',$this->createUrl('site/page', array('view'=>'conducta'))); ?> |
-->
        <?php echo CHtml::link('Preguntas Frecuentes',$this->createUrl('site/page', array('view'=>'faq'))); ?> |
        <?php echo CHtml::link('Nosotros',$this->createUrl('site/page', array('view'=>'nosotros'))); ?> |
        <?php echo CHtml::link('Cómo funciona este sitio?',$this->createUrl('site/page', array('view'=>'como_funciona'))); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>