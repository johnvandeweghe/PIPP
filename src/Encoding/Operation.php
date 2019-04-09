<?php

namespace IPP\Encoding;

class Operation
{
    //Delimiter tag: (RFC2910 Section 3.5.1)
    const END_OF_ATTRIBUTES_BOUNDARY =      0x03;

    //Operation IDs (RFC2911 Section 4.4.15)
    //0x0000              reserved, not used
    //0x0001              reserved, not used
    const OPERATION_PRINT_JOB =             0x0002;
    const OPERATION_PRINT_URI =             0x0003;
    const OPERATION_VALIDATE_JOB =          0x0004;
    const OPERATION_CREATE_JOB =            0x0005;
    const OPERATION_SEND_DOCUMENT =         0x0006;
    const OPERATION_SEND_URI =              0x0007;
    const OPERATION_CANCEL_JOB =            0x0008;
    const OPERATION_GET_JOB_ATTRIBUTES =    0x0009;
    const OPERATION_GET_JOBS =              0x000A;
    const OPERATION_GET_PRINTER_ATTRIBUTES =0x000B;
    const OPERATION_HOLD_JOB =              0x000C;
    const OPERATION_RELEASE_JOB =           0x000D;
    const OPERATION_RESTART_JOB =           0x000E;
    //0x000F              reserved for a future operation
    const OPERATION_PAUSE_PRINTER =         0x0010;
    const OPERATION_RESUME_PRINTER =        0x0011;
    const OPERATION_PURGE_JOBS =            0x0012;
    //0x0013-0x3FFF       reserved for future IETF standards track operations (see section 6.4)
    //0x4000-0x8FFF       reserved for vendor extensions (see section 6.4)

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
    public function __construct(
        int $majorVersion,
        int $minorVersion,
        int $operationIdOrStatusCode,
        int $requestId,
        array $attributeGroups,
        string $data
    ) {
        $this->majorVersion = $majorVersion;
        $this->minorVersion = $minorVersion;
        $this->operationIdOrStatusCode = $operationIdOrStatusCode;
        $this->requestId = $requestId;
        $this->attributeGroups = $attributeGroups;
        $this->data = $data;
    }

    public function getAttributeByName(string $name): ?Attribute {
        foreach($this->getAttributeGroups() as $attributeGroup) {
            if($attribute = $attributeGroup->getAttributeByName($name)) {
                return $attribute;
            }
        }

        return null;
    }

    /**
     * @return int
     */
    public function getMajorVersion(): int
    {
        return $this->majorVersion;
    }

    /**
     * @return int
     */
    public function getMinorVersion(): int
    {
        return $this->minorVersion;
    }

    /**
     * @return int
     */
    public function getOperationIdOrStatusCode(): int
    {
        return $this->operationIdOrStatusCode;
    }

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->requestId;
    }

    /**
     * @return AttributeGroup[]
     */
    public function getAttributeGroups()
    {
        return $this->attributeGroups;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

}
