<?php

namespace jvandeweghe\IPP\Server;

use jvandeweghe\IPP\Operation;
use jvandeweghe\IPP\Printer\PrinterPool;
use jvandeweghe\IPP\Server\Exceptions\UnsupportedOperationException;
use jvandeweghe\IPP\Server\Logger\Logger;
use jvandeweghe\IPP\Server\OperationHandlers\OperationHandler;

class Server {
    /**
     * @var PrinterPool
     */
    private $printerPool;
    /**
     * @var OperationHandlerProvider
     */
    private $operationHandlerProvider;
    /**
     * @var Logger|null
     */
    private $logger;

    public function __construct(PrinterPool $printerPool, OperationHandlerProvider $operationHandlerProvider, Logger $logger = null) {
        $this->printerPool = $printerPool;
        $this->operationHandlerProvider = $operationHandlerProvider;
        $this->logger = $logger;
    }

    /**
     * @param Operation $requestOperation
     * @return Operation
     */
    public function handleRequest(Operation $requestOperation)
    {
        try {
            $operationHandlerClass = $this->operationHandlerProvider->getOperationHandlersById($requestOperation->getOperationIdOrStatusCode());
            /**
             * @var $operationHandler OperationHandler
             */
            $operationHandler = new $operationHandlerClass;

            $this->log(
                sprintf("Operation handled: Request ID: %d Operation ID: 0x%s",
                    $requestOperation->getRequestId(),
                    str_pad(dechex($requestOperation->getOperationIdOrStatusCode()), 2, '0', STR_PAD_LEFT)
                ),
                Logger::LEVEL_INFO
            );

            return $operationHandler->handleOperation($requestOperation, $this->printerPool->getPrinter($requestOperation->getAttributeByName("printer-uri")->getValues()[0]));

        } catch(UnsupportedOperationException $unsupportedOperationException) {
            $this->log("Operation unsupported: 0x" . str_pad(dechex($requestOperation->getOperationIdOrStatusCode()), 2, '0', STR_PAD_LEFT), Logger::LEVEL_ERROR);
            //TODO: return an operation, or throw it up higher to trigger an http 500
        }
    }

    //TODO: Maybe move this into Request?
    private function routePrinter($url) {
        if(!$url) {
            return null;
        }
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $explodedURL = explode('/', $url);
        $queue = array_pop($explodedURL);
        $printer = array_pop($explodedURL);
        return $this->printerPool->getPrinter($printer);
    }

    public function log($message, $logLevel) {
        if($this->logger) {
            $this->logger->log($message, $logLevel);
        }
    }
}
