<?php

namespace common\models;

use common\models\BaseResponse;

class DanceResponse extends BaseResponse{
    
    const OK = 200;
    
    protected static $_text = [
        self::OK => 'Ok',
    ];
    
    public static function send($data) {
        
        return parent::baseSend(self::OK, self::$_text[self::OK], $data);
    }
}
