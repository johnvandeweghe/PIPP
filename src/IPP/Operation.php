<?php

namespace jvandeweghe\IPP;

//TODO: Handle improper data better
class Operation {
    //Delimiter tag: (RFC2910 Section 3.5.1)
    private static $END_OF_ATTRIBUTES_BOUNDARY = 0x03;

    //Operation IDs (RFC2911 Section 4.4.15)
    const OPERATION_PRINT_JOB =     0x0001;
    const OPERATION_PRINT_URI =     0x0002;
    const OPERATION_VALIDATE_JOB =  0x0004;
    const OPERATION_CREATE_JOB =    0x0005;
    const OPERATION_SEND_DOCUMENT = 0x0006;
    const OPERATION_SEND_URI =      0x0007;
    const OPERATION_CANCEL_JOB =      0x0007;
    const OPERATION_GET_JOB_ATTRIBUTES =      0x0007;
    const OPERATION_SEND_URI =      0x0007;
    const OPERATION_SEND_URI =      0x0007;
    const OPERATION_SEND_URI =      0x0007;
    /*
      Value               Operation Name
     -----------------   -------------------------------------

     0x0000              reserved, not used
     0x0001              reserved, not used
     0x0002              Print-Job
     0x0003              Print-URI
     0x0004              Validate-Job
     0x0005              Create-Job
     0x0006              Send-Document
     0x0007              Send-URI
     0x0008              Cancel-Job
     0x0009              Get-Job-Attributes
     0x000A              Get-Jobs
     0x000B              Get-Printer-Attributes
     0x000C              Hold-Job
     0x000D              Release-Job
     0x000E              Restart-Job
     0x000F              reserved for a future operation
     0x0010              Pause-Printer
     0x0011              Resume-Printer
     0x0012              Purge-Jobs
     0x0013-0x3FFF       reserved for future IETF standards track
                         operations (see section 6.4)
     0x4000-0x8FFF       reserved for vendor extensions (see section 6.4)
     */

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

    public function toBinary() {
        $data = pack("C", $this->getMajorVersion());
        $data .= pack("C", $this->getMinorVersion());
        $data .= pack("n", $this->getOperationIdOrStatusCode());
        $data .= pack("N", $this->getRequestId());

        foreach($this->getAttributeGroups() as $attributeGroup) {
            $data .= $attributeGroup->toBinary();
        }

        $data .= chr(self::$END_OF_ATTRIBUTES_BOUNDARY);

        $data .= $this->getData();

        return $data;
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


    public function getAttributeByName($name) {
        foreach($this->getAttributeGroups() as $attributeGroup) {
            if($attribute = $attributeGroup->getAttributeByName($name)) {
                return $attribute;
            }
        }

        return null;
    }


}
