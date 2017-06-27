<?php

namespace app\models;

use Yii;
use frontend\models\MongodbModel;
use yii\mongodb\Query;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for collection "gallary".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class Gallery extends MongodbModel
{
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
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->imageFieldName = 'name';
    }

        public function getAlbumList()
    {
        $query = new Query();
        $query->select(['_id'])->from('album');
        $albums = $query->all();
        return ArrayHelper::map($albums, '_id', '_id');
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
