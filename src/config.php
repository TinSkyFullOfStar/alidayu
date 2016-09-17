<?php
/**
 * Author:LittleStar of TinSky
 */

return [
    'appKey' => env('ALIDAYU_APPKEY','your-appKey'),

    'secretKey' => env('ALIDAYU_SECRETKEY','your-secretKey'),

    'log' => [
        'level' => env('ALIDAYU_LOG_LEVEL', 'debug'),
        'file'  => env('ALIDAYU_LOG_PATH',storage_path('logs/alidayu.log')),
    ],

    'checkCode' => [
        'sms_free_sign_name' => env('ALIDAYU_SMS_FREE_SIGN_NAME','your-sms-free-sign-name'),
        'sms_template_code' => env('ALIDAYU_SMS_TEMPLATE_CODE','your-sms-template-id'),
    ],
];

