<?php

namespace frontend\controllers;

use app\models\Staff;
use frontend\controllers\BaseCrudController;

/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends BaseCrudController
{
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->query = Staff::find();
        $this->model = new Staff();
    }
    
    protected function findById($id) {
        return Staff::findOne($id);
    }
}
