<?php

namespace frontend\models;

use Yii;
use frontend\models\MongodbModel;
/**
 * This is the model class for collection "history".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class History extends MongodbModel
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['dance', 'history'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id', 'year', 'text', 'name', 'description'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'name'], 'required'],
            [['name'], 'string']
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
