<?php

?>

<!DOCTYPE html>


<html>
<head>
    <title> Google Map Experiment </title>
    <link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
    <style>
        #map-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin: auto;
            visibility: hidden;
            z-index: -1;
        }
        body {
            /*background-image: url('http://maps.googleapis.com/maps/api/staticmap?center=0,0&zoom=2&size=400x400');
            background-size: cover;
            background-repeat: no-repeat;*/
        }
        #signupBackground {
            position: absolute;
            display: block;
            background-color: rgba(100,100,100,0.5);
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 3;
            visibility: hidden;
        }
        #signupForm {
            position: absolute;
            visibility: hidden;
            top: 15em;
            z-index: 4;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            text-align: center;
        }
        #signupForm input {
            font-size: 3em;
        }
        #signupForm button {
            display: block;
            font-size: 2em;
            background-color: white;
            margin-left: auto;
            margin-right: auto;
        }
        #signupForm button:hover {
            color: white;
            background-color: black;
        }

        /* Change color of placeholder to a in the Book List Webpage*/
        #signupForm ::-webkit-input-placeholder { /* WebKit browsers */
            color: #000;
        }
        #signupForm :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
            color: #000;
            opacity:  1;
        }
        #signupForm ::-moz-placeholder { /* Mozilla Firefox 19+ */
            color: #000;
            opacity:  1;
        }
        #signupForm :-ms-input-placeholder { /* Internet Explorer 10+ */
            color: #000;
        }
        .close {
            background-color: white;
            border: 2px solid black;
            position: relative;
            display: inline;
        }
        .close:hover {
            cursor: pointer; cursor: hand;
        }
        #closeSignup {
            top: -17em;
            left: 16em;
        }
        #closeAbout {
            float: right;
        }
        #spaceOrbit {
            -webkit-animation: orbit 20s 20 linear;
        }
        #globe {
            border-radius: 100%;
            position: absolute;
            left: 33em;
            top: 10em;
            -webkit-animation: globeMove 20s 20 linear;
        }
        #globe:hover {
            cursor: pointer; cursor: hand;
            box-shadow: 0 0 30px 0 green;
        }
        input {
            text-align: center;
        }
        #loginForm {
            position: absolute;
            display: block;
            margin-bottom: 1em;
            width: 20em;
            left: 26em;
            text-align: center;
        }
        #uploadForm {
            position: absolute;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 1em;
            background-color: #DDD;
            border: 1px solid black;
            border-radius: 10px;
            visibility: hidden;
        }
        a {
            text-decoration: none;
            color: white;
        }
        #settings {
            position: relative;
            display: block;
            padding: inherit;
            border-radius: 10px;
            top: 1px;
            border: 1px solid black;
            visibility: hidden;
        }
        #settings:hover {
            border: 1px solid yellow;
        }
        button {
            outline: none;
        }
        .introButtons {
            position: absolute;
            display: block;
            color: white;
            width: 12em;
            left: 9em;
            margin-left: auto;
            margin-right: auto;
            font-size: 3em;
            padding-top: 1em;
            padding-bottom: 1em;
            border-radius: 20px;
            text-shadow: 0 0 5px black;
            box-shadow: inset 0 0 5px 3px gray;
            z-index: 2;
        }
        .introButtons:hover {
            cursor: pointer; cursor: hand;
            color: black;
            text-shadow: 0 0 5px white;
        }
        #viewGlobe {
            top: 3em;
            background-color: rgba(0,200,0,0.9);
        }
        #signupButton {
            top: 9em;
            background-color: rgba(0,0,255,0.9);
        }
        ul {
            list-style-type: none;
            margin: 0 8em 0 8em;
            padding: 0 0 1em 0;
            bottom: 0;
            position: fixed;
            width: 72em;
            background-color: black;
            border-radius: 10px;
        }
        li {
            display: inline-block;
            float: left;
            padding:0;
            width: 20em;
            text-align: center;
            color: black;
            height: 1.5em;
            font-weight: bold;
            margin-left: 1em;
            margin-right: 1em;
        }

        #about{
            visibility: hidden;
            position: absolute;
            top: 7em;
            z-index: 4;
            margin-left: 20%;
            margin-right: 20%;
            padding: 1em;
            width: 60%;
            min-width: 35em;
            text-align: center;
            background-color: white;
            border-radius: 10px;
        }
        #uploadtest {
            background-color: gray;
            display: inline;
            color: white;
            padding-bottom: 0.2em;
            border-radius: 5px;
        }
        #testResult {
            position: relative;
            display: inline;
            font-family: 'Play', 'sans-serif';
            font-size: 1.2em;
            visibility: hidden;
        }

        #emailError {
            font-size: 1.3em;
            color: red;
            background-color: black;
            border-radius: 10px;
            display: inline;
            padding: 0.2em 1em 0.2em 1em;
            visibility: hidden;
        }

        /* Chrome, Safari, Opera */
        @-webkit-keyframes orbit {
            from {
                -webkit-transform: rotate(0deg)
                           translate(-330px)
                           rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg)
                           translate(-330px)
                           rotate(-360deg);
            }
        }
        /* Chrome, Safari, Opera */
        @-webkit-keyframes globeMove {
            0%   { width: 400px; height: 400px; }
            5%   { width: 360px; height: 360px; }
            10%  { width: 320px; height: 320px; }
            15%  { width: 280px; height: 280px; }
            20%  { width: 240px; height: 240px; }
            23%  { width: 230px; height: 230px; }
            26%  { width: 220px; height: 220px; }
            30%  { width: 230px; height: 230px; }
            35%  { width: 260px; height: 260px; }
            40%  { width: 300px; height: 300px; }
            45%  { width: 360px; height: 360px; }
            50%  { width: 400px; height: 400px; }
            55%  { width: 440px; height: 440px; }
            60%  { width: 480px; height: 480px; }
            65%  { width: 520px; height: 520px; }
            70%  { width: 560px; height: 560px; }
            76%  { width: 600px; height: 600px; }
            80%  { width: 600px; height: 600px; }
            84%  { width: 560px; height: 560px; }
            89%  { width: 520px; height: 520px; }
            93%  { width: 480px; height: 480px; }
            96%  { width: 440px; height: 440px; }
            100% { width: 400px; height: 400px; }
        }


        /* Standard Syntax */
        @keyframes orbit {
            from {
                -webkit-transform: rotate(0deg)
                           translate(-330px)
                           rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg)
                           translate(-330px)
                           rotate(-360deg);
            }
        }
        /* Standard Syntax */
        @keyframes globeMove {
            0%   { width: 400px; height: 400px; }
            5%   { width: 360px; height: 360px; }
            10%  { width: 320px; height: 320px; }
            15%  { width: 280px; height: 280px; }
            20%  { width: 240px; height: 240px; }
            23%  { width: 230px; height: 230px; }
            26%  { width: 220px; height: 220px; }
            30%  { width: 230px; height: 230px; }
            35%  { width: 260px; height: 260px; }
            40%  { width: 300px; height: 300px; }
            45%  { width: 360px; height: 360px; }
            50%  { width: 400px; height: 400px; }
            55%  { width: 440px; height: 440px; }
            60%  { width: 480px; height: 480px; }
            65%  { width: 520px; height: 520px; }
            70%  { width: 560px; height: 560px; }
            76%  { width: 600px; height: 600px; }
            80%  { width: 600px; height: 600px; }
            84%  { width: 560px; height: 560px; }
            89%  { width: 520px; height: 520px; }
            93%  { width: 480px; height: 480px; }
            96%  { width: 440px; height: 440px; }
            100% { width: 400px; height: 400px; }
        }
    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="validate.js"></script>
    
    <script>

    // Initializing the google map
        function initialize() {
            mapCanvas = document.getElementById("map-canvas");
            var mapOptions = {
                center: new google.maps.LatLng(40.7024, -111.8040),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP,   //SATELLITE
                styles: [
                    {
                        featureType: 'road',
                        elementType: 'geometry.stroke',
                        stylers: [
                            { color: '#FF0000' },
                            { weight: 1.0 }
                        ]
                    }, {
                        featureType: 'poi',
                        elementType: 'geometry',
                        stylers: [
                            { visibility: 'off' }
                        ]
                    }, {
                        featureType: 'poi.school',
                        elementType: 'geometry',
                        stylers: [
                            { visibility: 'on' },
                            { hue: '#00FF00'},
                            { saturation: 99 }
                        ]
                    }
                ]
            }
            var map = new google.maps.Map(mapCanvas, mapOptions);
            new google.maps.Marker({
                position: {lat: 40, lng: -110},
                map: map
            });
        }

        // Adds a script to the document to load the Maps API, with a callback parameter to call
        // the initialize() function only after the API has loaded. The next line after loadScript()
        // calls loadScript() only once the document has fully loaded. So the document loads, which
        // calls loadScript(), which then loads the Maps API, and when that is finished loading it
        // calls the initialize() function to load the map.
        function loadScript() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?&v=3&' +
              'callback=initialize';
            document.body.appendChild(script);
            // &key=AIzaSyCLAW56jAzO71401mgdhSb3N9iFrfsHvsE   comes after v=3
        }
        window.onload = loadScript;

        // Event listener that waits until the page has loaded and then calls initialize()
        //google.maps.event.addDomListener(window, 'load', initialize);


    // Executed when user clicks the "View Trail Globe" button. Hides the two main View and SignUp buttons
        function loseLabels() {
            document.getElementById("viewGlobe").style.visibility="hidden";
            document.getElementById("signupButton").style.visibility="hidden";
            document.getElementById("map-canvas").style.visibility="visible";
            document.getElementById("globe").style.webkitAnimationPlayState="paused";
            // document.body.style.backgroundImage="initial";
            document.getElementById("globe").style.visibility="hidden";
            document.getElementById("bottomBanner").style.visibility="visible";
        }

    // Executes when user clicks the Sign Up or the orbiting globe.
    // Displays the Sign Up Form or the About section, respectively.
        function openDisplay(displayID) {
            document.getElementById(displayID).style.visibility="visible";
            if (displayID=="signupForm") document.getElementById("signupEmail").focus();
            document.getElementById("signupBackground").style.visibility="visible";
            document.getElementById("toBlur").style.webkitFilter="blur(5px)";
            document.getElementById("toBlur").style.filter="blur(5px)";
        }

    // Executes when the user clicks the "X" when the Sign Up form or About section is display.
    // Closes the whichever display is open.
        function closeDisplay(displayID) {
            document.getElementById(displayID).style.visibility="hidden";
            document.getElementById("signupBackground").style.visibility="hidden";
            document.getElementById("toBlur").style.webkitFilter="blur(0)";
            document.getElementById("toBlur").style.filter="blur(0)";
            if (displayID=="about") {
                document.getElementById("testResult").style.visibility="hidden";
                document.getElementById("emailError").innerHTML="";
                document.getElementById("testPhotoInput").value="";
            }
            if (displayID == "signupForm") {
                document.getElementById("emailError").style.visibility="hidden";
                document.getElementById("emailError").value="";
                document.getElementById("signupEmail").value="";
                document.getElementById("signupEmail").placeholder="Email";
                document.getElementById("signupPword").value="";
                document.getElementById("signupPword").placeholder="Password";
                document.getElementById("signupCpword").value="";
                document.getElementById("signupCpword").placeholder="Retype Password";
                document.getElementById("signupPword").style.backgroundColor="#FFF";
                document.getElementById("signupCpword").style.backgroundColor="#FFF";
                document.getElementById("signupEmail").style.backgroundColor="#FFF";
                document.getElementById("signupPword").style.borderColor="#FFF";
                document.getElementById("signupCpword").style.borderColor="#FFF";
                document.getElementById("signupEmail").style.borderColor="#FFF";
            }
        }

    // Executed on page-load. Checks for any parameters in the URL. The only time there are parameters
    // in the URL is when getting a result from testing a photo for GPS data, so this function executes
    // code to the display the result in that case.
        function checkURLparams() {
            if (/\?gps=/.test(document.URL)) {
                if (document.URL.split("?gps=")[1] == "true") {
                    openDisplay("about");
                    document.getElementById("testResult").style.visibility="visible";
                    document.getElementById("testResult").style.color="#0F0";
                    document.getElementById("testResult").innerHTML="Found GPS Data";
                } else if (document.URL.split("?gps=")[1] == "false") {
                    openDisplay("about");
                    document.getElementById("testResult").style.visibility="visible";
                    document.getElementById("testResult").style.color="#F00";
                    document.getElementById("testResult").innerHTML="No GPS Data Found";
                }
                window.history.replaceState({},"", "index.php");
            }
        }


    // AJAX for signup
        function ajaxCheck() {
            // if (signupValidate()) {
                var xmlhttp;
                // if (window.window.XMLHttpRequest)       // check for non-IE browsers
                    xmlhttp = new XMLHttpRequest();
                // else                                    // check for Internet Explorer 6.0+
                //     xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

                xmlhttp.open("POST", "signup.php", true);
                
                // try {
                //     xmlhttp.responseType="msxml-document";  // in case of IE
                // } catch (err) { }
                var emailValue = encodeURIComponent(document.getElementById("signupEmail").value);
                var pwordValue = encodeURIComponent(document.getElementById("signupPword").value);
                var parameters = "email="+emailValue+"&pword="+pwordValue;
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send(parameters);
                xmlhttp.onreadystatechange = function() {       // check status of request
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {     // wait till a response has been sent
                        if (xmlhttp.responseText == "taken") {
                            document.getElementById("emailError").style.visibility="visible";
                            document.getElementById("emailError").innerHTML="An account with this email is already set up";
                            document.getElementById("signupPword").value="";
                            document.getElementById("signupCpword").value="";
                            document.getElementById("signupEmail").value="";
                            document.getElementById("signupEmail").style.backgroundColor="white";
                            document.getElementById("signupPword").style.backgroundColor="white";
                            document.getElementById("signupCpword").style.backgroundColor="white";
                            document.getElementById("signupPword").style.borderColor="white";
                            document.getElementById("signupCpword").style.borderColor="white";
                        } else {        // if email address isn't already in database
                            window.location.assign("emailVerify.html");
                        }
                    }
                }
        }

    // blah
        function submitLogin() {

        }

    // Executes when the "Sign Up" button is clicked for the sign up form. Calls validation javascript and
    // Ajax function to check and submit form.
        function submitSignup() {
            if (signupValidate()) {
                ajaxCheck();
            }
        }


    </script>
</head>
<body onload="checkURLparams();">
    <div id="toBlur">
        <div id="spaceOrbit">
            <img id="globe" src="http://maps.googleapis.com/maps/api/staticmap?center=0,0&zoom=2&size=400x400"
                onclick="openDisplay('about');" title="About this Website">
        </div>
        <div id="map-canvas"></div>

        <button class="introButtons" id="signupButton" onclick="openDisplay('signupForm');">Sign Up To Add Trails</button>
        <button class="introButtons" id="viewGlobe" onclick="loseLabels();">View Trail Globe</button>
        
        

        <ul>
            <li style="float: left;">
                <form name="upload" id="uploadForm" action="uploadImage.php" method="POST" enctype="multipart/form-data" onsubmit="return true;">
                    <input type="file" name="uploadphoto" accept="image/jpg" multiple required>
                    <input type="submit" name="submit" value="Upload">
                </form>
            </li>
            <li >
                <form name="login" id="loginForm" action="#blah" method="POST" onsubmit="return loginValidate();">
                    <input type="text" id="loginEmail" name="email" placeholder="Email" required>
                    <input type="password" id="loginPword" name="pword"  placeholder="Password" required>
                    <!-- <input type="submit" name="submit" value="Login"> -->
                    <button name="loginButton" id="loginButton" onclick="submitLogin();">Login</button>
                </form>
            </li>
            <li style="float: right;">
                <a id="settings" href="#settings">Settings</a>
            </li>
        </ul>
    </div>
    <div id="about">
        <label onclick="closeDisplay('about');" class="close" id="closeAbout" title="Close">X</label>
        <p><h2> Sign up -> upload photos/GPS data -> map the world's trails! </h2></p><br>
        <p>
            By signing up you can contribute to this online resource which hopes to one day have trails mapped
            and photographed from all around the Earth. Without signing up you can still view and search the
            world's user-mapped and photographed trails.
        </p><br>
        <p> 
            This website was born out of the frustration I had when looking for trails in a new place whenever
            I moved or visited somewhere. TrailMaps is meant to be the ultimate resource for finding trails
            around the world. Not just finding trails, but viewing them right here to get a sense for the trail
            before you hit the trail.
        </p><br>
        <p>
            By signing up you can upload your own photos of trails. When uploading photos you want to make
            sure they are also recording the GPS coordinates, which most smart phones and some digital
            cameras do. Use the Test Photo button below to test out whether a photo from you chosen camera
            has its GPS data recorded.
        </p>
        <form name="uploadtest" id="uploadtest" action="testUpload.php" method="POST" enctype="multipart/form-data" onsubmit="return true;">
            <input type="file" id="testPhotoInput" name="testphoto" accept="image/jpg" required>
            <input type="submit" name="submit" value="Test Photo">
        </form>
        <br><br>
        <div id="testResult"></div>
        <br><br>
        <p>
            Created by Todd Kronenberg<br>tkrone@toddkronenberg.com
        </p>
    </div>
    <div id="signupBackground">
        <form name="signup" class="center" id="signupForm" action="" method="POST" onsubmit="return false;" >
            <input type="text" name="email" id="signupEmail" placeholder="Email" required><br>
            <input type="password" name="pword" id="signupPword" placeholder="Password" required><br>
            <input type="password" name="cPword" id="signupCpword" placeholder="Retype Password" required><br>
            <button name="submitButton" id="signupSubmit" onclick="submitSignup();">Sign Up</button>
            <label onclick="closeDisplay('signupForm');" class="close" id="closeSignup" title="Close">X</label>
            <br><br>
            <div id="emailError"></div>
        </form>

    </div>
</body>
</html>

