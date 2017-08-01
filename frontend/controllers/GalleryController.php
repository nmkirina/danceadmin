<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\BaseUploadController;
use frontend\models\Gallery;
use app\models\AlbumSearch;
use frontend\models\Album;

/**
 * GalleryController implements the CRUD actions for Gallary model.
 */
class GalleryController extends BaseUploadController
{
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->model = new Gallery();
        $this->query = Gallery::find();
    }
    
     public function actionIndex()
    {
        $searchModel = new AlbumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionGallery($id)
    {
//        $gallery = 
    }
    
    public function actionAlbums()
    {
        return $this->render('albums', ['albums' => Album::albumList()]);
    }
    
    public function actionMakethumb()
    {       
        $this->render('makethumb', ['result' => Gallery::makeThumbs()]);
    }
        
    protected function findById($id) {
        return Gallery::findOne($id);
    }
    
    protected function getNewModel(){
        return new Gallery();
    }
}
