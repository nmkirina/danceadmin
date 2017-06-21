<?php
namespace frontend\models;

use yii\mongodb\ActiveRecord;

class MongodbModel extends ActiveRecord
{
    public function setOptions($postArray)
    {
        $modelName = ucfirst($this->collectionName()[1]);
        if(!key_exists($modelName, $postArray)) {
                return false;
        }
        
        $post = $postArray[$modelName];
        
        foreach ($this->attributes() as $option){
            if($option != '_id'){
                $this->$option = $post[$option];
            }
        }
        return true;
    }
}
