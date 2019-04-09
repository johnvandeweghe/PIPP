<?php

namespace IPP\Encoding;

class OperationDeserializer
{
    /**
     * @var AttributeGroupDeserializer
     */
    private $attributeGroupDeserializer;

    public function __construct(AttributeGroupDeserializer $attributeGroupDeserializer)
    {
        $this->attributeGroupDeserializer = $attributeGroupDeserializer;
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
    public function buildFromBinaryString(string $body): Operation {
        $majorVersion = unpack("C", substr($body, 0, 1))[1];
        $minorVersion = unpack("C", substr($body, 1, 1))[1];
        $operationIdOrStatusCode = unpack("n", substr($body, 2, 2))[1];
        $requestId = unpack("N", substr($body, 4, 4))[1];

        $endOfAttributesTag = strpos($body, chr(Operation::END_OF_ATTRIBUTES_BOUNDARY), 8);

        $attributesData = substr($body, 8, $endOfAttributesTag - 8);

        $attributeGroups = $this->attributeGroupDeserializer->buildFromBinaryString($attributesData);

        $data = substr($body, $endOfAttributesTag + 1);

        return new Operation($majorVersion, $minorVersion, $operationIdOrStatusCode, $requestId, $attributeGroups, $data);
    }


}
