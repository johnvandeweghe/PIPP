<?php

namespace IPP;

class AttributeGroup {
    //Delimiter tag: (RFC2910 Section 3.5.1)
    const OPERATION_ATTRIBUTES_TAG = 0x01;
    const JOB_ATTRIBUTES_TAG = 0x02;
    const PRINTER_ATTRIBUTES_TAG = 0x04;

    /**
     * @var $type int
     */
    protected $type;
    /**
     * @var $attributes Attribute[]
     */
    protected $attributes;

    /**
     * AttributeGroup constructor.
     * @param string $type
     * @param $attributes
     */
    public function __construct($type, $attributes) {
        $this->type = $type;
        $this->attributes = $attributes;
    }

    /**
     * @return int
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @return Attribute[]
     */
    public function getAttributes() {
        return $this->attributes;
    }

    public function getAttributeByName($name) {
        foreach($this->getAttributes() as $attribute) {
            if(strtolower($attribute->getName()) == strtolower($name)) {
                return $attribute;
            }
        }

        return null;
    }

}
