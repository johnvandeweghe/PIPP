<?php

namespace jvandeweghe\IPP\Server;

use jvandeweghe\IPP\Operation;
use jvandeweghe\IPP\Printer\PrinterPool;
use jvandeweghe\IPP\Server\Exceptions\UnsupportedOperationException;
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

    public function __construct(PrinterPool $printerPool, OperationHandlerProvider $operationHandlerProvider) {
        $this->printerPool = $printerPool;
        $this->operationHandlerProvider = $operationHandlerProvider;
    }

    /**
     * @param Operation $requestOperation
     * @return Operation
     */
    public function handleRequest(Operation $requestOperation)
    {
        try {
            /**
             * @var $operationHandler OperationHandler
             */
            $operationHandler = new $this->operationHandlerProvider->getOperationHandlersById($requestOperation->getOperationIdOrStatusCode());

            return $operationHandler->handleOperation($requestOperation, $this->routePrinter($requestOperation->getAttributeByName("printer-uri")));

        } catch(UnsupportedOperationException $unsupportedOperationException) {
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
}
