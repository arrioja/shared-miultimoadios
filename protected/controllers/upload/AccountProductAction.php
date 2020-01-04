<?php

Yii::import("ext.EAjaxUpload.qqFileUploader");

/**
 * Account Product Upload Action
 * Se ha modificado esta función para poder manejar 3 tipos diferentes de imágenes
 * en el sitio web, una imagen pequeña de máx 100 px para mostrar en los listados,
 * una imagen de 350 px para mostrar en la descripción general del producto y
 * una imagen de 1024 para acercamientos completos de la misma.
 */
class AccountProductAction extends CAction {
    /**
     *
     * @var int Image Size 1
     */
    private $imgSize_big = 1024; // este valor es cero pero tomará el valor total de la imágen
    private $imgSize_med = 350;
    private $imgSize_small = 100;


    public function run() {
        $productFolder = Yii::getPathOfAlias('application.storage.products');
        $userID = Yii::app()->request->getParam('uid');

        chdir($productFolder);
        if(!is_dir($userID)){
            mkdir($userID);
        }

        chdir($productFolder.'/'.$userID);
        if(!is_dir('big')){mkdir('big');}
        if(!is_dir('med')){mkdir('med');}
        if(!is_dir('sml')){mkdir('sml');}

        $productFolderbig = $productFolder . '/' . $userID . '/big/';
        $productFoldermed = $productFolder . '/' . $userID . '/med/';
        $productFoldersml = $productFolder . '/' . $userID . '/sml/';

        $allowedExtensions = array("jpg","jpeg","png","gif","JPG","JPEG","PNG","GIF");
        $sizeLimit = 1 * 1024 * 1024;

        $uploaderbig = new qqFileUploader($allowedExtensions, $sizeLimit);

        $resultsml = $uploaderbig->handleUpload($productFoldersml);

        // Se redomensionan y se guardan con el mismo nombre que el archivo original

        $imagebig = Yii::app()->image->load($productFoldersml.$resultsml['filename']);
        $imagebig->resize($this->imgSize_big, $this->imgSize_big)->quality(100);
        $imagebig->save($productFolderbig.$resultsml['filename']);

        $imagemed = Yii::app()->image->load($productFoldersml.$resultsml['filename']);
        $imagemed->resize($this->imgSize_med, $this->imgSize_med)->quality(100);
        $imagemed->save($productFoldermed.$resultsml['filename']);

        $imagesml = Yii::app()->image->load($productFoldersml.$resultsml['filename']);
        $imagesml->resize($this->imgSize_small, $this->imgSize_small)->quality(100);
        $imagesml->save();

        // to pass data through iframe you will need to encode all html tags
        $resultsml=htmlspecialchars(json_encode($resultsml), ENT_NOQUOTES);
        echo $resultsml;
    }
}
