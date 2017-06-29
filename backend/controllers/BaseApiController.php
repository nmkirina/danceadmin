<?php
namespace backend\controllers;

use yii\base\Controller;
use yii\web\Response;
use yii\mongodb\Query;
use Yii;

class BaseApiController extends Controller{
    
    public function init() {
        parent::init();
        Yii::$app->response->format = Response::FORMAT_JSON;
        
    }
    
    public function getAll($model)
    {
        $query = new Query();
        $query->select([])->from($model);
        return $query->all();
    }
    
    public function getById($model)
    {
        $model = "frontend\models\ . ucfirst($model)";
        return $model::findOne($this->getParams('id'));
    }
    
    protected function getParams($param)
    {
        $post = Yii::$app->request->post();
        if($post){
            if(key_exists($param, $post)){
                return $post[$param];
            }
        }
    }
}

