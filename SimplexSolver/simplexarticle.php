


<!-- META DATA COPIER  START-->
<!-- ################ -->
<?php
	// get user details
        $user_agent = $_SERVER['HTTP_USER_AGENT']; //user browser
        $ip_address = $_SERVER["REMOTE_ADDR"];     // user ip adderss
        $page_name = $_SERVER["SCRIPT_NAME"];      // page the user looking
        $query_string = $_SERVER["QUERY_STRING"];   // what query he used
        $current_page = $page_name."?".$query_string; 

	// get time
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d");
        $time = date("H:i:s");
	
	//printing
		//echo "<br>#:  ".$date."<br>#:  ".$time."<br>#:  ".$user_agent."<br>#:  ".$ip_address."<br>#:  ".$page_name."<br>#:  ".$query_string."<br>#:  ".$current_page;
	
		
	//API class START
	final class ip2location_lite{
		protected $errors = array();
		protected $service = 'api.ipinfodb.com';
		protected $version = 'v3';
		protected $apiKey = '';
	
		public function __construct(){}
	
		public function __destruct(){}
	
		public function setKey($key){
			if(!empty($key)) $this->apiKey = $key;
		}
	
		public function getError(){
			return implode("\n", $this->errors);
		}
	
		public function getCountry($host){
			return $this->getResult($host, 'ip-country');
		}
	
		public function getCity($host){
			return $this->getResult($host, 'ip-city');
		}
	
		private function getResult($host, $name){
			$ip = @gethostbyname($host);
	
			// if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)){
			if(filter_var($ip, FILTER_VALIDATE_IP)){
				$xml = @file_get_contents('http://' . $this->service . '/' . $this->version . '/' . $name . '/?key=' . $this->apiKey . '&ip=' . $ip . '&format=xml');
	
	
				if (get_magic_quotes_runtime()){
					$xml = stripslashes($xml);
				}
	
				try{
					$response = @new SimpleXMLElement($xml);
	
					foreach($response as $field=>$value){
						$result[(string)$field] = (string)$value;
					}
	
					return $result;
				}
				catch(Exception $e){
					$this->errors[] = $e->getMessage();
					return;
				}
			}
	
			$this->errors[] = '"' . $host . '" is not a valid IP address or hostname.';
			return;
		}
	}
	//API class END
	
	//Load the class
	$ipLite = new ip2location_lite;
	$ipLite->setKey('24a1b745819f2d20e2cbc7b95e03e4a76dbeb1de38ef57891696c0b135913ebc');
	 
	//Get errors and locations
	$locations = $ipLite->getCity($_SERVER['REMOTE_ADDR']);
	$errors = $ipLite->getError();
	
	//getting results in variables
	$statusCode=$locations [statusCode];
	$statusMessage=$locations [statusMessage];
	$ipAddress=$locations [ipAddress];
	$countryCode=$locations [countryCode];
	$countryName=$locations [countryName];
	$regionName=$locations [regionName];
	$cityName=$locations [cityName];
	$zipCode=$locations [zipCode];
	$latitude=$locations [latitude];
	$longitude=$locations [longitude];
	$timeZone=$locations [timeZone];
	
	//storing results in database
	/* Attempt MySQL server connection. Assuming you are running MySQL
		server with default setting (user 'root' with no password) */
		$link = mysqli_connect("localhost", "u769469220_root", "luvulinkin", "u769469220_lean");
		 
		// Check connection
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
	//include_once(connect.php);
	$sql = "INSERT INTO metadata (date, time, browser, pagename, currentpage, statusCode, statusMessage, ipAddress, countryCode, countryName, regionName, cityName, zipCode, latitude, longitude, timeZone) VALUES ('$date', '$time', '$user_agent', '$page_name', '$current_page', '$statusCode', '$statusMessage', '$ipAddress', '$countryCode', '$countryName', '$regionName', '$cityName', '$zipCode', '$latitude', '$longitude', '$timeZone')";
	if(mysqli_query($link, $sql)){
		//echo "Success";
	} else{
		$res="ERROR: Could not able to execute $sql." .mysqli_error($link);
		echo $res;
		//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	 
	//Getting the result
	/*echo "<p>\n";
	echo "<strong>First result</strong><br />\n";
	if (!empty($locations) && is_array($locations)) {
	  foreach ($locations as $field => $val) {
		echo $field . ' : ' . $val . "<br />\n";
		
	  }
	}
	echo "</p>\n";
	 
	//Show errors
	echo "<p>\n";
	echo "<strong>Dump of all errors</strong><br />\n";
	if (!empty($errors) && is_array($errors)) {
	  foreach ($errors as $error) {
		echo var_dump($error) . "<br /><br />\n";
	  }
	} else {
	  echo "No errors" . "<br />\n";
	}
	echo "</p>\n";*/

    	
?>
<!-- META DATA COPIER  END-->
<!-- ################ -->



<?php
header('Location:http://kuldeepsinghsidhu.esy.es/SimplexSolver/SimplexAlgorithm.pdf');
?>


