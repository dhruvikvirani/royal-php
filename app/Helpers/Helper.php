<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Helper{

    public static function royalApi($method='',$path='',$params=[],$token= null){

        $base_url = config('royalapi.host');;
        $api_version = config('royalapi.version');

        if($token==null){
            $token = auth()->user()->access_token ?? '';
        }

        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->$method($base_url.'/api/'.$api_version.'/'.$path, $params);
        return $response->json();
    }
}
?>