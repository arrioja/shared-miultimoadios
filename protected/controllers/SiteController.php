<?php

class SiteController extends Controller
{

    public $layout = '//layouts/column2';
    
    public $publicidad_total_visible = true;
    
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        If(Yii::app()->user->isGuest)
		   $this->render('index');
        else
           $this->render('index_autenticados');
	}
        


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Gracias por contactarnos, le responderemos tan pronto como nos sea posible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Muestra la Ventana de Actividades en Red Social 
	 */
	public function actionSocial()
	{
		$this->render('redsocial');
	}

/* Muestra la ventana para la recuperación de claves */

	public function actionRecuperarClave()
	{
		$model=new RecuperarClave;
		if(isset($_POST['RecuperarClave']))
		{
			$model->attributes=$_POST['RecuperarClave'];
			if($model->validate())
			{
                // Se busca el correo electrónico y si existe entonces se procede
                $usuario_encontrado = Usuario::model()->findByAttributes(array('email'=>$model->email));
                $login = $usuario_encontrado->login;
                If ($login[0] == '')
                {
                    Yii::app()->user->setFlash('norecover','La dirección de e-mail que ha proporcionado no se encuentra registrada.');
                    $this->refresh();
                }
                else
                {
                    // Se genera una nueva clave de usuario
                    $length = 10;
                    $chars = array_merge(range(0,9), range('a','z'));
                    shuffle($chars);
                    $nuevapassword = implode(array_slice($chars, 0, $length));

                    $usuario_encontrado->password = md5($nuevapassword); // para encriptar la clave si es salvada
                    if($usuario_encontrado->save())
                    {
                        // Se prepara el correo electrónico para enviarlo al usuario.
                        $headers="From: \"Soporte MiultimoAdios.com\"<".Yii::app()->params['soporteEmail'].">\r\nReply-To: ".Yii::app()->params['soporteEmail'];
                        $body = "Gracias por visitar www.miultimoadios.com (NO RESPONDA A ESTE CORREO).\n
                                 Sus Datos de Acceso son: \r
                                 Login: ".$login." \r
                                 Clave: ".$nuevapassword."\n\n".
                                 "El Equipo de MiUltimoAdios.com\r
                                  Visitanos en Facebook\r
                                  http://www.facebook.com/miultimoadiosonline\r
                                  Síguenos en Twitter\r
                                  http://www.twitter.com/miultimoadios01";
                        mail($model->email,"Recuperación de Datos de Acceso",$body,$headers);
                        Yii::app()->user->setFlash('sirecover','Hemos enviado su información de acceso a su dirección de correo electrónico.');
                        $this->refresh();
                    }
                    else
                    {
                        Yii::app()->user->setFlash('norecover','Ha ocurrido un error y no hemos podido enviar su información de acceso, por favor, comuníquese con: soporte@miultimoadios.com');
                        $this->refresh();
                    }
                }
			}
		}

		$this->render('recover',array('model'=>$model));

	}

/*
 * Este prodcedimiento prepara la denuncia y la envía por e-mail, esto es cuando
 * el usuario denuncia el documento por cualquier razón.
 */
	public function actionDenuncia()
	{
        $docid = $_GET['iddoc'];
        $docdata = Documents::model()->findByPk($docid);
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
                $body="ID Documento Denunciado: ".$docid."\n".
                "Modificar: AQUI VA EL ENLACE PARA MODIFICAR EL DOCUMENTO\n".
                "Eliminar: AQUI VA EL ENLACE PARA ELIMINAR EL DOCUMENTO\n".
                "Aqui puede ir el enlace para hacer mas o menos como en BT al momento de procesar un reporte.\n\n";
				mail(Yii::app()->params['adminEmail'],"[DENUNCIA]".$model->subject,$body.$model->body,$headers);
				Yii::app()->user->setFlash('contact','Gracias por contactarnos, le responderemos tan pronto como nos sea posible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model,'docdata'=>$docdata,'accion'=>'denunciar'));
	}

/* Muestra la página estática donde se encuentran los pasos para suscribirse al sitio */
	public function actionPasos()
	{		
		$this->render('/site/pasos');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));


        



	}







	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}