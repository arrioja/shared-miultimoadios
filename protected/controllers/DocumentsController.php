<?php

class DocumentsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'SearchBox'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','download','SaveRating', 'AddFavorite',
                                   'SeeFavorites','RemoveFavorite'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'adminall', 'delete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        DocumentStatistics::oneView($id);
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Documents;
        

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Documents'])) {
            $model->attributes = $_POST['Documents'];
            $model->uid = Yii::app()->user->id;
            $model->url = CUploadedFile::getInstance($model, 'url');
            //file save
            /* Este pequeño procedimiento me dirá en cual directorio se va a grabar el
             * archivo, ya que hay 9999 directorios y cada uno va a tener un máximo de
             * 10000 archivos, lo que le dará a la página una posibilidad de mantener
             * 99.990.000 archivos.
             */
            $numerodir = 0; // directorio en el que se grabara el archivo
            $encontrado = false; // variable de control para romper el ciclo
            while (($numerodir <= 9999) && ($encontrado == false)) {
                $total_archivos = count(glob(Yii::app()->basePath . '/../documents/'.$numerodir.'/{*.*}',GLOB_BRACE));
                if ($total_archivos >= 9999)
                    { $numerodir = $numerodir + 1; }
                else
                    {$encontrado = true;}
            }

            // Se continua con la validación de los datos del modelo que viene del View
             if($model->validate()){                                     
                    $sourcePath = pathinfo($model->url->getName());
                    $file = md5(mktime()) . '.' . $sourcePath['extension'];
                    $model->url->saveAs(Yii::app()->basePath . '/../documents/'.$numerodir.'/' .$file);
                    $model->url = '/documents/'.$numerodir.'/' . $file;
                    $model->ext = $sourcePath['extension'];

               if ($model->save()) {
                    DocumentStatistics::startStatistics($model->id);
                    $this->redirect(array('view', 'id' => $model->id));
               }}
            else
                $this->render('create', array(
                    'model' => $model,
                ));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
       
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Documents'])) {
            $model->attributes = $_POST['Documents'];
            
            $file=CUploadedFile::getInstance($model,'url');
            if (!empty($file))
            $model->url=CUploadedFile::getInstance($model,'url');
            else
            $model->url=Documents::model()->findByPk($model->id)->url;
           
            if (!empty($file)) {
            $sourcePath = pathinfo($model->url->getName());
             $model->url->saveAs(Yii::app()->basePath . '/../documents/' . $file);
            $model->url = '/documents/' . $file; 
            }
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if ((Yii::app()->request->isPostRequest) || (Usuario::model()->es_admon() == true)) {
            // we only allow deletion via POST request
            $estedocumento = $this->loadModel($id);

            if ($estedocumento->status_id != 'UNDELEBLE')
            {
                // Se elimina el archivo vinculado con el documento subido.
                $arch = "/home/arrioja/miswebs/nombredemisitioweb/".$estedocumento->url;      //  Este es para el Local
                // $arch = "/home/nombredemisitioweb/www/".$estedocumento->url;      //  Este es para el Servidor!

                if (file_exists($arch))
                  { unlink($arch);}

                $estedocumento->delete();

                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
    if(isset($_GET['cat']))
       { // si trajo categoría
        $nombrecat = $_GET['cat'];
        $catid = Category::model()->findByAttributes(array('title'=>$nombrecat));
       
//        $dataProvider = Documents::model()->findAllByAttributes(array('id_category'=>$catid['id']));
      
        $dataProvider = new CActiveDataProvider('Documents',
                        array(
                            'criteria' => array(
                                'condition' => 'id_category= :id',
                                'params' => array(':id' => $catid['id']),
                                'with'=>array('category'),
                            ),
                            'pagination' => array(
                                'pageSize' => 25,
                            ),));
       }
    elseif (isset($_GET['keywords']))
        $dataProvider = new CActiveDataProvider('Documents',
                        array(
                            'criteria' => array(
                                'condition' => 'keywords LIKE :keywords',
                                'params' => array(':keywords' => '%'.$_GET['keywords'].'%'),
                            ),
                            'pagination' => array(
                                'pageSize' => 25,
                            ),));
    else
            $dataProvider = new CActiveDataProvider('Documents',
                        array(
                         'pagination' => array(
                                'pageSize' => 25,
                            ),));
    
        $this->render('index', array( 'dataProvider' => $dataProvider, ));
    }

    /**
     * Manages my models.
     */
    public function actionAdmin() {
        $model = new Documents('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Documents']))
            $model->attributes = $_GET['Documents'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

        /**
     * Manages all models.
     */
    public function actionAdminAll() {
        $model = new Documents('searchAll');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Documents']))
            $model->attributes = $_GET['Documents'];
        $this->render('adminAll', array(
            'model' => $model,
        ));
    }
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Documents::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'documents-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDownload(){
        if (Documents::numDocsUsr(Yii::app()->user->id) <= 0)
            {                
                /* En caso de que se pase la seguridad, esta redundancia debería funcionar
                 * De manera que si el usuario intenta ejecutar este procedimiento sin tener
                 * por lo menos un documento, el sistema no hará nada.
                 */
                //$this->widget('MeMensaje',array('visible'=>true));
            }
        else
            {  
                DocumentStatistics::oneDownload($_GET['realn']);
                $file = (dirname(__FILE__).'/../../..'.$_GET['file']);  // Este es Local
               // $file = "/home/nombredemisitioweb/www/".$_GET['file'];      //  Este es para el Servidor!
                $fname = $_GET['file'];
                header ("Content-Type: application/octet-stream");
                header ("Accept-Ranges: bytes");
                header ("Content-Length: ".filesize($file));
                header ("Content-Disposition: attachment; filename=".$fname);
                readfile($file);
            }
    }
    
    public function actionSearchBox(){
          // Se Cargan los datos de los documentos que cumplan con el criterio de búsqueda
          $dataProvider = new CActiveDataProvider('Documents',
                        array(
                            'criteria' => array(
                                'condition' => 'MATCH(title, description, keywords, content) AGAINST (:description)',
                                'params' => array(':description' => '%'.$_GET['buscar'].'%'),
                            ),
                            'pagination' => array(
                                'pageSize' => 25,
                            ),));

             $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    
    public function actionSaveRating(){
         $ds = DocumentStatistics::model()->findByPk($_POST['id']);  
         $ds->rating = $_POST['rating'];
         $ds->save();        
    }

/* Se encarga de marcar el documento como favorito del usuario actual */
    public function actionAddFavorite(){
         $docid = $_GET['docid'];
         $usrid = Yii::app()->user->id;         

         if (DocumentsFavorites::esfavorito($docid,$usrid) == false)
         {
             $df = new DocumentsFavorites;
             $df->usid = $usrid;
             $df->docid = $docid;
             $df->save();
         }
    }


    /* Elimina el vinculo en favorito entre el documento y el usuario */
    public function actionRemoveFavorite($favid) {
        DocumentsFavorites::model()->loadModel($favid)->delete();
    }

    public function actionSeeFavorites(){
        $usrid = Yii::app()->user->id;

        $sql = "SELECT d.* from Documents d, Documents_Favorites df
                Where ((d.id = df.docid) and (df.usid = '$usrid'))";
        $sqlcount = "SELECT COUNT(*) from Documents_Favorites df
                     Where (df.usid = '$usrid')";
        $count=Yii::app()->db->createCommand($sqlcount)->queryScalar();

            $dataProvider=new CSqlDataProvider($sql, array(
                'totalItemCount'=>$count,

                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));

             $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
}
