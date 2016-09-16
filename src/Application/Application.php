<?php
namespace TinSky;

/**
* 
*/
use Illuminate\Container\Container;
use TinSky\top\TopClient;
use TinSky\top\request\AlibabaAliqinFcSmsNumSendRequest;

class Application extends Container
{
        private $config;

        public function __construct($config){
                require dirname(__DIR__).'/TopSdk.php';
                $this->config = $config;
        }
        
        public function send($number){
                $c = new TopClient;
                $c->appkey = $this->config['appKey'];
                $c->secretKey = $this->config['secretKey'];
                $req = new AlibabaAliqinFcSmsNumSendRequest();
                $req->setSmsType("normal");
                $req->setSmsFreeSignName($this->config['checkCode']['sms_free_sign_name']);
                $req->setSmsParam("{\"code\":\"1234\"}");
                $req->setRecNum($number);
                $req->setSmsTemplateCode($this->config['checkCode']['sms_template_code']);
                $resp = $c->execute($req);
                return $resp;
        }
}