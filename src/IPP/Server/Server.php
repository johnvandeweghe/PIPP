<?php

namespace jvandeweghe\IPP\Server;

use jvandeweghe\IPP\Printer\PrinterPool;
use jvandeweghe\IPP\Server\Exceptions\InvalidRequestException;

class Server {
    const IPP_CONTENT_TYPE = "application/ipp";
    /**
     * @var PrinterPool
     */
    private $printerPool;

    public function __construct(PrinterPool $printerPool) {
        $this->printerPool = $printerPool;
    }

    public function handleRequest(Request $request){
        if($request->getHeaderByName("Content-Type") != self::IPP_CONTENT_TYPE){
            throw new InvalidRequestException("Content-Type expected to be \"" . self::IPP_CONTENT_TYPE . "\", but got: \"" . $request->getHeaderByName("Content-Type") . "\"");
        }

        $responseOperation = //TODO: Use reflection to find implementers of OperationHandler, and compare operationId type to "getOperationId"
    }

    //TODO: Maybe move this into Request?
    private function routePrinter($url) {
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $explodedURL = explode('/', $url);
        $queue = array_pop($explodedURL);
        $printer = array_pop($explodedURL);
        return $this->printerPool->getPrinter($printer);
    }
}
