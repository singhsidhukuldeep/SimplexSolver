


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


<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Simplex Algo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->

  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">

    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          </button>
          <a class="brand" href="https://kuldeepsinghsidhu.esy.es/SimplexSolver">SIMPLEX SOLVER</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li>
                <a href="https://kuldeepsinghsidhu.esy.es/SimplexSolver">Home</a>
              </li>
              <li class="active">
                <a href="https://kuldeepsinghsidhu.esy.es/SimplexSolver/AboutSimplex.php">Simplex Algo</a>
              </li>
              <li class="">
                <a href="http://kuldeepsinghsidhu.esy.es">About Us</a>
              </li>
              <li class="">
                <a href="http://kuldeepsinghsidhu.esy.es">Developer (Kuldeep Singh Sidhu)</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

<div class="jumbotron masthead">
  <div class="container-fluid">
  	<br><br>
    <h1>Simplex algorithm</h1>
    <p>In mathematical optimization, Dantzig's simplex algorithm (or simplex method) is a popular algorithm for linear programming.<br><br>The name of the algorithm is derived from the concept of a simplex and was suggested by T. S. MotzkinSimplices are not actually used in the method, but one interpretation of it is that it operates on simplicial cones, and these become proper simplices with an additional constraint.The simplicial cones in question are the corners (i.e., the neighborhoods of the vertices) of a geometric object called a polytope. The shape of this polytope is defined by the constraints applied to the objective function.</p>
    Source: Wikipedia <a href="simplexarticle.php">(Download Article)</a> 
    
  </div>
</div>

<br><br>


<!--#########################################-->

<center>
<p><font color = "008822"><b>Disclaimer: </b></font>This page was created for educational purposes only. Its author is not responsible for any inaccuracies or errors in the results.


</center>
<center>
<div class="jumbotron masthead">
  <div class="container">
  	<br>
    
      <a href="https://github.com/singhsidhukuldeep/SimplexSolver" class="btn btn-primary btn-large" >Download Solver</a>
    
    <ul class="masthead-links">
      <li>
        <a href="https://github.com/singhsidhukuldeep" >GitHub Profile</a>
      </li>
      <li>
        <a href="https://www.linkedin.com/in/kuldeep-singh-sidhu-96a67170/" >Linked In</a>
      </li>
      <li>
        <a href="https://kuldeepsinghsidhu.esy.es/SimplexSolver" >Home</a>
      </li>
      <li>
        Version 1.0.1
      </li>
    </ul>
  </div>
</div>
</center>
<center><font class = "SmallColor">Email: <a href="mailto:singhsidhukuldeep@gmail.com">singhsidhukuldeep@gmail.com</a>
<br> Copyright &#169  <a href="http://kuldeepsinghsidhu.esy.es" target="_self">Kuldeep Singh Sidhu</a></font>
<br><a href="#top">Top of Page</a></center><br>


	
<!--#########################################-->






    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="../../platform.twitter.com/widgets.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-386.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>

    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>

    <script src="assets/js/application.js"></script>



  </body>

<!-- Mirrored from kristopolous.github.io/BOOTSTRA.386/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jun 2017 10:30:57 GMT -->
</html>
