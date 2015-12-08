<?php

/**
 * The Default Example Controller Class
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

class Home extends Controller {
	/**
     * @before _secure
     */
    public function index() {
    	$view = $this->getActionView();
    	/*Saving to database in customized format*/
    	if(RequestMethods::post("create")=="rule"){
 
    		$Trigger = RequestMethods::post("trigger");
    		$Action = RequestMethods::post("action");
    			switch ($Trigger) {
    				case '1':
    					$trig_type = "Everyone Else";
    					$trig_vals = RequestMethods::post("trigger_rule");
    					break;
    				
    				case '2':
    					$trig_type="Countries";
    					$trig_vals = RequestMethods::post("country");
    					break;
    				case '3':
    					$trig_type="Landing Page";
    					$trig_vals = RequestMethods::post("landing_page");
    					break;

    				case '6':
    					$trig_type="Visit Time";
    					$trig_vals = RequestMethods::post("visit_time");
    					break;

    				case '7':
    					$trig_type="Bots";
    					$trig_vals = "";
    					break;

    				case '8':
    					$trig_type="Whois";
    					$trig_vals = "";
    					break;
    				case '9':
    					$trig_type="User Agent";
    					$trig_vals =RequestMethods::post("ua");
    					break;

    				case '10':
    					$trig_type="Browser";
    					$trig_vals = RequestMethods::post("browser");
    					break;

    				case '11':
    					$trig_type="Operating System";
    					$trig_vals = RequestMethods::post("os");
    					break;
    				case '12':
    					$trig_type="Device Type";
    					$trig_vals = RequestMethods::post("device");
    					break;
    				case '13':
    					$trig_type="Rerer";
    					$trig_vals = RequestMethods::post("refrer");
    					break;
    				case '14':
    					$trig_type="Search Term";
    					$trig_vals = RequestMethods::post("searchterm");
    					break;
    				case '15':
    					$trig_type="IP Range";
    					$trig_vals = RequestMethods::post("searchterm");
    					break;
    				case '16':
    					$trig_type="Active Login";
    					$trig_vals = "";
    					break;
    				case '17':
    					$trig_type="Java Script Enabled";
    					$trig_vals = "";
    					break;
    				case '18':
    					$trig_type="Repeated Visiotr";
    					$trig_vals = "";
    					break;

    				case '19':
    					$trig_type="Custom JS";
    					$trig_vals = "";
    					break;

    				case '20':
    					$trig_type="Custom PHP";
    					$trig_vals ="";
    					break;
    			}
    			switch ($Action) {
    				case '1':
    					$action_type="Do Nothing";
    					$action_vals = "";
    					break;
    				case '2':
    					$action_type="Wait";
    					$action_vals = RequestMethods::post("wait_time");
    					break;
    				case '3':
    					$action_type="Redirect ";
    					$action_vals = RequestMethods::post("redirect_to");
    					break;
    				case '4':
    					$action_type="Post Values";
    					$action_vals = RequestMethods::post("post_values");
    					break;
    				case '5':
    					$action_type="Iframe";
    					$action_vals = RequestMethods::post("iframe");
    					break;
    				case '6':
    					$action_type="PopUP";
    					$action_vals = RequestMethods::post("popup");
    					break;
    				case '7':
    					$action_type="Hide Contents";
    					$action_vals = RequestMethods::post("hide_tag");
    					break;
    				case '8':
    					$action_type="Replace Contents";
    					$action_vals = RequestMethods::post("replace_tag").":".RequestMethods::post("replace_value");
    					break;
    				case '9':
    					$action_type="Send Mail";
    					$action_vals = RequestMethods::post("to").":".RequestMethods::post("subject").":".RequestMethods::post("message");
    					break;

    				case '10':
    					$action_type="Custom JS";
    					$action_vals = RequestMethods::post("code_js");
    					break;
    				case '11':
    					$action_type="Custom php";
    					$action_vals = RequestMethods::post("code_php");
    					break;
    				default:
    					#code..
    					break;
    			}
    			
    			$action_creator = new Action(array(
                    "name" => $action_type,
                    "rule" => $action_vals,
                    "log" => 0
                ));
		    	$action_creator->save();
		    	$trigger_creator = new Trigger(array(
		                    "name" => $trig_type,
		                    "rule" => $trig_vals,
		                    "log" =>0,
		                    "action" => $action_creator->id
		                ));
		    	$trigger_creator->save();
				
				// echo $trig_vals;
    	}




    	$triggers = Trigger::all();
    	$actions   = Action::all();
    	$view->set("trigger", $triggers);
    	$view->set("action", $actions);
    }


    public function TrafficLogs(){
    	//Traffic Logs
    }

    public function install(){
    
    	$dbse = array("Trigger", "Action");
    	foreach($dbse as $dbs){
    	$model = new $dbs();
       	$db = Registry::get("database");
        $db->sync($model);
    	}
    }

    public function react(){
    	$ip = $this->getIPaddress();
    	$rpager = explode('?',$_GET['page']);
        $landing_page = $rpager[0];
    	$location = $this->getLocation($ip);
        $more = $this->userAgent();
        $browser = $more[0];
        $os = $more[1];
        $device_type = $more[2];
        $engine = $more[3];
        $visiting_time= date("G:i", strtotime($time));
        $redirect_to="https://www.cloudstuffs.com";
        $range = "116.202.29.135/116.202.33.200";
        $iprange = $this->ip_in_range($ip, $range);
        if(strtolower($browser)=="firefox")
        {	echo "yes its firefox";
        	//$this->sendmail("msiddiqui.jmi@gmail.com", "Access Notification","A user has logged your websiite using mozilla firefox");
        
        }
    	/**
    	*Here perform the action to blah  blah
    	*/
    	
    	header("Location: http://$landing_page?visitor=$ip");
    	/*At the end */
    	
    }


    public function getIPaddress(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}

		return $ip;
	}


	public function getLocation($ip){
		$ip_parse_uri  = "http://www.geoplugin.net/json.gp?ip=".$ip;
		$ip_parse_result = json_decode(file_get_contents($ip_parse_uri));
		return $country = $ip_parse_result->geoplugin_countryCode;
	}

	public function isIPbot($ip){

	}

	public function userAgent(){
		$ua = urlencode($_SERVER['HTTP_USER_AGENT']);
		$result = json_decode(file_get_contents("http://useragentapi.com/api/v3/json/2d20172d/".$ua));
		$browser = $result->data->browser_name;
		$operatingSystem = $result->data->platform_name;
		$Device_type = $result->data->platform_type;
		$engine = $result->data->engine_name;

		$ua = array($browser, $operatingSystem, $Device_type, $engine);
		return $ua;
	}

	public function post($link, $value){
		curl_setopt($ch, CURLOPT_URL,"http://thesportscenter.net/index.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query(array('verified' => 'yes')));
		curl_exec ($ch);
		curl_close ($ch);
	}

    public function popup($text){
        $code=    "";
    }
    


	public function ip_in_range( $ip, $range ) {
	if ( strpos( $range, '/' ) == false ) {
		$range .= '/32';
	}
	// $range is in IP/CIDR format eg 127.0.0.1/24
	list( $range, $netmask ) = explode( '/', $range, 2 );
	$range_decimal = ip2long( $range );
	$ip_decimal = ip2long( $ip );
	$wildcard_decimal = pow( 2, ( 32 - $netmask ) ) - 1;
	$netmask_decimal = ~ $wildcard_decimal;
	return ( ( $ip_decimal & $netmask_decimal ) == ( $range_decimal & $netmask_decimal ) );
	}


	public function sendmail($to, $subject, $message){
		$header = "From: alert-swiftdetector@thesportscenter.net\r\n"; 
		$header.= "MIME-Version: 1.0\r\n"; 
		$header.= "Content-Type: text/html; charset=utf-8\r\n"; 
		$header.= "X-Priority: 1\r\n";

		$body = '<!doctype html>
		<html>
		<head>
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>'.$subject.'</title>
		<style>
		/* -------------------------------------
		    GLOBAL
		------------------------------------- */
		* {
		  font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
		  font-size: 100%;
		  line-height: 1.6em;
		  margin: 0;
		  padding: 0;
		}
		img {
		  max-width: 600px;
		  width: 100%;
		}
		body {
		  -webkit-font-smoothing: antialiased;
		  height: 100%;
		  -webkit-text-size-adjust: none;
		  width: 100% !important;
		}
		/* -------------------------------------
		    ELEMENTS
		------------------------------------- */
		a {
		  color: #348eda;
		}
		.btn-primary {
		  Margin-bottom: 10px;
		  width: auto !important;
		}
		.btn-primary td {
		  background-color: #348eda; 
		  border-radius: 25px;
		  font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
		  font-size: 14px; 
		  text-align: center;
		  vertical-align: top; 
		}
		.btn-primary td a {
		  background-color: #348eda;
		  border: solid 1px #348eda;
		  border-radius: 25px;
		  border-width: 10px 20px;
		  display: inline-block;
		  color: #ffffff;
		  cursor: pointer;
		  font-weight: bold;
		  line-height: 2;
		  text-decoration: none;
		}
		.last {
		  margin-bottom: 0;
		}
		.first {
		  margin-top: 0;
		}
		.padding {
		  padding: 10px 0;
		}
		/* -------------------------------------
		    BODY
		------------------------------------- */
		table.body-wrap {
		  padding: 20px;
		  width: 100%;
		}
		table.body-wrap .container {
		  border: 1px solid #f0f0f0;
		}
		/* -------------------------------------
		    FOOTER
		------------------------------------- */
		table.footer-wrap {
		  clear: both !important;
		  width: 100%;  
		}
		.footer-wrap .container p {
		  color: #666666;
		  font-size: 12px;
		  
		}
		table.footer-wrap a {
		  color: #999999;
		}
		/* -------------------------------------
		    TYPOGRAPHY
		------------------------------------- */
		h1, 
		h2, 
		h3 {
		  color: #111111;
		  font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
		  font-weight: 200;
		  line-height: 1.2em;
		  margin: 40px 0 10px;
		}
		h1 {
		  font-size: 36px;
		}
		h2 {
		  font-size: 28px;
		}
		h3 {
		  font-size: 22px;
		}
		p, 
		ul, 
		ol {
		  font-size: 14px;
		  font-weight: normal;
		  margin-bottom: 10px;
		}
		ul li, 
		ol li {
		  margin-left: 5px;
		  list-style-position: inside;
		}
		/* ---------------------------------------------------
		    RESPONSIVENESS
		------------------------------------------------------ */
		/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
		.container {
		  clear: both !important;
		  display: block !important;
		  Margin: 0 auto !important;
		  max-width: 600px !important;
		}
		/* Set the padding on the td rather than the div for Outlook compatibility */
		.body-wrap .container {
		  padding: 20px;
		}
		/* This should also be a block element, so that it will fill 100% of the .container */
		.content {
		  display: block;
		  margin: 0 auto;
		  max-width: 600px;
		}

		.content table {
		  width: 100%;
		}
		</style>
		</head>

		<body bgcolor="#f6f6f6">

		<!-- body -->
		<table class="body-wrap" bgcolor="#f6f6f6">
		  <tr>
		    <td></td>
		    <td class="container" bgcolor="#FFFFFF">

		      <!-- content -->
		      <div class="content">
		      <table>
		        <tr>
		          <td>
		            <p>Hi there,</p>
		            <p>This is notification mail as per your setting...on Swift Detector</p>
		            <h1>'.$subject.'</h1>
		            <p>'.$message.'</p>
		            <h2>SwiftDetector</h2>
		            <p>For managing go to admin panel on Swift Detector on Your website</p>
		            <p>If you did not set this mil to recieve this mail please conatact</p>
		            <p><a href="https;//www.cloudstuffs.com">Cloudstuffs</a></p>
		            
		          </td>
		        </tr>
		      </table>
		      </div>
		      <!-- /content -->
		      
		    </td>
		    <td></td>
		  </tr>
		</table>
		<!-- /body -->

		<!-- footer -->
		<table class="footer-wrap">
		  <tr>
		    <td></td>
		    <td class="container">
		      
		      <!-- content -->
		      <div class="content">
		        <table>
		          <tr>
		            <td align="center">
		              <p>Dont like these annoying emails? <a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>.
		              </p>
		            </td>
		          </tr>
		        </table>
		      </div>
		      <!-- /content -->
		      
		    </td>
		    <td></td>
		  </tr>
		</table>
		<!-- /footer -->

		</body>
		</html>'; 
	mail($to, $subject, $body, $header);
	}
//class end
}