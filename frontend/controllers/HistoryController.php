<?php

namespace frontend\controllers;

use frontend\models\History;
use frontend\controllers\BaseCrudController;

/**
 * HistoryController implements the CRUD actions for History model.
 */
class HistoryController extends BaseCrudController
{
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->model = new History();
        $this->query = History::find();
    }
    
    protected function findById($id)
    {
        return History::findOne($id);
    }
}
