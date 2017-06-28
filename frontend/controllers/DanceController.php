<?php

namespace frontend\controllers;

use app\models\Dances;
use frontend\controllers\BaseUploadController;

/**
 * DanceController implements the CRUD actions for Dances model.
 */
class DanceController extends BaseUploadController
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
    
    protected function getNewModel() {
        return new Dances();
    }
}
