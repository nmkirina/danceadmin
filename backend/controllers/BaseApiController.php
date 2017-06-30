<?php
namespace backend\controllers;

use yii\base\Controller;
use yii\web\Response;
use yii\mongodb\Query;
use Yii;
use common\models\DanceException;
use common\models\DanceResponse;

class BaseApiController extends Controller{
    
    const MODELS_NAMESPACE = 'frontend\models\\';
    
    protected $required = null;
    
    public function init() {
        parent::init();
        Yii::$app->response->format = Response::FORMAT_JSON;
        
    }
    
    public function getAll($model)
    {
        $query = new Query();
        $query->select([])->from($model);
        $result = $query->all();
        return $this->response($result);
    }
    
    public function getById($model)
    {
        $model = self::MODELS_NAMESPACE . ucfirst($model);
        $result = $model::findOne($this->getParams('id'));
        return $this->response($result);
        
    }
    
    public function bindActionParams($action, $params) {
        parent::bindActionParams($action, $params);
        $post = Yii::$app->request->post();
        $reflection    = new \ReflectionMethod(get_class($this), $action->actionMethod);
        $method_params = $reflection->getParameters();
        $sorted_params = [];
        
        foreach ($method_params as $method_param){
            $name = $method_param->getName();
             if(!key_exists($name, $post)){
                 $this->required[] = $name;
             }
             $sorted_params[] = $name;
        }
        return $sorted_params;
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
    
    protected function response($result)
    {
        if($result){
            return DanceResponse::send($result);
        }
        return DanceException::send(DanceException::NO_RESPONSE);
    }
}

