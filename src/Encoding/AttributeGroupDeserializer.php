<?php

namespace IPP\Encoding;

use IPP\AttributeGroup;

class AttributeGroupDeserializer
{
    //Delimiter tag: (RFC2910 Section 3.5.1)
    const OPERATION_ATTRIBUTES_TAG = 0x01;
    const JOB_ATTRIBUTES_TAG = 0x02;
    const PRINTER_ATTRIBUTES_TAG = 0x04;
    /**
     * @var AttributeDeserializer
     */
    private $attributeDeserializer;

    public function __construct(AttributeDeserializer $attributeDeserializer)
    {
        $this->attributeDeserializer = $attributeDeserializer;
    }

    /**
     * @param string $data
     * @return AttributeGroup[]
     */
    public function buildFromBinaryString(string $data): array
    {
        $attributeGroups = [];
        $splitAttributeGroups = $this->splitAttributeGroupData($data);

        foreach ($splitAttributeGroups as $attributeGroupData) {
            $type = ord(substr($attributeGroupData, 0, 1));
            $attributeData = substr($attributeGroupData, 1);
            $attributes = $this->attributeDeserializer->buildFromBinaryString($attributeData);

            $attributeGroups[] = new AttributeGroup($type, $attributes);
        }

        return $attributeGroups;
    }

    protected function splitAttributeGroupData($data)
    {
        $attributeGroupData = [];

        if (!$data) {
            return $attributeGroupData;
        }

        $currentAttributeGroup = -1;
        $bytePos = 0;

        while (($byte = substr($data, $bytePos, 1)) !== false) {
            switch (ord($byte)) {
                case self::OPERATION_ATTRIBUTES_TAG:
                case self::JOB_ATTRIBUTES_TAG:
                case self::PRINTER_ATTRIBUTES_TAG:
                    $currentAttributeGroup++;
                    break;
            }
            if ($currentAttributeGroup == -1) {
                //Invalid data?
            }

            if (!isset($attributeGroupData[$currentAttributeGroup])) {
                $attributeGroupData[$currentAttributeGroup] = $byte;
            } else {
                $attributeGroupData[$currentAttributeGroup] .= $byte;
            }
            $bytePos++;
        }

        return $attributeGroupData;

    }
}
