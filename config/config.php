<?php

ini_set('display_errors', '0');     # don't show any errors...
error_reporting(E_ALL | E_STRICT);  # ...but do log them

//Your MySQL Database Server (Default - localhost) // Added - Necrojelly 2009-12-10
$GLOBALS["DatabaseServer"]			= "localhost:50001"; // Added - Necrojelly 2009-12-10
//Your MySQL Database Name
$GLOBALS["DatabaseName"]			= "webdkp";
//The Username linked to your MySQL DB
$GLOBALS["DatabaseUsername"]		= "enter your username for your mysql server here";
//The password for the MySQL user above
$GLOBALS["DatabasePassword"]		= "enter your password for your server here";
//Title of the site Default:WebDKP
$GLOBALS["SiteTitle"]			 	= "Agony Webdkp";
$GLOBALS["SiteKeywords"]     	 	= "";
$GLOBALS["SiteDescription"]		 	= "";
//The main root of your website - Ex: http://www.mysite.com/
// This DOES NOT include the WebDKP directory
$GLOBALS["SiteRoot"]			= "http://www.mywebsite.com/webdkp/";
$GLOBALS["SupportedExtensions"] 	= array("php","phps","aspx","html","htm","js","css");
?>
