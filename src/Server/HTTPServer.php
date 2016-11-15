<?php

namespace jvandeweghe\IPP\Server;

use jvandeweghe\IPP\Operation;
use jvandeweghe\IPP\Server\Exceptions\InvalidRequestException;

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

        $operation = Operation::buildFromBinary($request->getBody());

        $responseOperation = $this->server->handleRequest($operation);

        return new Response(200, [], $responseOperation);
    }
}
