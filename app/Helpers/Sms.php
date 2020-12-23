<?php

namespace App\Helpers;

use Twilio\Rest\Client;


// use Twilio\Rest\Client;


Class Sms{

    public $client;

    public function __construct()
    {
        $this->client = new Client(config('twilio.sid'),config('twilio.token'));
    }

    public function sendSms($to,$body)
    {
        $from = config('twilio.phone');
        // $from = '5th 3rd Sms';
        try{
            $res = $this->client->messages->create($to, [
                 'from' => $from, 
                 'body' => $body
             ]);
             $invalid_numbers = array('60703','13223', '21401', '22102', '32101');
             $process_statuses = ['accepted','queued','sending','sent','delivered'];
             if(in_array($res->status, $invalid_numbers)){
                 return 'failed';
             }else if(in_array($res->status,$process_statuses ))
             {
                 return 'sent';
             }
             return false;
        }catch(\Throwable $e){
            return false;
        }

    }
}