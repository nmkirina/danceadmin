<?php

namespace app\models;

use Yii;
use frontend\models\MongodbModel;
use yii\helpers\FileHelper;
use yii\mongodb\Collection;
/**
 * This is the model class for collection "gallary".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class Gallery extends MongodbModel
{
    const UPLOADS = 'uploads/';
    const THUMBS = 'uploads/thumbs/';
    const THUMBS_PREFIX = 'sm_';
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['dance', 'gallery'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id', 'name', 'album'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
        ];
    }
    
    public function getImageUrl()
    {
        return \Yii::$app->request->BaseUrl . '/uploads/' . $this->name;
    }
    
    public static function getAlbums()
    {
        $collection = Yii::$app->mongodb->getCollection('gallery');
        $galleries = $collection->aggregate([[
            '$match' => ['album' => ['$ne' => '']]
        ],  [
           '$group' => [
                '_id' => '$album',
               'name' => ['$push' => '$name']
            ],
            
        ]]);
        return self::createItemsForGallery($galleries);
    }
    
    protected static function createItemsForGallery($galleries)
    {
        foreach ($galleries as $gallery) {
             $files = $gallery['name']; 
             $items = [];
             foreach ($files as $file) {
               $items[] = [
                   'url' => '/uploads/' . $file,
                   'src' => '/uploads/thumbs/sm_' . $file,
                   'options' => array('title' => 'Title')
               ];
            }
            $album[] = [
                'album' => $gallery['_id'],
                'items' => $items
            ];
        }
        return $album;
    }
    
    public function deleteFile($file)
    {
        if(file_exists($file)){
            return unlink($file);
        }
        return false;
    }

    public function deleteFileAndThumb()
    {
        return $this->deleteFile(self::UPLOADS . $this->name) &&
                $this->deleteFile(self::THUMBS . self::THUMBS_PREFIX . $this->name);
    }
    
    public function deleteGallery()
    {
        $this->deleteFileAndThumb();
        $this->delete();
    }
    
    public function dbSave()
    {
        foreach ($this->imageNameList as $imageName){
            $collection = Yii::$app->mongodb->getCollection('gallery');
            $collection->insert([
                        'album' => $this->album,
                        'name' => $imageName
                    ]);
        }
        return true;
    }
}
