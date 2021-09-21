<?php

namespace App\Traits;

trait RestEconomic
{
    public $base_url;

    public function __construct(){
        $this->base_url='https://restapi.e-conomic.com/';
    }

    public function curlGet($url){
        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
            'X-AppSecretToken'=>'demo',
            'X-AgreementGrantToken' =>'demo',
            'Content-Type'=>'application/json'
        ));

        curl_setopt($cURLConnection, CURLOPT_URL, $this->base_url.$url.'?demo=true');   //remove ?demo=true if credentials are real
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $phoneList = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $jsonArrayResponse = json_decode($phoneList);
        dd($jsonArrayResponse);

        return $jsonArrayResponse;
    }

    public function curlPost($url,$data) {
        $cURLConnection = curl_init($this->base_url.$url.'?demo=true');     //remove ?demo=true if credentials are real

        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
            'X-AppSecretToken'=>'demo',
            'X-AgreementGrantToken' =>'demo',
            'Content-Type'=>'application/json',
            'Accept: application/json'
        ));

        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $apiResponse = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $jsonArrayResponse = json_decode($apiResponse);
        dd($jsonArrayResponse);

        return $jsonArrayResponse;
    }

    public function call($url, $method, $data=null){
        if ($method=='GET' || $method=='get'){
            $this->curlGet($url);
        }
        else if (($method=='POST' || $method=='post') && !is_null($data)){
            $this->curlPost($this->base_url.$url, $data);
        }
    }



}
