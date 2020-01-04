<?php

/**
 * Upload Controller - controller for upload actions
 */
class UploadController extends Controller {
//    public function actions() {
//        return array(
//                'eajaxupload'=>array(
//                        'class'=>'application.controllers.upload.EAjaxUploadAction'
//                ),
//                'accountproduct'=>array(
//                        'class'=>'application.controllers.upload.AccountProductAction'
//                )
//        );
//    }

    public function actionUpload()
    {
            Yii::import("ext.EAjaxUpload.qqFileUploader");

            $folder='upload/';// folder for uploaded files
            $allowedExtensions = array("jpg","jpeg","gif","tif","png","mov","avi","mpeg","mp4","pdf","txt","doc","docx","odt","xls","ods","xlsx","ppt","pptx","odp");
            $sizeLimit = 100*1024*1024;// maximum file size in bytes
            $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
            $result = $uploader->handleUpload($folder);
            $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

            $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
            $fileName=$result['filename'];//GETTING FILE NAME

            echo $return;// it's array
    }

}