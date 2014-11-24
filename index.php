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

<style>
.wrapper {
    width: 380px !important;
}
</style>
	<div class="wrapper">

	<div class="container">
	<div class="row">
		<div class="twelve columns alpha omega"><br>
      <a href="http://localhost:8888/Detail_Site_Final/app/homepage.html" class="logo">Detail<span class="dot">.</span></a>
      <img src="presents.png"><br><br>
			<h1 style="font-size: 32px; text-align: center;" >Kris Krindle Generator</h1>
			<p style="color: #222; text-align: center; font-size: 16px; line-height: 1.65em;">A tiny app that takes a list of names and randomly matches them together for some office gift giving.</p>
            <br><br>
			<form class="details" action="" method="post" style="margin-top: -40px;">
				<fieldset>
				<!-- Text input-->
					<div class="one-person-details-1">
				 	 	<input name="name" class="name-input" type="text" placeholder="Name" style="width: 42%; margin-right: 5%;float: left;">
				  		<input name="email" class="email-input" type="text" placeholder="Email" style="width: 42%;">
				  </div>
				  	<div class="one-person-details">
				 	 	<input name="name" class="name-input" type="text" placeholder="Name" style="width: 42%; margin-right: 5%;float: left;">
				  		<input name="email" class="email-input" type="text" placeholder="Email" style="width: 42%;">
				  	</div>
				  	<div class="one-person-details">
				 	 	<input name="name" class="name-input" type="text" placeholder="Name" style="width: 42%; margin-right: 5%;float: left;">
				  		<input name="email" class="email-input" type="text" placeholder="Email" style="width: 42%;">
				  	</div>
				  	<div class="one-person-details">
				 	 	<input name="name" class="name-input" type="text" placeholder="Name" style="width: 42%; margin-right: 5%;float: left;">
				  		<input name="email" class="email-input" type="text" placeholder="Email" style="width: 42%;">
				  	</div>

				  	<a id="addperson" style="width: 100%; font-size: 14px; text-align: center; display: block; opacity: 0.4;cursor: pointer; margin-bottom: -10px;">+ Add Person</a><br>

				  	<button id="matchandsend" type="button" class="button lrg" style="padding-top: 17px; padding-bottom: 13px; width: 100%;"/>Match &amp; Send</button>

				  	


				</fieldset>
			</form>
      <small style="opacity: 0.4">A little something by Detail. Design Studio. Tweet.</small>


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

var newBox = $('.one-person-details-1').html();

$('body').on('click', "#addperson", function() {
	$('.details fieldset .one-person-details-1').append(newBox);
});

function getInfoNew() {
	$('.one-person-details, .one-person-details-1').each(function() {

		personName = $(this).children().first().val();
		personEmail = $(this).children('.email-input').val();

		personName = {
			firstName: personName,
			email: personEmail
		}

        if (personName.firstName != '' && personName.email != '') {
            peopleArray.push(personName);
            giversArray.push(personName);
        } else {
            alert('Please fill in all fields before matching and sending')
        }

        if (giversArray.length < 2) {
            return;
            alert('Please input more than 1 person to Match and Send');
        }
		

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

			//if the person picked is the name as this person, run the getRandom loop again
			if (randomPerson.firstName === thisPerson.firstName) {
				getRandom();
				if (randomPerson.firstName === thisPerson.firstName) {
					getRandom();
                        if (randomPerson.firstName === thisPerson.firstName) {
                            getRandom();
                    }
				}
			}

      thisPerson.givesGiftTo = randomPerson.firstName;

      //randomPerson.givesGiftTo = thisPerson;

			//remove the gifter from the gifters array
			giversArray.splice(thePosition, 1);

			//Print the result
			console.log(thisPerson.firstName + " has to buy for " + randomPerson.firstName);

	}

	console.log('*** Shows over folks!');

  console.log(peopleArray);
}

function passToPHP() {

    $.ajax(
                {
                    type: "POST",
                    url: 'email.php',
                    data: 
                    {
                        'givers': JSON.stringify(giversArray)
                    },
                    success: function()
                    {
                        alert('Emails Sent');
                    },
                    error: function()
                    {
                        alert('Error encountered. Please reload the page and try again')
                    }
                });
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