<?php

namespace jvandeweghe\IPP\Server;

use jvandeweghe\IPP\Operation;

class Response {
    protected $headers = [];
    protected $statusCode;
    /**
     * @var Operation $operation
     */
    protected $operation;

    public function __construct($statusCode, $headers = [], Operation $operation = null){
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->operation = $operation;
    }

    public function dump() {
        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }

        http_response_code($this->statusCode);

        if ($this->operation) {
            echo $this->operation->toBinary();
        }
    }
}
