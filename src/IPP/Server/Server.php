<?php

namespace jvandeweghe\IPP\Server;

use jvandeweghe\IPP\Server\Exceptions\InvalidRequestException;

class Server {
    const IPP_CONTENT_TYPE = "application/ipp";

    public function __construct() {
    }

    public function handleRequest(Request $request){
        if($request->getHeaderByName("Content-Type") != self::IPP_CONTENT_TYPE){
            throw new InvalidRequestException("Content-Type expected to be \"" . self::IPP_CONTENT_TYPE . "\", but got: \"" . $request->getHeaderByName("Content-Type") . "\"");
        }


    }
}
