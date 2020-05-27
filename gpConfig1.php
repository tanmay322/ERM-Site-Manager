<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '70340154626-qhdiqi90aeekesnj7n93nei5jls037ut.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'mojWKQQCyGEeaF5KnqfxCRLH'; //Google client secret
$redirectURL = 'http://erm.epizy.com/google_login/student_login.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Education Resource');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>