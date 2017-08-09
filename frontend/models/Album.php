<?php

namespace frontend\models;

use Yii;
use frontend\models\MongodbModel;
use yii\mongodb\Query;
use yii\helpers\ArrayHelper;
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
            ['_id', 'unique'],
            ['_id', 'required'],
            [['description', 'date'], 'required'],
            [['_id'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
    
    public static function albumList()
    {
        $query = new Query();
        $query->select(['_id'])->from('album');
        return ArrayHelper::map($query->all(), '_id', '_id');
    }
}
