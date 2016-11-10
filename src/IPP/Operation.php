<?php

namespace jvandeweghe\IPP;

//TODO: write toBinary methods
class Operation {
    //Delimiter tag: (RFC2910 Section 3.5.1)
    private static $END_OF_ATTRIBUTES_BOUNDARY = 0x03;

    protected $majorVersion;
    protected $minorVersion;
    protected $operationIdOrStatusCode;
    protected $requestId;

    protected $attributeGroups;
    protected $data;

    /**
     * Operation constructor.
     * @param int $majorVersion
     * @param int $minorVersion
     * @param int $operationIdOrStatusCode
     * @param int $requestId
     * @param AttributeGroup[] $attributeGroups
     * @param string $data
     */
    public function __construct($majorVersion, $minorVersion, $operationIdOrStatusCode, $requestId, $attributeGroups, $data) {
        $this->majorVersion = $majorVersion;
        $this->minorVersion = $minorVersion;
        $this->operationIdOrStatusCode = $operationIdOrStatusCode;
        $this->requestId = $requestId;
        $this->attributeGroups = $attributeGroups;
        $this->data = $data;
    }

    /**
     * Parse as per RFC2910 Section 3.1
     * Boundaries and types are defined in 3.4.X
     * @param $body
     * @return Operation
     *
        -----------------------------------------------
        |                  version-number             |   2 bytes  - required
        -----------------------------------------------
        |               operation-id (request)        |
        |                      or                     |   2 bytes  - required
        |               status-code (response)        |
        -----------------------------------------------
        |                   request-id                |   4 bytes  - required
        -----------------------------------------------
        |                 attribute-group             |   n bytes - 0 or more
        -----------------------------------------------
        |              end-of-attributes-tag          |   1 byte   - required
        -----------------------------------------------
        |                     data                    |   q bytes  - optional
        -----------------------------------------------

     */
    public static function buildFromBinary($body) {
        $majorVersion = unpack("C", substr($body, 0, 1))[1];
        $minorVersion = unpack("C", substr($body, 1, 1))[1];
        $operationIdOrStatusCode = unpack("n", substr($body, 2, 2))[1];
        $requestId = unpack("N", substr($body, 4, 4))[1];

        $endOfAttributesTag = strpos($body, chr(self::$END_OF_ATTRIBUTES_BOUNDARY), 8);

        $attributesData = substr($body, 8, $endOfAttributesTag - 8);

        $attributeGroups = AttributeGroup::buildFromBinary($attributesData);

        $data = substr($body, $endOfAttributesTag + 1);

        return new Operation($majorVersion, $minorVersion, $operationIdOrStatusCode, $requestId, $attributeGroups, $data);
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

    /**
     * @return AttributeGroup[]
     */
    public function getAttributeGroups() {
        return $this->attributeGroups;
    }

    /**
     * @return string
     */
    public function getData() {
        return $this->data;
    }


}
