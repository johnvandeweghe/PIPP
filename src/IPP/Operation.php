<?php

namespace jvandeweghe\IPP;

class Operation {
    protected $majorVersion;
    protected $minorVersion;
    protected $operationIdOrStatusCode;
    protected $requestId;

    /**
     * Operation constructor.
     * @param int $majorVersion
     * @param int $minorVersion
     * @param int $operationIdOrStatusCode
     * @param int $requestId
     */
    public function __construct($majorVersion, $minorVersion, $operationIdOrStatusCode, $requestId) {
        $this->majorVersion = $majorVersion;
        $this->minorVersion = $minorVersion;
        $this->operationIdOrStatusCode = $operationIdOrStatusCode;
        $this->requestId = $requestId;
    }

    /**
     * Parse as per RFC2910 Section 3.1
     * Boundaries and types are defined in 3.4.X
     * @param $body
     * @return Operation
     */
    public static function buildFromRequest($body) {
        $majorVersion = unpack("C", substr($body, 0, 1))[1];
        $minorVersion = unpack("C", substr($body, 1, 1))[1];
        $operationIdOrStatusCode = unpack("s", substr($body, 2, 2))[1];
        $requestId = unpack("l", substr($body, 4, 4))[1];

        //TODO: Attribute group, attribute, and then data parsing

        return new Operation($majorVersion, $minorVersion, $operationIdOrStatusCode, $requestId);
    }

    /**
     * @return int
     */
    public function getMajorVersion() {
        return $this->majorVersion;
    }

    /**
     * @return int
     */
    public function getMinorVersion() {
        return $this->minorVersion;
    }

    /**
     * @return int
     */
    public function getRequestId() {
        return $this->requestId;
    }

    /**
     * @return int
     */
    public function getOperationIdOrStatusCode() {
        return $this->operationIdOrStatusCode;
    }


}
