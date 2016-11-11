<?php

namespace jvandeweghe\IPP\Server;

use jvandeweghe\IPP\Operation;

class Request {
    protected $headers = [];
    protected $rawBody;

    protected $path;

    /**
     * @var $operation Operation
     */
    protected $operation;

    public function __construct($headers, $body) {
        $this->headers = $headers;
        $this->rawBody = $body;

        //TODO: Handle invalid data
        $this->operation = Operation::buildFromBinary($body);

        $this->path = $this->operation->getAttributeByName("printer-uri");
    }

    /**
     * @return array
     */
    public function getHeaders() {
        return $this->headers;
    }

    public function getHeaderByName($name) {
        foreach($this->headers as $key => $value) {
            if(strtolower($key) == strtolower($name)) {
                return $value;
            }
        }

        return null;
    }

    /**
     * @return string
     */
    public function getRawBody() {
        return $this->rawBody;
    }

    /**
     * @return Operation
     */
    public function getOperation() {
        return $this->operation;
    }


}
