<?php
// Require the API
require('api.php');
// Your private app key
$privKey = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
// Create a new object for the API
$api = new Monarch\ShellManager;
// Handle the SSO response. The token will always be passed back in the "code" querystring
$callback = $api->ssoHandler($privKey, $_GET["code"]);
// These are here to show you what it looks like when the request succeeds and fails, and when the user denies you permission
header("Content-Type: application/json");
print($callback);
