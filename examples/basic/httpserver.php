<?php

require_once ("vendor/autoload.php");

$request = \jvandeweghe\IPP\Server\HTTPServer::buildRequestFromGlobals();


$ippServer = new \jvandeweghe\IPP\Server\Server(new \jvandeweghe\IPP\Printer\PrinterPool(), new \jvandeweghe\IPP\Server\FolderOperationHandlerProvider("src/*OperationHandler.php"));

$httpServer = new \jvandeweghe\IPP\Server\HTTPServer($ippServer);

$response = $httpServer->handleRequest($request);

$response->
