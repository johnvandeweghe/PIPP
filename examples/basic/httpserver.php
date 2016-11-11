<?php

require_once ("vendor/autoload.php");

$headers = getallheaders();

$body = file_get_contents("php://input");

$request = new \jvandeweghe\IPP\Server\Request($headers, $body);

$f = fopen("/tmp/text.log" , 'a');

ob_start();
var_dump($request->getOperation());
fwrite($f, ob_get_contents());
ob_end_clean();

fclose($f);

$server = new \jvandeweghe\IPP\Server\Server();

try {
    $server->handleRequest($request);
} catch(\jvandeweghe\IPP\Server\Exceptions\InvalidRequestException $invalidRequestException) {
    header("400 Bad Request", true, 400);
}
