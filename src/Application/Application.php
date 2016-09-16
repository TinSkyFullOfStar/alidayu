<?php
namespace TinSky;

/**
* 
*/
use TinSky\config;

class Application extends Container
{

        public function __construct(){
                require '../TopSdk.php';
        }
        
        public function send(){
                $c = new TopClient;
                $c->appkey = "";
                $c->secretKey = "";
                $req = new AlibabaAliqinFcSmsNumSendRequest();
                $req->setSmsType("normal");
                $req->setSmsFreeSignName();
                $req->setSmsParam("{\"code\":\"1234\"}");
                $req->setRecNum('');
                $req->setSmsTemplateCode("");
                $resp = $c->execute($req);
                print_r($resp);
                return $resp;
        }
}