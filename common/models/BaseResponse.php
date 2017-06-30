<?php
namespace common\models;

class BaseResponse {
    
    public static function baseSend($code, $message, $data = null) {
        return [
            'code' => $code,
            'message' => $message,
            'result' => $data
        ];
    }
}

