<?php

namespace frontend\models;

use Yii;
use frontend\models\MongodbModel;
use yii\mongodb\Query;

/**
 * This is the model class for collection "dances".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $name
 * @property mixed $photo
 * @property mixed $fullurl
 * @property mixed $description
 * @property mixed $start_year
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
            '_id',
            'name',
            'photo',
            'fullurl',
            'description',
            'start_year',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'photo', 'description', 'start_year'], 'safe'],
            [['name', 'description', 'start_year'], 'required'],
            
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
            'name' => Yii::t('app', 'Name'),
            'photo' => Yii::t('app', 'Photo'),
            'fullurl' => Yii::t('app', 'Fullurl'),
            'description' => Yii::t('app', 'Description'),
            'start_year' => Yii::t('app', 'Start Year'),
        ];
    }
    
    public static function getList()
    {
        $query = new Query();
        $query->select(['_id', 'name'])->from('dances');
        $dances = $query->all();
        return self::arrayMap($dances);
    }
    
    protected static function arrayMap($dances)
    {
        $map = [];
        foreach ($dances as $dance){
            $map[$dance['_id'] . ''] = $dance['name'];
        }
        return $map;
    }
}
