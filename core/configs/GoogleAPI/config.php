<?php
$gClient = new Google_Client();
$gClient->setClientId("598605081801-665p8rc3lrgcna8o7ip6075o4chhaiut.apps.googleusercontent.com");
$gClient->setClientSecret("oOxdwKo0KSk-aGivcbVlKFuJ");
$gClient->setApplicationName("eLibrary");
$gClient->setRedirectUri("https://elibraryapp.000webhostapp.com/gmail");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
$gClient->setAccessType("offline");
$gClient->setIncludeGrantedScopes(true); 
?>
