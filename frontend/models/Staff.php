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
 * @property mixed $status
 * @property mixed $description
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
            'status',
            'description'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'photo', 'fullurl', 'start_date', 'active', 'description'], 'safe'],
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
            'active' => Yii::t('app', 'Is Active'),
            'status' => Yii::t('app', 'Status'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->imageFieldName = 'photo';
    }
    
    public static function activeList()
    {
        return [
            0 => Yii::t('app', 'Inactive'),
            1 => Yii::t('app', 'Active'),
            ];
    }

    public static function status()
    {
        return [
            0 => Yii::t('app', 'Dancing'),
            1 => Yii::t('app', 'Teaching'),
            2 => Yii::t('app', 'Artistic director'),
        ];
    }
    
    public function isActive()
    {
        $list = self::activeList();
        return $this->getItem($list, $this->active);
    }
    
    public function getStatus($status)
    {
        $statusList = self::status();
        return $this->getItem($statusList, $status);
    }
    
    public function getAttributeList($form = false) {
        $attributes = parent::getAttributeList($form);
        if(!$form) {
            $attributes = $this->setStatus($attributes);
            $attributes = $this->setIsActive($attributes);
        }
        return $attributes;
    }
    
    public function statusString(){
        if(is_array($this->status)){
            $result = '';
            foreach ($this->status as $status){
                $result .= $this->getStatus($status) . ' / ';
            }
            return substr($result, 0, strlen($result)- 3);
        }
        return false;
    }
    
    protected function getItem($array, $key){
        if(key_exists($key, $array)){
            return $array[$key];
        }
        return false;
    }
    
    protected function setIsActive($attributes)
    {
        $attributes = $this->unsetAttribute($attributes, 'active');
        $attributes[] = [
            'attribute' => 'active',
            'value' => $this->isActive()
        ];
        return $attributes;
    }
    
    protected function setStatus($attributes)
    {
        $attributes = $this->unsetAttribute($attributes, 'status');
        $attributes[] = [
            'attribute' => 'status',
            'value' => $this->statusString()
        ];
        return $attributes;
    }
}
