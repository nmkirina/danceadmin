<?php
namespace frontend\models;

use yii\mongodb\ActiveRecord;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use Yii;

class MongodbModel extends ActiveRecord
{
    const UPLOADS = 'uploads/';
    const THUMBS = 'uploads/thumbs/';
    const THUMBS_PREFIX = 'sm_';
    const WIDTH =  120;
    const HEIGHT = 120;
    
    public $imageFiles;
    public $imageFieldName = null;
    public $formFields;
    protected $imageNameList;
    
    
    
    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 10],
        ];
    }
    
    public function updateModel()
    {
        if(key_exists(0, $this->imageFiles))
        {
            $this->deleteFileAndThumb();
            $this->upload();
        }
        return $this->save();
    }
    
    public function upload($file = null)
    {
        if(!$file){
            $images = $this->imageFiles;
            $file = $images[0];
        }
        $field = $this->imageFieldName;
        if($this->validate()){
            $this->$field = $this->generateName() . '.' . $file->extension;
            $file->saveAs( Yii::$app->params['uploadsPath'] . $this->$field);
            self::makeThumbs([$this->$field]);
            return true;
        }
        return false;
    }
    
    public static function makeThumbs($files = null)
    {
        if(!$files){
            $files = self::getFilesFromFolder(self::UPLOADS);
        }
        foreach ($files as $file) {
            $result = [
                    'file' => $file,
                    'result' => Image::thumbnail(self::UPLOADS . $file, self::WIDTH, self::HEIGHT)
                        ->save(Yii::$app->params['uploadsPath'] . '/thumbs/sm_' . $file)
            ];
        }
        return $result;
    }
    
    
    public function setOptions($postArray)
    {
        $modelName = ucfirst($this->collectionName()[1]);
        if(!key_exists($modelName, $postArray)) {
                return false;
        }
        
        $post = $postArray[$modelName];
        
        foreach ($this->attributes() as $option){
            if(key_exists($option, $post)){
                $this->$option = $post[$option];
            }
        }
        return true;
    }
    
    public function getImageUrl()
    {
        $field = $this->imageFieldName;
        return \Yii::$app->request->BaseUrl . '/uploads/thumbs/sm_' . $this->$field;
    }
    
    public function generateName()
    {
        return Yii::$app->getSecurity()->generateRandomString(12) . '_' . substr(time(), 7);
    }
    
    public function createModel($post, $file)
    {
        $this->setOptions($post);
        $this->upload($file);
        return $this->save();
    }

    public function deleteFile($file)
    {
        if(file_exists($file)){
            return unlink($file);
        }
        return false;
    }

    public function deleteFileAndThumb()
    {
        $field = $this->imageFieldName;
        return $this->deleteFile(self::UPLOADS . $this->$field) &&
                $this->deleteFile(self::THUMBS . self::THUMBS_PREFIX . $this->$field);
    }
    
    public function deleteModel()
    {
        $this->deleteFileAndThumb();
        $this->delete();
    }
    
    public function getAttributeList($form = false)
    {
        $attributes = $this->attributes();
        if($this->collectionName()[1] != 'gallery'){
            $attributes = $this->unsetAttribute($attributes, '_id');
        }
        if($this->imageFieldName){
            $image = $this->imageFieldName;
            $attributes = $this->unsetAttribute($attributes, $image);
            if(!$form){
                $attributes[] = [
                    'attribute' => $image,
                    'value' => '/uploads/thumbs/sm_' . $this->$image,
                    'format' => ['image']
                ];
            }
        }
        return $attributes;
    }
    
    protected function unsetAttribute($list, $attribute)
    {
        $key = array_search($attribute, $list);
        unset($list[$key]);
        return $list;
    }
    
    protected static function getFilesFromFolder($folder)
    {
        $filePaths = FileHelper::findFiles($folder, ['recursive' => false]);
        $files = [];
        foreach ($filePaths as $filePath){
            $filePathArray = explode('/', $filePath);
            $files[] = end($filePathArray);
        }
        return $files;
    }
    
}
