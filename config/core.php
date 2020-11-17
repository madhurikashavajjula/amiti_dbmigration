<?php
// show error reporting
error_reporting(E_ALL);
 
// set your default time-zone
date_default_timezone_set('Asia/Manila');
 
// variables used for jwt
$key = "zeroclient";

//Rest is called the registered claim names
$iss = "http://zeroclientglobal.com"; 	//issuer
$aud = "http://zeroclientglobal.com";	//audience
$iat = 1356999524;		//issued at
$nbf = 1357000000;		//not before
?>