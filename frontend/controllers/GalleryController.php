<?php

namespace frontend\controllers;

use Yii;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use frontend\controllers\BaseCrudController;
use app\models\Gallery;

/**
 * GalleryController implements the CRUD actions for Gallary model.
 */
class GalleryController extends BaseCrudController
{
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->model = new Gallery();
        $this->query = Gallery::find();
    }
    
    protected function findById($id) {
        return Gallery::findOne($id);
    }
    
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                return $this->render('gallery',['items' => $this->getItems()]);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    public function actionGallery()
    {
        return $this->render('gallery', ['items' => $this->getItems()]);
    }
    
    protected function getItems()
    {
        $files = FileHelper::findFiles(__DIR__ .'/../web/uploads/');
        $items = [];
        foreach ($files as $file) {
           $pathArray = explode('/', $file);
           $items[] = [
               'url' => '/uploads/' . $pathArray[count($pathArray) - 1],
               'src' => '/uploads/' . $pathArray[count($pathArray) - 1],
               'options' => array('title' => 'Title')
           ];
        }
        return $items;
    }
}
