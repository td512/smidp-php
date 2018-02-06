<?php
namespace Monarch;
class ShellManager{
    public function ssoHandler($apiKey, $token){
        if($token == "user_denied"){
             return('{"code":"user_denied"}');
        } else {
            $curl = curl_init();
            $payload = json_encode( array( "key" => $apiKey, "token" => $token ) );
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://monarchshells.com/api/v1/federation/handoff',
                CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
                CURLOPT_USERAGENT => 'Monarch HTTP client',
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => $payload
            ));
            $resp = curl_exec($curl);
            if($resp){
                return($resp);
            } else {
                return('{"code":"failure"}');
            }
            curl_close($curl);
        }
    }
    public function ssoRedirect($pubKey, $retUrl){
        header("location: https://monarchshells.com/api/v1/federation/signon?appid=" . $pubKey . "&redir=" . $retUrl);
    }
}
