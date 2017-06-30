<?php

namespace backend\controllers;

use backend\controllers\BaseApiController;


class ApiController extends BaseApiController
{
       
    public function actionDances()
    {
        return $this->getAll('dances');
    }
    
    public function actionAlbums()
    {
        return $this->getAll('album');
    }
    
    public function actionGallery()
    {
        return $this->getAll('gallery');
    }
    
    public function actionHistory()
    {
        return $this->getAll('history');
    }
    
    public function actionNews()
    {
        return $this->getAll('news');
    }
    
    public function actionStaff()
    {
        return $this->getAll('staff');
    }
    
    public function  actionDancebyid()
    {
        return $this->getById('dances');
    }

    public function  actionAlbumbyid()
    {
        return $this->getById('album');
    }
    
    public function  actionGallerybyid()
    {
        return $this->getById('gallery');
    }
    
    public function  actionHistorybyid()
    {
        return $this->getById('history');
    }
    
    public function  actionNewsbyid()
    {
        return $this->getById('news');
    }
    public function  actionStaffbyid()
    {
        return $this->getById('staff');
    }
}
