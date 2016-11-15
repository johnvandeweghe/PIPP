<?php

namespace jvandeweghe\IPP\Attributes;

class GenericIntegerAttribute extends Attribute {

    /**
     * @param $value
     * @return mixed
     * RFC2910 Section 3.9
     */
    protected function unpackValue($value) {
        return unpack("N", $value)[1];
    }

    /**
     * @param $value
     * @return string
     * RFC2910 Section 3.9
     */
    protected function packValue($value) {
        return pack("N", $value);
    }

    /**
     * @return int
     */
    public function getType(){
        return Attribute::TYPE_INTEGER_GENERIC_INTEGER;
    }
}
