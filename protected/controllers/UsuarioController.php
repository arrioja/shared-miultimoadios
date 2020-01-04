<?php

class UsuarioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','create','recover','verificar'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','gopremium'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		); 
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{        $dataProvider = new CActiveDataProvider('Documents',
                        array(
                            'criteria' => array(
                                'condition' => 'uid= :uid',
                                'params' => array(':uid' => $_GET['id']),
                            ),
                            'pagination' => array(
                                'pageSize' => 5,
                            ),));
        
		$this->render('view',array(
                     'dataProvider'=>$dataProvider,
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usuario;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
                        
			$model->attributes=$_POST['Usuario'];
            $clave_para_email = $model->password;
            $model->password = md5($_POST['Usuario']['password']);
            $model->cod_rol = 1;
            $model->cod_verificacion = md5(uniqid());
                        
			if($model->save())
            { // si se graba exitosamente el usuario se le envía un correo de Bienvenida
              // y se le envía a la ventana en donde debe ingresar un nuevo trabajo.
              
                // Se prepara el correo electrónico para enviarlo al usuario.
                $bienvenido = ($model->sex == "F") ? "Bienvenida" : "Bienvenido";
                $headers="From: \"MiUltimoAdios.com\"<".Yii::app()->params['soporteEmail'].">\r\nReply-To: ".Yii::app()->params['soporteEmail'];
                $body = "Hola ".$model->FirstName.",\n\n".
$bienvenido." a nuestro sitio: MiUltimoAdios.com, desde nuestro sitio web podrás enviar mensajes, documentos, archivos, fotos, audios, y videos a tus seres queridos en caso de que algo pase y ya no estés más con nosotros. Una vez hayas preparado tu mensaje, puedes estar seguro de que nuestro sistema se encargará de enviarlo a la persona indicada en el momento apropiado. \n
Guarda este correo en tus archivos y por favor, añade a la siguiente dirección: soporte@miultimoadios.com a tus contactos para que los recordatorios que enviemos no sean tratados como SPAM por tu sistema de correos.\r
Estos son tus datos de acceso:\n\n
Login: ".$model->login." \r
Contraseña: ".$nuevapassword."\n\n".
"Para completar su proceso de registro en nuestro sitio web debemos comprobar que su dirección de correo electrónico sea la correcta, \r
por favor, haga clic en el siguiente enlace:\r
http://www.miultimoadios.com/index.php?r=usuario/verificar&id=".$model->id."&cod=".$model->cod_verificacion." \n\n".


"Gracias,\r
El Staff de MiUltimoAdios.com\r
Visitanos en Facebook\r
http://www.facebook.com/miultimoadiosonline\r
Síguenos en Twitter\r
http://www.twitter.com/miultimoadios01\n
NOTA: Este es un mensaje automático, no es necesario que responda a este correo.\n
Por favor, no elimines este correo para que siempre conserves a la mano tu 
información de acceso.";
                mail($model->email,$bienvenido." a MiUltimoAdios.com",$body,$headers);

//                Se lleva al usuario a una página de Bienvenida con información adicional
//                para que el escoja lo que desea hacer ahora.
//                Seria ideal si ya se autentica de una buena vez para que simplemente
//                seleccione una acción deacuerdo a su tipo de cuenta.
                $identity=new UserIdentity($model->login, $_POST['Usuario']['password']);
                if ($identity->authenticate())     {
                      Yii::app()->user->login($identity);
                      $this->redirect(array('site/index'));                      
                      }
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
        // Si el usuario es Root, entonces puede actualizar cualquier perfil,
            If(isset(Yii::app()->user->rol) && Yii::app()->user->rol == 'Root' && isset($_GET['id']))
                    $model=$this->loadModel($_GET['id']);
            else  // pero si no es root, sólo puede actualizar su perfil
		      $model=$this->loadModel(Yii::app()->user->id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
            // Para poder comprobar que la clave haya sido cambiada.
            $clave_vieja = $model->password;
			$model->attributes=$_POST['Usuario'];
            if ($clave_vieja != $model->password) {
                $model->password = md5($model->password);} // para encriptar la clave si es salvada
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array('model'=>$model,));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	/**
	 * Ejecuta la validación del email del usuario.
	 * se marca como "VERIFICADO" si el usuario da click en el link que se le
     * envio a su correo electrónico. 
     * Esto sirve para saber cuales direcciones de correos son correctas y 
     * cuales necesitan ser actualizadas.
	 */
	public function actionVerificar()
	{
        // se obtienen el ID y el código que son indispensables para verificar la
        // cuenta del usuario recién registrado.
        if(isset($_GET['id']))
		  {$id_verificar = $_GET['id'];}
        else
          {$id_verificar = 0;}
        if(isset($_GET['cod']))
		  {$cod_verificar = $_GET['cod'];}
        else
          {$cod_verificar = 0;}

        $usuario_a_verificar = Usuario::model()->findByAttributes(array('id'=>$id_verificar, 'cod_verificacion'=>$cod_verificar));

        if ($usuario_a_verificar != Null)
        { // Si no es nulo quiere decir que si se encontró el usuario en cuestión.
            $usuario_a_verificar->cod_verificacion = "VERIFICADO";
            $usuario_a_verificar->save();  }
        else
        { // Si no se encontró el usuario

        }
		//$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('verificar',array(
			'dataProvider'=>$usuario_a_verificar,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionGopremium()
	{
        // Si está establecido que el usuario actual está logueado, se carga el modelo
//        if(isset(Yii::app()->user->id))
        $model=$this->loadModel(Yii::app()->user->id);
//        else // si no está logueado, se envía a la página principal
//            $this->redirect(array('site/index'));
		//$model=new Usuario('search');
		//$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['Usuario']))
//			$model->attributes=$_GET['Usuario'];


		$this->render('gopremium',array(
			'model'=>$model));
	}

}
