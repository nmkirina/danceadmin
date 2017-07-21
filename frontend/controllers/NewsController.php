<?php

namespace frontend\controllers;

use frontend\models\News;
use frontend\controllers\BaseUploadController;
/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends BaseUploadController
{
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->model = new News();
        $this->query = News::find();
    }
    
    protected function findById($id)
    {
        return News::findOne($id);
    }
    
    protected function getNewModel() {
        return new $News();
    }
}
