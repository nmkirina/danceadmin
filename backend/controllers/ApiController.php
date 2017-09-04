<?php

namespace backend\controllers;

use backend\controllers\BaseApiController;
use yii\mongodb\Query;
use frontend\models\Comments;


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
    public function actionArtdirector()
    {
        $query = new Query();
        $query->select([])->from('staff')
                ->where(['status' => ["2"]]);
        $result = $query->one();
        return $this->response($result);
    }
    public function actionComment($text, $danceid)
    {
        $comment = new Comments();
        $comment->text = $this->getParams('text');
        $comment->approved = 0;
        $comment->danceid = $this->getParams('danceid');
        if($comment->save()){
            return $this->response(['OK']);
        } 
    }
    public function actionGetcomments()
    {
        $query = new Query();
        $query->select([])->from('comments')
                ->where(['approved' => ["1"]]);
        $result = $query->all();
        return $this->response($result);
    }
}
