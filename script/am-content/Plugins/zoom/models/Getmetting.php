<?php 

namespace Amcoders\Plugin\zoom\models;
use \Firebase\JWT\JWT;

class Getmetting{

	
	//function to generate JWT
    private function generateJWTKey() {
        $key = env("ZOOM_API_KEY");
        $secret = env("ZOOM_API_SECRET");
        $token = array(
            "iss" => $key,
                "exp" => time() + 3600 //60 seconds as suggested
            );
        return JWT::encode( $token, $secret );
    }

    function getmettings($type,$page_size,$page_number){
    	$client = new \GuzzleHttp\Client();
		 
	    $response = $client->request('GET', 'https://api.zoom.us/v2/users/'.env("ZOOM_USER_EMAIL").'/meetings', [
	        "headers" => [
				"Authorization" => "Bearer ".$this->generateJWTKey().""
			],
            'query' => [
                "type" => $type,
                "page_size" => $page_size,
                'page_number' => $page_number
            ]
         
	    ]);
	    $data = json_decode($response->getBody());
	    return $data;
    }
}

 