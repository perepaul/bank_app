<?php

namespace App\Helpers;


class Sms
{

    public $client;

    public function __construct()
    {
        // $this->client = new Client(['base_uri'=>'https://www.bulksmsnigeria.com/api/v1/sms/create']);
    }

    public function sendSms($to, $body)
    {
        // $from = config('twilio.phone');
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
        );

        // $cURLConnection = curl_init('https://www.bulksmsnigeria.com/api/v1/sms/create');
        // curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
        // curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        // $apiResponse = curl_exec($cURLConnection);
        // curl_close($cURLConnection);

        // // $apiResponse - available data from the API request
        // $jsonArrayResponse = json_decode($apiResponse, true);
        // return $jsonArrayResponse;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://connect.routee.net/sms",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($postRequest),
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer a789c982-da03-415e-b785-cf00a66eba7d",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            \Illuminate\Support\Facades\Log::info("cURL Error #:" . $err);
        }
        return $info['http_code'] == 200;

    }
}
