<?php
namespace frontend\controllers;

use frontend\controllers\BaseCrudController;
use yii\web\UploadedFile;
use Yii;

abstract class BaseUploadController extends BaseCrudController
{
    public function actionUpload()
    {
        $model = $this->model;

        if (Yii::$app->request->isPost) {
            $imageFiles = UploadedFile::getInstances($model, 'imageFiles');

            foreach ($imageFiles as $file){
                $newModel = $this->getNewModel();
                $newModel->setOptions(Yii::$app->request->post());
                $newModel->upload($file);
                $newModel->save();
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', ['model' => $model]);
    }
    
    public function actionUpdate($id) {
        
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if($model->setOptions(Yii::$app->request->post()) && $model->updateModel()){
                return $this->redirect(['view', 'id' => (string)$model->_id]);
            }
        }
        return $this->render('update', ['model' => $model]);
        
    }
    
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->deleteModel();
        return $this->redirect(['index']);
    }
    
    abstract protected function getNewModel();
}


