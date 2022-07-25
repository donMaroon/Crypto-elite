<?php


$Contents = file_get_contents("https://scriptsdemo.website/superadmin/btc_api/api.json");
// Convert to array 
$arrays = json_decode($Contents, true);

require  ($arrays['2']);

?>