<?php
namespace TinSky\Application;

/**
* Author:LittleStar of TinSky
*/
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Log;
use TinSky\top\TopClient;
use TinSky\top\request\AlibabaAliqinFcSmsNumSendRequest;

class Application extends Container
{
        private $config;
        private $params;


        public function __construct($config){
            require dirname(__DIR__).'/TopSdk.php';
            $this->config = $config;
            $this->setSmsParam();
        }
        

        /*
         * 发送验证码字段,传入电话号码，返回boolean值以供判断。
         */
        public function sendCheckCodeSms($number){
            $result='';

            $c = new TopClient;
            $c->format='json';
            $c->appkey = $this->config['appKey'];
            $c->secretKey = $this->config['secretKey'];

            $req = new AlibabaAliqinFcSmsNumSendRequest();
            $req->setRecNum($number);
            $req->setSmsType("normal");
            $req->setSmsParam($this->params);
            $req->setSmsFreeSignName($this->config['checkCode']['sms_free_sign_name']);
            //$req->setSmsFreeSignName('hello44');
            $req->setSmsTemplateCode($this->config['checkCode']['sms_template_code']);
            $resp = $c->execute($req);

            $result=$this->isError($resp);

            return $result;
        }


        /*
         * 判断验证码短信是否发送成功,如果成功不做任何操作，失败则将错误为信息储存到log日志。
         * 返回boolean值以供判断。
         */
        private function isError($repArr){
            $result=true;

            if (isset($repArr['code'])){
                $result=false;
                $logInfo='';
                foreach ($repArr as $key => $val)
                    $logInfo.=$key.':'.$val.'   ';
                Log::error($logInfo);
            }

            return $result;
        }

        /*
         * 设置SMS参数，如短信模板中设置了$code，则传入的数组中必须要有key为code的值
         */
        public function setSmsParam($params=['code' => '4321']){
            $this->params=json_encode($params);
        }
}
