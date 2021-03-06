<?php
namespace common\models;

use common\models\BaseResponse;

class DanceException extends BaseResponse {
    
    const BAD_REQUEST = 400;
    const ID_REQUIRED = 401;
    const INTERNAL_ERROR  = 500;
    const NO_RESPONSE = 444;
    
    protected static $_text = [
        self::BAD_REQUEST => 'Bad request',
        self::INTERNAL_ERROR => 'Internal server error',
        self::NO_RESPONSE => 'Item not found',
        self::ID_REQUIRED => 'Missed required parameter: id'
            
    ];  

    public static function send($code) {
       return parent::baseSend($code, self::$_text[$code]);
    }
}
