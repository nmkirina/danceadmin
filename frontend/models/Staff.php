<?php

namespace frontend\models;

use Yii;
use frontend\models\MongodbModel;

/**
 * This is the model class for collection "staff".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $name
 * @property mixed $photo
 * @property mixed $fullurl
 * @property mixed $start_date
 * @property mixed $active
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
            '_id',
            'name',
            'photo',
            'fullurl',
            'start_date',
            'active',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'photo', 'fullurl', 'start_date', 'active'], 'safe'],
            [['name', 'start_date', 'active'], 'required']
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
            'photo' => Yii::t('app', 'Photo'),
            'fullurl' => Yii::t('app', 'Fullurl'),
            'start_date' => Yii::t('app', 'Start Date'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->imageFieldName = 'photo';
    }
}
