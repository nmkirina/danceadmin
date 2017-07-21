<?php
namespace frontend\controllers;

use frontend\controllers\BaseCrudController;
use yii\web\UploadedFile;
use Yii;

abstract class BaseUploadController extends BaseCrudController
{
    public function actionCreate()
    {
        $model = $this->model;

        if (Yii::$app->request->isPost) {
            $imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if(count($imageFiles) > 1) {
                $this->createMany($imageFiles, $model);
            }
            elseif(count($imageFiles) == 1) {
                $model->createModel(Yii::$app->request->post(), $imageFiles[0]);
            } else {
                $model->createModel(Yii::$app->request->post());
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', ['model' => $model]);
    }
    
    public function actionUpdate($id) 
    {
        
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
    
    protected function createMany($imageFiles, $newModel)
    {
        foreach ($imageFiles as $file){
            $newModel->createModel(Yii::$app->request->post(), $file);
            $newModel = $this->getNewModel();
        }
    }
    
    abstract protected function getNewModel();
}


