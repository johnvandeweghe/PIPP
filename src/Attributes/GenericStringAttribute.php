<?php

namespace jvandeweghe\IPP\Attributes;

class GenericStringAttribute extends Attribute {

    /**
     * @param $value
     * @return mixed
     * RFC2910 Section 3.9
     */
    protected function unpackValue($value) {
        return $value;
    }

    /**
     * @param $value
     * @return string
     * RFC2910 Section 3.9
     */
    protected function packValue($value) {
        return $value;
    }

    /**
     * @return int
     */
    public function getType(){
        return Attribute::TYPE_CHARACTER_STRING_GENERIC;
    }
}
