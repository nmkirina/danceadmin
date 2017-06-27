<?php

namespace frontend\controllers;

use Yii;
use app\models\UploadForm;
use yii\web\UploadedFile;
use frontend\controllers\BaseCrudController;
use app\models\Gallery;
use app\models\AlbumSearch;

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
    
     public function actionIndex()
    {
        $searchModel = new AlbumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            $post = Yii::$app->request->post();
            $model->album = $post['UploadForm']['album'];
            if ($model->upload() && $model->dbSave()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', ['model' => $model]);
    }
    
    public function actionUpdate($id) {
        
        $model = UploadForm::findOne($id);

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->updateGallery(Yii::$app->request->post())) {
                return $this->redirect(['view', 'id' => (string)$model->_id]);
            }
        }
        return $this->render('update', ['model' => $model]);
        
    }
    
    public function actionGallery()
    {
        return $this->render('gallery', ['albums' => Gallery::getAlbums()]);
    }
    
    public function actionDelete($id)
    {
        $gallery = Gallery::findOne($id);
        $gallery->deleteGallery();
        return $this->redirect(['index']);
    }
    
    public function actionMakethumb()
    {       
        $this->render('makethumb', ['result' => UploadForm::makeThumbs()]);
    }
    
    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
