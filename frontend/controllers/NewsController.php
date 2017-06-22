<?php

namespace frontend\controllers;

use frontend\controllers\BaseCrudController;
use app\models\News;
/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends BaseCrudController
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
}
