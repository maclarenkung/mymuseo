<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OmiseCharge;



class OmiseController extends Controller
{
    public function payment(Request $request)
    {

        define('OMISE_PUBLIC_KEY', 'pkey_test_5j56cn0fsfxgsekw6s0');
        define('OMISE_SECRET_KEY', 'skey_test_5j56cn0frbf7hptkhuk');
        $charge = OmiseCharge::create([
            "amount" => $request->amount,
            "currency" => "thb",
            "card" => $request->token
        ]);
        $sms = new THSMS();
        $sms->send('NOTICE', '0873562836', 'ขอบคุณ ที่ใช้บริการ พิพิธภัณฑ์ของคุณสามารถใช้งานได้แล้วตั้งแต่วันที่ 19/4/63 ถึง 19/5/63');

        return "success";
    }
}
class THSMS
{
    var $api_url   = 'http://www.thsms.com/api/rest';
    var $username  = 'maclaren';
    var $password  = '9284e6';

    public function getCredit()
    {
        $params['method']   = 'credit';
        $params['username'] = $this->username;
        $params['password'] = $this->password;

        $result = $this->curl($params);

        $xml = @simplexml_load_string($result);

        if (!is_object($xml)) {
            return array(FALSE, 'Respond error');
        } else {

            if ($xml->credit->status == 'success') {
                return array(TRUE, $xml->credit->status);
            } else {
                return array(FALSE, $xml->credit->message);
            }
        }
    }

    public function send($from = '0000', $to = null, $message = null)
    {
        $params['method']   = 'send';
        $params['username'] = $this->username;
        $params['password'] = $this->password;

        $params['from']     = $from;
        $params['to']       = $to;
        $params['message']  = $message;

        if (is_null($params['to']) || is_null($params['message'])) {
            return FALSE;
        }

        $result = $this->curl($params);
        $xml = @simplexml_load_string($result);
        if (!is_object($xml)) {
            return array(FALSE, 'Respond error');
        } else {
            if ($xml->send->status == 'success') {
                return array(TRUE, $xml->send->uuid);
            } else {
                return array(FALSE, $xml->send->message);
            }
        }
    }

    private function curl($params = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response  = curl_exec($ch);
        $lastError = curl_error($ch);
        $lastReq = curl_getinfo($ch);
        curl_close($ch);

        return $response;
    }
}
