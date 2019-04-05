<?php

namespace IPP\Server;

class Request {
    protected $headers = [];
    protected $path;
    protected $body;

    public function __construct($headers, $path, $body) {
        $this->headers = $headers;
        $this->path = $path;
        $this->body = $body;
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
    public function getBody() {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getPath() {
        return $this->path;
    }

}
