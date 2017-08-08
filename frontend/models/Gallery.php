<?php

namespace frontend\models;

use Yii;
use frontend\models\MongodbModel;
use yii\mongodb\Query;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for collection "gallery".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $name
 * @property mixed $fullurl
 * @property mixed $album
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
            '_id',
            'name',
            'fullurl',
            'album',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['name'], 'required'],
            [['name', 'fullurl', 'album'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'fullurl' => Yii::t('app', 'Fullurl'),
            'album' => Yii::t('app', 'Album'),
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
                   'url' => '/gallery/' . $file,
                   'src' => '/thumbs/sm_' . $file,
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
}
