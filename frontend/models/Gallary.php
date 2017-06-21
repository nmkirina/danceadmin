<?php

namespace app\models;

use Yii;
use frontend\models\MongodbModel;
/**
 * This is the model class for collection "gallary".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class Gallary extends MongodbModel
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['dance', 'gallary'];
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
}
