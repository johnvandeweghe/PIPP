<?php

namespace jvandeweghe\IPP;

//TODO: Make this an interface instead of having a type
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

    public static function buildFromBinary($data) {
        $attributeGroups = [];
        $splitAttributeGroups = self::splitAttributeGroupData($data);

        foreach($splitAttributeGroups as $attributeGroupData) {
            $type = ord(substr($attributeGroupData, 0, 1));
            $attributeData = substr($attributeGroupData, 1);
            $attributes = Attribute::buildFromBinary($attributeData);

            $attributeGroups[] = new AttributeGroup($type, $attributes);
        }

        return $attributeGroups;
    }

    protected function splitAttributeGroupData($data) {
        $attributeGroupData = [];

        if(!$data) {
            return $attributeGroupData;
        }

        $currentAttributeGroup = -1;
        $bytePos = 0;

        while(($byte = substr($data, $bytePos, 1)) !== false) {
            switch(ord($byte)) {
                case self::OPERATION_ATTRIBUTES_TAG:
                case self::JOB_ATTRIBUTES_TAG:
                case self::PRINTER_ATTRIBUTES_TAG:
                    $currentAttributeGroup++;
                    break;
            }
            if($currentAttributeGroup == -1) {
                //Invalid data?
            }

            if(!isset($attributeGroupData[$currentAttributeGroup])) {
                $attributeGroupData[$currentAttributeGroup] = $byte;
            } else {
                $attributeGroupData[$currentAttributeGroup] .= $byte;
            }
            $bytePos++;
        }

        return $attributeGroupData;

    }

    public function toBinary() {
        $data = chr($this->getType());
        foreach($this->getAttributes() as $attribute) {
            $data .= $attribute->toBinary();
        }

        return $data;
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
