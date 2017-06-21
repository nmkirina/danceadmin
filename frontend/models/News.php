<?php

namespace app\models;

use Yii;
use frontend\models\MongodbModel;
/**
 * This is the model class for collection "news".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class News extends MongodbModel
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['dance', 'news'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id', 'title', 'text', 'photo', 'date'
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
}
