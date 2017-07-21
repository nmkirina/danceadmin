<?php

namespace frontend\controllers;

use frontend\models\Staff;
use frontend\controllers\BaseUploadController;
/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends BaseUploadController
{
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->query = Staff::find();
        $this->model = new Staff();
    }
    
    protected function findById($id) {
        return Staff::findOne($id);
    }
    
    protected function getNewModel() {
        return new Staff();
    }
}
