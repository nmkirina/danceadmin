<?php

namespace frontend\models;

use Yii;
use frontend\models\MongodbModel;
/**
 * This is the model class for collection "news".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $title
 * @property mixed $text
 * @property mixed $photo
 * @property mixed $fullurl
 * @property mixed $date
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
            '_id',
            'title',
            'text',
            'photo',
            'fullurl',
            'date',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'photo', 'fullurl', 'date'], 'safe'],
            [['title', 'text', 'date'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'photo' => Yii::t('app', 'Photo'),
            'fullurl' => Yii::t('app', 'Fullurl'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->imageFieldName = 'photo';
    }
    
}
