<?php
/**
*Class to Track the activity
*
*@param  Automatic Variables
*@author Meraj AHmad Siddiqui
*/

class Tracker{
	/**
	*@param Obtaint the  IP address of Visistor
	*/
	public $visitor_ip; 
	public $country;
	public $browser;
	public $operatingSystem;
	public $Device_type;
	public $engine;
	
	public function getIPaddress(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}

		$this->visitor_ip = $ip;
	}


	public function getLocation($ip){
		$ip_parse_uri  = "http://www.geoplugin.net/json.gp?ip=".$ip;
		$ip_parse_result = json_decode(file_get_contents($ip_parse_uri));
		$this->country = $ip_parse_result->geoplugin_countryCode;
	}

	public function isIPbot($ip){

	}

	public function userAgent(){
		$ua = urlencode($_SERVER['HTTP_USER_AGENT']);
		$result = json_decode(file_get_contents("http://useragentapi.com/api/v3/json/2d20172d/".$ua));
		$this->browser = $result->data->browser_name;
		$this->operatingSystem = $result->data->platform_name;
		$this->Device_type = $result->data->platform_type;
		$this->engine = $result->data->engine_name;
	}


}	
?>
