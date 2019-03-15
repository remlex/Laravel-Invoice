<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    private $SMS_SENDER = "Remlex";
    private $RESPONSE_TYPE = 'json';
    private $SMS_USERNAME = 'Tndemo'; //
    private $SMS_PASSWORD = 'demo@80'; //demo@80


    public function initiateSmsActivation($phone_number, $message){
        $isError = 0;
        $errorMessage = true;

        //Preparing post parameters
        // $dt = date('Y-m-d H:i:s');
        // $dt = Carbon::now();
        // $dt->toDateTimeString();  // 2015-12-19 10:10:16

        $postData = array(
            'username' => $this->SMS_USERNAME,
            'password' => $this->SMS_PASSWORD, 
            'sender' => $this->SMS_SENDER,
            'to' => $phone_number,
            'message' => $message,
            'response' => $this->RESPONSE_TYPE,
            'unique' => 1,
            'sendondate' => '14-04-2018T17:15:34'
        );

        $url = "http://smsc.smsremlex.net/API/WebSMS/Http/v1.0a/index.php?";
       // http://smsc.smsremlex.net/API/WebSMS/Http/v1.0a/index.php?username=Tndemo&password=Your+Password&sender=my+senderID&to=my+recipient&message=Hello+Test+Message&reqid=1&format={json|text}&route_id=route+id&callback=Any+Callback+URL&unique=0&sendondate=09-04-2018T12:04:34

        // $date=date_create($request->get('date')); //dd-mm-yyyy
        // $format = date_format($date,"Y-m-d");
        // $passport->date = strtotime($format);

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
        ));

        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //get response
        $output = curl_exec($ch);

        //Print error if any
        if (curl_errno($ch)) {
            $isError = true;
            $errorMessage = curl_error($ch);
        }
        curl_close($ch);

        if($isError){
            return array('error' => 1 , 'message' => $errorMessage);
        }else{
            return array('error' => 0 );
        }
    }
}


