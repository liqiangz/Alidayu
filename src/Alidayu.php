<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 2016/3/10
 * Time: 14:59
 */

namespace Liqiangz\Alidayu;

include "TopSdk.php";

class Alidayu {

    private $topclient;

    public function __construct() {
        $this->topclient = new \TopClient(env('ALIDAYU_APP_KEY'), env('ALIDAYU_SECRETKEY'));
    }

    public function sendSms($mobile,$smsParams) {
        
        $req = new \AlibabaAliqinFcSmsNumSendRequest;
        $req ->setSmsType( "normal" );
        $req ->setSmsFreeSignName( env('ALIDAYU_SIGN') );
        $req ->setSmsParam( json_encode($smsParams));
        $req ->setRecNum( $mobile );
        $req ->setSmsTemplateCode( env('ALIDAYU_SMS'));
        return $this->topclient->execute($req);
    }

}