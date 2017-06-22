<?php

namespace frontend\controllers;

use app\models\Dances;
use frontend\controllers\BaseCrudController;

/**
 * DanceController implements the CRUD actions for Dances model.
 */
class DanceController extends BaseCrudController
{
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->model = new Dances();
        $this->query = Dances::find();
    }

    protected function findById($id) 
    {
        return Dances::findOne($id);
    }
}
