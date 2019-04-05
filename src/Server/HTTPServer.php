<?php

namespace IPP\Server;

use IPP\Attributes\Exceptions\UnknownAttributeTypeException;
use IPP\Operation;
use IPP\Server\Exceptions\InvalidRequestException;
use IPP\Server\Logger\Logger;

class HTTPServer {
    const IPP_CONTENT_TYPE = "application/ipp";
    protected $server;

    public function __construct(Server $server) {
        $this->server = $server;
    }

    /**
     * @return Request
     */
    public static function buildRequestFromGlobals() {
        $headers = getallheaders();

        $body = file_get_contents("php://input");

        return new Request($headers, $_SERVER["REQUEST_URI"], $body);
    }

    /**
     * @param Request $request
     * @return Response
     * @throws InvalidRequestException
     */
    public function handleRequest(Request $request) {
        if($request->getHeaderByName("Content-Type") != self::IPP_CONTENT_TYPE){
            return new Response(400);
        }

        try {
            $operation = Operation::buildFromBinary($request->getBody());
        } catch(UnknownAttributeTypeException $exception) {
            $this->server->log("Got UnknownAttributeTypeException while parsing body: " . $exception->getMessage(), Logger::LEVEL_ERROR);

            return new Response(500);
        }

        $responseOperation = $this->server->handleRequest($operation);

        return new Response(200, [], $responseOperation);
    }
}
