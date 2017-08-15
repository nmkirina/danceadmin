<?php
namespace frontend\models;

use Yii;

class GalleryJson {
    
    const JSON_VIEW = [
            'preview_xxs' => [
                "path" => 'fullUrl',
                "width" => 500,
                "height" => 375
            ],
            'preview_xs' => [
                "path" => 'fullUrl',
                "width" => 1024,
                "height" => 768
            ],
            'preview_s' => [
                "path" => 'fullUrl',
                "width" => 1440,
                "height" => 1080
            ],
            'preview_m' => [
                "path" => 'fullUrl',
                "width" => 2133,
                "height" => 1600
            ],
            'preview_l' => [
                "path" => 'fullUrl',
                "width" => 2880,
                "height" => 2160
            ],
            'preview_xl' => [
                "path" => 'fullUrl',
                "width" => 3840,
                "height" => 2880
            ],
            'raw' => [
                "path" => 'fullUrl',
                "width" => 1400,
                "height" => 1050
            ],
            "dominantColor" => "#a6a6a6"
        ];
    public $imageArray;
    
    public function __construct()
    {
        $currentJsonData = file_get_contents(Yii::$app->params['angularUploadsPath']);
        $this->imageArray = json_decode($currentJsonData);
        if(!$this->imageArray){
            $this->imageArray = [];
        } elseif(!is_array($this->imageArray)){
            $this->imageArray = (array)($this->imageArray);
        }
        
    }
    
    public function addImage($fullUrl)
    {
        $this->imageArray[] = $this->newItem($fullUrl);
        $this->writeToFile();
    }
    
    public function deleteImage($fullUrl)
    {
        $newArray = [];
        foreach ($this->imageArray as $image){
            if($image->preview_xxs->path != $fullUrl){
                $newArray[] = $image;
            }
        }
        $this->imageArray = $newArray;
        $this->writeToFile();
    }
    
    protected function writeToFile()
    {
        file_put_contents(Yii::$app->params['angularUploadsPath'], json_encode($this->imageArray));
    }
    
    protected function newItem($fullUrl)
    {
        $jsonView = str_replace('fullUrl', $fullUrl, json_encode(self::JSON_VIEW));
        return json_decode($jsonView);
    }
}
