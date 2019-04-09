<?php

namespace IPP\Encoding;

class AttributeGroup {
    //Delimiter tag: (RFC2910 Section 3.5.1)
    const OPERATION_ATTRIBUTES_TAG = 0x01;
    const JOB_ATTRIBUTES_TAG = 0x02;
    const PRINTER_ATTRIBUTES_TAG = 0x04;
    const UNSUPPORTED_ATTRIBUTES_TAG = 0x05;
    //0x00, 0x06-0x0f reserved for future delimiters in IETF standards track documents

    /**
     * @var $type int
     */
    protected $type;
    /**
     * @var Attribute[] $attributes
     */
    protected $attributes;

    /**
     * AttributeGroup constructor.
     * @param int $type
     * @param Attribute[] $attributes
     */
    public function __construct(int $type, array $attributes) {
        $this->type = $type;
        $this->attributes = $attributes;
    }

    public function getType(): int {
        return $this->type;
    }

    /**
     * @return Attribute[]
     */
    public function getAttributes(): array {
        return $this->attributes;
    }

    public function getAttributeByName($name): ?Attribute {
        foreach($this->getAttributes() as $attribute) {
            if(strtolower($attribute->getName()) == strtolower($name)) {
                return $attribute;
            }
        }

        return null;
    }

}
