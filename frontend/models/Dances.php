<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "dances".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class Dances extends \yii\mongodb\ActiveRecord
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
    
    public function setOptions($postArray)
    {    
        if(!key_exists('Dance', $postArray)) {
                return false;
        }
        
        $post = $postArray['Dance'];
        $this->name = $post['name'];
        $this->photo = $post['photo'];
        $this->start_date = $post['description'];
        $this->active = $post['start_year'];
        
        return true;
    }
}
