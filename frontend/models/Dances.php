<?php

namespace frontend\models;

use Yii;
use frontend\models\MongodbModel;

/**
 * This is the model class for collection "dances".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class Dances extends MongodbModel
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['dance', 'dances'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id', 'name', 'photo', 'description', 'start_year'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name'], 'string'],
        ];
    }

    public function __construct($config = array()) {
        parent::__construct($config);
        $this->imageFieldName = 'photo';
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
