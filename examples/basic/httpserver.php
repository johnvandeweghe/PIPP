<?php

require_once ("vendor/autoload.php");

$request = \IPP\Server\HTTPServer::buildRequestFromGlobals();

$mockPrinter = \IPP\Printer\DefaultPrinter::createFromValues("http://127.0.0.1:80/print", "Not a real printer");

$printerPool = new \IPP\Printer\PrinterPool([$mockPrinter]);
$operationHandlerProvider = new \IPP\Server\FolderOperationHandlerProvider("src/Server/OperationHandlers/*OperationHandler.php");
$fileLogger = new \IPP\Server\Logger\FileLogger("tmp.log", \IPP\Server\Logger\Logger::LEVEL_ALL);

$ippServer = new \IPP\Server\Server($printerPool, $operationHandlerProvider, $fileLogger);

$httpServer = new \IPP\Server\HTTPServer($ippServer);

$response = $httpServer->handleRequest($request);

$response->dump();
