<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
    public $album;
    protected $imageNameList;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
    
    public function upload()
    {
        $this->imageNameList = [];
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $this->imageNameList[] = $file->baseName . '.' . $file->extension;
                $file->saveAs(__DIR__ . '/../web/uploads/' . $file->baseName . '.' . $file->extension);
            }
            $this->dbSave();
            return true;
        } else {
            return false;
        }
    }
    
    public function dbSave()
    {
        foreach ($this->imageNameList as $imageName){
            $collection = Yii::$app->mongodb->getCollection('gallery');
            $collection->insert([
                        'album' => $this->album,
                        'name' => $imageName
                    ]);
        }
    }
}