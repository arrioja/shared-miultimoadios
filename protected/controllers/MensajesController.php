<?php

class MensajesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2users';

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
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
                'testLimit'=>3,
			),
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
			array('allow',  // Permirie la ejecución de los siguientes
                'actions'=>array('recibir','captcha'),
				'users'=>array('*'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('@'),
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
	{
        // se carga el documento con el ID
        $documento = $this->loadModel($id);
        // se comprueba que el documento pertenezca al usuario actual y si es de el
        // entonces se muestra, de lo contrario, se va al listado.
        if ($documento->uid == Yii::app()->user->ID)
        {            
            $this->render('view', array(
                'model' => $documento,
            ));
        }
        else
        {



            $this->redirect(array('site/index'));
        }
	}


	public function actionCreate()
	{

        If((Usuario::model()->findByPk(Yii::app()->user->ID)->codRol->level <= 10) &&
            (count(Usuario::model()->findByPk(Yii::app()->user->ID)->Msgs) > 0))
          { // Si el usuario es gratuito y ya tiene un mensaje, entonces se le sugiere que
              // se actualice a premium.
              $this->redirect(array('site/index'));
          }
        else
        {
            $model=new Mensajes;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['Mensajes']))
            {
                $model->attributes=$_POST['Mensajes'];
                $model->uid = Yii::app()->user->ID;
                $model->cod_registro = md5(uniqid());
                $model->cod_envio = md5(uniqid());
                if($model->save())
                    $this->redirect(array('mensajes/admin'));
                    //$this->redirect(array('view','id'=>$model->id));
            }

            $this->render('create',array(
                'model'=>$model,
            ));
        } // else
	}

	public function actionRecibir()
	{
        $mensaje_visto = false; // variable de control para eviatar el doble render.
        if (isset($_GET['cod']))
        { // Si viene con el código y el código se consigue entonces se procede a pedir el código secundario
            $model=new RecibirForm;
            if(isset($_POST['RecibirForm']))
            {
                $model->attributes=$_POST['RecibirForm'];
                if($model->validate())
                {
                    $cod_envio = $model->cod2;
                    $cod_registro = $_GET['cod'];
                    $email = $model->email;                 
                    $mensaje = Mensajes::model()->findByAttributes(array(
                                                                         'cod_registro'=>$cod_registro,
                                                                         'cod_envio'=>$cod_envio,
                                                                         'para'=>$email
                        ));
                    if (is_null($mensaje))
                    {
                        $this->render('recibir_error',array(
                        'model'=>$model));
                    }
                    else
                    {
                        $this->render('view', array('model' => $mensaje,));
                        $mensaje_visto = true;
                    }
                } // del validate
            } // isset post

            // se muestra sólo si no se ha mostrado el mensaje.
            if ($mensaje_visto == false)
                $this->render('recibir',array('model'=>$model));
        } // is set get cod
        else
        { // si no viene con el código, se manda a la página de error.
            $this->render('recibir_error',array(
            'model'=>$model,));
        }
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Mensajes']))
		{
			$model->attributes=$_POST['Mensajes'];
            // Si la modificación la hace una persona que no sea un administrador
            // entonces se coloca de nuevo pendiente para revisión.
            If((Usuario::model()->findByPk(Yii::app()->user->ID)->codRol->level <= 30))
            { $model->revision = "PENDIENTE"; }

			if($model->save())
                $this->redirect(array('mensajes/admin'));
				//$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
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
			throw new CHttpException(400,'Solicitud Inválida, por favor no repita este procedimiento.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Mensajes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Mensajes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Mensajes']))
			$model->attributes=$_GET['Mensajes'];

        // Si el usuario pertenece al Rol Administrador o Root, puede ver los mensajes de todos
        // caso contrario, solo ve los que le competen a el.
        If(Usuario::model()->findByPk(Yii::app()->user->ID)->codRol->level < 70)
        { $model->uid=Yii::app()->user->ID; }

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
		$model=Mensajes::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='mensajes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
