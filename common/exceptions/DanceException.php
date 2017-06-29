<?php
namespace common\exceptions;

use Exception;

class DanceException extends Exception
{
    const OK = 200;
    const BAD_REQUEST = 400;
    const INTERNAL_ERROR  = 500;
        
    protected static $_text = [
        self::OK => 'Ok',
        self::BAD_REQUEST => 'Bad request',
        self::INTERNAL_ERROR => 'Internal server error'
    ];
    
//    public function __construct($code) {
//        return 
//    }
}

