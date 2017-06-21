<?php

namespace app\models;

use Yii;
use frontend\models\MongodbModel;

/**
 * This is the model class for collection "staff".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class Staff extends MongodbModel
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['dance', 'staff'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id', 'name', 'photo', 'start_date', 'active'
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
