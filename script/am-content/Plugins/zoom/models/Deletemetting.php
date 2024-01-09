<?php 

namespace Amcoders\Plugin\zoom\models;
use \Firebase\JWT\JWT;

class Deletemetting{

	
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

    function delete($mettingid){
    	$client = new \GuzzleHttp\Client();
		 
	    $response = $client->request('DELETE', 'https://api.zoom.us/v2/meetings/'.$mettingid.'', [
	        "headers" => [
				"Authorization" => "Bearer ".$this->generateJWTKey().""
			]
	    ]);
	    $data = json_decode($response->getBody());
	    return $data;
    }
}

 