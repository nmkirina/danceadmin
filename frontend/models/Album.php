<?php

namespace app\models;

use Yii;
use frontend\models\MongodbModel;

/**
 * This is the model class for collection "album".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class Album extends MongodbModel
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['dance', 'album'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id', 'description', 'date'
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
            '_id' => Yii::t('app', 'Title'),
        ];
    }
    
}
