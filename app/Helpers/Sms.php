<?php

namespace App\Helpers;


use GuzzleHttp\Client;


// use Twilio\Rest\Client;


Class Sms{

    public $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri'=>'https://www.bulksmsnigeria.com/api/v1/sms/create']);
    }

    public function sendSms($to,$body)
    {
        $from = config('twilio.phone');
        // $from = '5th 3rd Sms';
        // try{
        //     $res = $this->client->messages->create($to, [
        //          'from' => $from, 
        //          'body' => $body
        //      ]);
        //      $invalid_numbers = array('60703','13223', '21401', '22102', '32101');
        //      $process_statuses = ['accepted','queued','sending','sent','delivered'];
        //      if(in_array($res->status, $invalid_numbers)){
        //          return 'failed';
        //      }else if(in_array($res->status,$process_statuses ))
        //      {
        //          return 'sent';
        //      }
        //      return false;
        // }catch(\Throwable $e){
        //     return false;
        // }

        $postRequest = array(
            'from' => '5th 3rd SMS',
            'to' => $to,
            'body' => $body,
            'api_token' => config('app.sms_api_key')
        );
        
        $cURLConnection = curl_init('https://www.bulksmsnigeria.com/api/v1/sms/create');
        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        
        $apiResponse = curl_exec($cURLConnection);
        curl_close($cURLConnection);
        
        // $apiResponse - available data from the API request
        $jsonArrayResponse = json_decode($apiResponse,true);
        return $jsonArrayResponse;

    }
}