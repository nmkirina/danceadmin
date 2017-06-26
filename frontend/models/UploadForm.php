<?php

namespace app\models;

use app\models\Gallery;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use Yii;


class UploadForm extends Gallery
{
    const WIDTH =  120;
    const HEIGHT = 120;
    
    public $imageFiles;
    protected $imageNameList;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 10],
        ];
    }

    public function upload()
    {
        $this->imageNameList = [];
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $image = $file->baseName . '.' . $file->extension;
                $this->imageNameList[] = $image;
                $file->saveAs( Yii::$app->params['uploadsPath'] . $image);
            }
            self::makeThumbs($this->imageNameList);
            return true;
        } else {
            return false;
        }
    }
    
    public function updateGallery($post)
    {
        $newPost['Gallery'] = $post['UploadForm'];
        $this->deleteFileAndThumb();
        if(isset($this->imageFiles[0])){
            $imageFile = $this->imageFiles[0];
            $newPost['Gallery']['name'] = $imageFile->name;
        }
        $this->setOptions($newPost);
        $this->save();
        return $this->upload();
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
