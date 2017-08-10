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
        return self::albumMap($galleries);
    }
    
    protected static function albumMap($galleries)
    {
        foreach ($galleries as $gallery) {
            $album[$gallery['_id']] = count($gallery['name']);
        }
        return $album;
    }
}
