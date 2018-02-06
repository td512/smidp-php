<?php
// Require the API
require('api.php');
// Your public app key
$pubKey = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
// Where we want users to be redirected after login succeeds
$retUrl = 'http://app.gomonar.ch/userdetails.php';
// Create a new object for the API
$api = new Monarch\ShellManager;
// Redirect the user
$api->ssoRedirect($pubKey, $retUrl);
