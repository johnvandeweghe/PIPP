<?php

namespace IPP\Encoding;

class OperationSerializer
{
    /**
     * @var AttributeGroupSerializer
     */
    private $attributeGroupSerializer;

    public function __construct(AttributeGroupSerializer $attributeGroupSerializer)
    {
        $this->attributeGroupSerializer = $attributeGroupSerializer;
    }

    /**
     * Parse as per RFC2910 Section 3.1
     * Boundaries and types are defined in 3.4.X
     * @param Operation $operation
     * @return string
     *
     * -----------------------------------------------
     * |                  version-number             |   2 bytes  - required
     * -----------------------------------------------
     * |               operation-id (request)        |
     * |                      or                     |   2 bytes  - required
     * |               status-code (response)        |
     * -----------------------------------------------
     * |                   request-id                |   4 bytes  - required
     * -----------------------------------------------
     * |                 attribute-group             |   n bytes - 0 or more
     * -----------------------------------------------
     * |              end-of-attributes-tag          |   1 byte   - required
     * -----------------------------------------------
     * |                     data                    |   q bytes  - optional
     * -----------------------------------------------
     */

    public function toBinary(Operation $operation): string {
        $data = pack("C", $operation->getMajorVersion());
        $data .= pack("C", $operation->getMinorVersion());
        $data .= pack("n", $operation->getOperationIdOrStatusCode());
        $data .= pack("N", $operation->getRequestId());

        foreach($operation->getAttributeGroups() as $attributeGroup) {
            $data .= $this->attributeGroupSerializer->toBinary($attributeGroup);
        }

        $data .= chr(Operation::END_OF_ATTRIBUTES_BOUNDARY);

        $data .= $operation->getData();

        return $data;
    }

}
