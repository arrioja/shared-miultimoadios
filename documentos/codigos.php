<?php
/*
****************************************************  INFO DEL ARCHIVO
  		   Creado por: 	Pedro Arrioja
  Descripción:  Este Archivo contiene fragmentos de código útiles al sitio web
 *              que han sido o pueden ser implementados dependiendo de su utilidad.
 *              Si se encuentran aqui pueden ser parte de una idea o de algo
 *              interesante de poner en funcionamiento pero que se ha postergado.
 ****************************************************  FIN DE INFO
 */


/*****************************************************************************************
 * Este código que se encuentra comentado hace que se cargue una ventana emergente con
 * la información que se encuentre debajo en la sección dedicada a los divs y a la vista
 * de la pagina como tal. Para ver un ejemplo de esto, puedes ver el widget MieLoginView
 *****************************************************************************************/

 if($form->getErrors() != null) {
   $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
     'id'=>'userloginwidget',
     'cssFile'=>'jquery-ui-1.8.7.custom.css',
     'theme'=>'redmond',
     'themeUrl'=>Yii::app()->request->baseUrl.'/css/ui',
     'options'=>array(
         'title'=>'User Login Errors',
         'autoOpen'=>true,
         'modal'=>true,
         'width'=>200,
     ),
   ));
}else{
   $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
     'id'=>'userloginwidget',
     'cssFile'=>'jquery-ui-1.8.7.custom.css',
     'theme'=>'redmond',
     'themeUrl'=>Yii::app()->request->baseUrl.'/css/ui',
     'options'=>array(
         'title'=>'User Login',
         'autoOpen'=>false,
         'modal'=>true,
         'width'=>200,
     ),
   ));
}

//Este es el espacio para los codigos html y php del view

$this->endWidget('zii.widgets.jui.CJuiDialog'); 

/*****************************************************************************************
 * Este muestra una ventanita de mensaje modal
 *****************************************************************************************/
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'mymodal',
        'options'=>array(
            'title'=>'Modal Dialog',
            'width'=>400,
            'height'=>200,
            'autoOpen'=>false,
            'resizable'=>false,
            'modal'=>true,
            'overlay'=>array(
                'backgroundColor'=>'#000',
                'opacity'=>'0.5'
            ),
            'buttons'=>array(
                'OK'=>'js:function(){alert("OK");}',
                'Cancel'=>'js:function(){$(this).dialog("close");}',
            ),
        ),
    ));
        echo 'Modal dialog content here ';
    $this->endWidget('zii.widgets.jui.CJuiDialog');


?>


