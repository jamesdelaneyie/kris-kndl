<?php

    session_start();
    
    function getRealIp() {
       if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  //check ip from share internet
         $ip=$_SERVER['HTTP_CLIENT_IP'];
       } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
         $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
       } else {
         $ip=$_SERVER['REMOTE_ADDR'];
       }
       return $ip;
    }

    function writeLog($where) {
    
      $ip = getRealIp(); // Get the IP from superglobal
      $host = gethostbyaddr($ip);    // Try to locate the host of the attack
      $date = date("d M Y");
      
      // create a logging message with php heredoc syntax
      $logging = <<<LOG
        \n
        << Start of Message >>
        There was a hacking attempt on your form. \n 
        Date of Attack: {$date}
        IP-Adress: {$ip} \n
        Host of Attacker: {$host}
        Point of Attack: {$where}
        << End of Message >>
LOG;
// Awkward but LOG must be flush left
    
            // open log file
        if($handle = fopen('hacklog.log', 'a')) {
        
          fputs($handle, $logging);  // write the Data to file
          fclose($handle);           // close the file
          
        } else {  // if first method is not working, for example because of wrong file permissions, email the data
        
          $to = 'james@detail.ie';  
              $subject = 'HACK ATTEMPT';
              $header = 'From: james@detail.ie';
              if (mail($to, $subject, $logging, $header)) {
                echo "Sent notice to admin.";
              }
    
        }
    }

    function verifyFormToken($form) {
        
        // check if a session is started and a token is transmitted, if not return an error
      if(!isset($_SESSION[$form.'_token'])) { 
        return false;
        }
      
      // check if the form is sent with token in it
      if(!isset($_POST['token'])) {
        return false;
        }
      
      // compare the tokens against each other if they are still the same
      if ($_SESSION[$form.'_token'] !== $_POST['token']) {
        return false;
        }
      
      return true;
    }
    
    function generateFormToken($form) {
    
        // generate a token from an unique value, took from microtime, you can also use salt-values, other crypting methods...
      $token = md5(uniqid(microtime(), true));  
      
      // Write the generated token to the session variable to check it against the hidden field when the form is sent
      $_SESSION[$form.'_token'] = $token; 
      
      return $token;
    }
    
    // VERIFY LEGITIMACY OF TOKEN
    if (verifyFormToken('form1')) {
    
        // CHECK TO SEE IF THIS IS A MAIL POST
        if (isset($_POST['URL-main'])) {
        
            // Building a whitelist array with keys which will send through the form, no others would be accepted later on
            $whitelist = array('token','req-email');
            
            // Building an array with the $_POST-superglobal 
            foreach ($_POST as $key=>$item) {
                    
                    // Check if the value $key (fieldname from $_POST) can be found in the whitelisting array, if not, die with a short message to the hacker
                if (!in_array($key, $whitelist)) {
                  
                  writeLog('Unknown form fields');
                  die("Hack-Attempt detected. Please use only the fields in the form");
                  
                }
            }
            
            
            
            
            
            
            // Lets check the URL whether it's a real URL or not. if not, stop the script
            
            if(!filter_var($_POST['URL-main'],FILTER_VALIDATE_URL)) {
                  writeLog('URL Validation');
                die('Hack-Attempt detected. Please insert a valid URL');
            }
    
    
    
    
    
            // SAVE INFO AS COOKIE, if user wants name and email saved
            
            $saveCheck = $_POST['save-stuff'];
            if ($saveCheck == 'on') {
                setcookie("WRCF-Email", $_POST['req-email'], time()+60*60*24*365);
            }
            
            
            
            
            // PREPARE THE BODY OF THE MESSAGE

      $message = '<html><body>';
      $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
      $message .= "<tr><td><strong>TEST MAIL</td><td></td></tr>";
      $message .= "</table>";
      $message .= "</body></html>";
      
      
      
      
      //  MAKE SURE THE "FROM" EMAIL ADDRESS DOESN'T HAVE ANY NASTY STUFF IN IT
      
      $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i"; 
            if (preg_match($pattern, trim(strip_tags($_POST['req-email'])))) { 
                $cleanedFrom = trim(strip_tags($_POST['req-email'])); 
            } else { 
                return "The email address you entered was invalid. Please try again!"; 
            } 
      
      
            
            
            //   CHANGE THE BELOW VARIABLES TO YOUR NEEDS
             
      $to = 'james@detail.ie';
      
      $subject = 'Subscription';
      
      $headers = "From: " . $cleanedFrom . "\r\n";
      $headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            if (mail($to, $subject, $message, $headers)) {
              echo 'Your message has been sent.';
            } else {
              echo 'There was a problem sending the email.';
            }
            
            // DON'T BOTHER CONTINUING TO THE HTML...
            die();
        
        }
    } else {
    
      if (!isset($_SESSION[$form.'_token'])) {
      
      } else {
        echo "Hack-Attempt detected. Got ya!.";
        writeLog('Formtoken');
        }
   
    }

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <!-- Page Meta 
    ================================================== -->
    <title>Detail Kris Kringle</title>
    <meta name="author" content="***">
    <meta name="description" content="***">
    <link rel="canonical" href="***">

    <!-- Social: Facebook / Open Graph
    ================================================== -->
    <meta property="og:title" content="***">
    <meta property="og:description" content="***">
    <meta property="og:type" content="***">
    <meta property="og:image" content="***"/>
    <meta property="og:url" content="***">
    <meta property="og:site_name" content="***">
    <meta property="article:author" content="***">

    <!-- Social: Twitter
    ================================================== -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="***">
    <meta name="twitter:creator" content="***">
    <meta name="twitter:title" content="***">
    <meta name="twitter:description" content="***">
    <meta name="twitter:image:src" content="***">

    <meta name="google" content="notranslate" />
    <meta name="google-site-verification" content="***" />

    <!-- CSS
    ================================================== -->

     <!-- build:css /styles/site.css -->
    <link rel="stylesheet" type="text/css" href="styles/base.css">
    <link rel="stylesheet" type="text/css" href="styles/exo-skeleton.css">
    <link rel="stylesheet" type="text/css" href="styles/royalslider.css">
    <link rel="stylesheet" type="text/css" href="styles/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/layout.css">
    <!-- endbuild -->

    <!-- Icons
    ================================================== -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Web Starter Kit">

    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/apple-touch-icon-precomposed-152x152.png">

    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="/path/to/favicon-144.png">
    <meta name="msapplication-config" content="browserconfig.xml" />

    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
    <!--[if lt IE 8]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <?php
   	// generate a new token for the $_SESSION superglobal and put them in a hidden field
  	$newToken = generateFormToken('form1');   
  	?>

	<div class="wrapper">

	<div class="container">
	<div class="row">
		<div class="four columns alpha omega offset-by-four"><br>
      <a href="http://localhost:8888/Detail_Site_Final/app/homepage.html" class="logo">Detail<span class="dot">.</span></a>
			<br><br>
			<h1 class="bold">Kris Krindle Sorter</h1>
			<p style="color: #222;">Our magical javascript elves will match everyone and send an email with all the info here.<br><br>If you want a list that you can check twice, you can download a txt file of the matches as well</p>
	
			<br>
			

      <?php


            //print_r(json_decode($_POST['json']));//converts the json string to a php array

            //if "email" variable is filled out, send email
              if (isset($_REQUEST['email']))  {
              
            //Email information
              $admin_email = "james@detail.ie";
              $email = $_REQUEST['email'];
              $subject = 'Kris Test';
              $comment = $email;
              
              //send email
              mail($admin_email, "$subject", $comment, "From:" . $email);
              
              //Email response
              echo "<h5>Sweet! The matches have been sent!</h5>";
              }
              
              //if "email" variable is not filled out, display the form
              else  {
          ?>

			<form class="details" action="" method="post">
        <h5>Enter names and emails:</h5>
				<fieldset>
				<!-- Text input-->
					<br>

					<div class="one-person-details">
				 	 	<input name="name" class="name-input" type="text" placeholder="Name" style="width: 40%; margin-right: 10px;float: left;">
				  		<input name="email" class="email-input" type="text" placeholder="Email" style="width: 40%;">
				  	</div>
				  	<div class="one-person-details">
				 	 	<input name="name" class="name-input" type="text" placeholder="Name" style="width: 40%; margin-right: 10px;float: left;">
				  		<input name="email" class="email-input" type="text" placeholder="Email" style="width: 40%;">
				  	</div>
				  	<div class="one-person-details">
				 	 	<input name="name" class="name-input" type="text" placeholder="Name" style="width: 40%; margin-right: 10px;float: left;">
				  		<input name="email" class="email-input" type="text" placeholder="Email" style="width: 40%;">
				  	</div>
				  	<div class="one-person-details">
				 	 	<input name="name" class="name-input" type="text" placeholder="Name" style="width: 40%; margin-right: 10px;float: left;">
				  		<input name="email" class="email-input" type="text" placeholder="Email" style="width: 40%;">
				  	</div>

				  	<button id="addperson" type="button">+</button><br><br>



				  	<input type="submit" value="Match &amp; Send"/>

				  	


				</fieldset>
			</form>
      <br><small style="opacity: 0.4">A little something by Detail. Design Studio. Tweet.</small>


<?php
  }
?>

		</div>
	</div>
</div>
</div>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>window.jQuery || document.write('<script src="scripts/jquery-1.11.0.min.js"><\/script>')</script>
<script>

var peopleArray = [];
var giversArray = [];

//For adding new people

var newBox = $('.one-person-details').html();

$('body').on('click', "#addperson", function() {
	$('.details fieldset .one-person-details').append(newBox);
});

function getInfoNew() {
	$('.one-person-details').each(function() {

		personName = $(this).children().first().val();
		personEmail = $(this).children('.email-input').val();

		personName = {
			firstName: personName,
			email: personEmail,
			hasPerson: false
		}

		peopleArray.push(personName);
		giversArray.push(personName);

	})
	//get the number of people in the array
	numberOfPeople = peopleArray.length; 
}

//get Random Person 
function getRandom() {
	randomPerson = giversArray[Math.floor(Math.random() * giversArray.length)];
	//get their position in the array to remove them later
	thePosition = giversArray.indexOf(randomPerson);
	//console.log(thePosition);
};

//function to pick names from a hat
function pickNames() {

	console.log('*** Pick Names is running');

	for ( var i = 0 ; i < numberOfPeople; i++) {

			//get the current person for this loop
			thisPerson = peopleArray[i];

			// get a random person from the people array
			getRandom();

			//if the person picked is the name as this person, run the getRandom loop again, and output BOLLOCKS
			if (randomPerson.firstName === thisPerson.firstName) {
				console.log('***** BOLLOCKS *******');
				getRandom();
				if (randomPerson.firstName === thisPerson.firstName) {
					getRandom();
				}
			}

			//remove the gifter from the gifters array
			giversArray.splice(thePosition, 1);

			//Print the result
			console.log(thisPerson.firstName + " has to buy for " + randomPerson.firstName);

	}

	console.log('*** Shows over folks!');
}

function passToPHP() {
    var json_str = JSON.stringify(peopleArray); 
}

//get people and push them into array
$('#matchandsend').on('click', function() {

	getInfoNew();
	pickNames();
  passToPHP();

});


</script>
<!-- build:js /scripts/site.js -->
<script src="scripts/app.js"></script>
<!-- endbuild -->

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>


<!-- End Document
================================================== -->
</body>
</html>