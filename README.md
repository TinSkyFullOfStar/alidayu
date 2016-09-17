#This package is a easy way to complete the alidayu-sms jobs
    the package is base on laravel framework,you must use it with laravel framework.
#Installation
    composer require tinsky/alidayu
#Usage
    you must set the following items in .env file:
    ALIDAYU_APPKEY
    ALIDAYU_SECRETKEY
    ALIDAYU_SMS_FREE_SIGN_NAME
    ALIDAYU_SMS_TEMPLATE_CODE
    You can use the setSmsParam method to set the params your sms template need by type of array.
    Laravel 应用

    注册 AliServiceProvider:

    \TinSky\Providers\AliServiceProvider::class
    创建配置文件：

    php artisan vendor:publish


#Pay Attention
        if your 'ALIDAYU_SMS_FREE_SIGN_NAME' is including the Chinese, don't set it in .env file,you can set it in aliSms file which is located in config directory.You can set it like this:
        'checkCode' => [
                'sms_free_sign_name' => env('ALIDAYU_SMS_FREE_SIGN_NAME','事例4'),
                'sms_template_code' => env('ALIDAYU_SMS_TEMPLATE_CODE','your-sms-template-id'),
        ],
