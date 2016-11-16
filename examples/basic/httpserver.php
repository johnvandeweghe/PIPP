<?php

require_once ("vendor/autoload.php");

$request = \jvandeweghe\IPP\Server\HTTPServer::buildRequestFromGlobals();

$mockPrinter = \jvandeweghe\IPP\Printer\DefaultPrinter::createFromValues("http://127.0.0.1:80/print", "Not a real printer");

$printerPool = new \jvandeweghe\IPP\Printer\PrinterPool([$mockPrinter]);
$operationHandlerProvider = new \jvandeweghe\IPP\Server\FolderOperationHandlerProvider("src/Server/OperationHandlers/*OperationHandler.php");
$fileLogger = new \jvandeweghe\IPP\Server\Logger\FileLogger("tmp.log", \jvandeweghe\IPP\Server\Logger\Logger::LEVEL_ALL);

$ippServer = new \jvandeweghe\IPP\Server\Server($printerPool, $operationHandlerProvider, $fileLogger);

$httpServer = new \jvandeweghe\IPP\Server\HTTPServer($ippServer);

$response = $httpServer->handleRequest($request);

$response->dump();
