<?php

namespace frontend\controllers;

use frontend\controllers\BaseCrudController;
use frontend\models\Album;
/**
 * AlbumController implements the CRUD actions for Album model.
 */
class AlbumController extends BaseCrudController
{
   public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->model = new Album();
        $this->query = Album::find();
    }

    protected function findById($id) 
    {
        return Album::findOne($id);
    }
}
