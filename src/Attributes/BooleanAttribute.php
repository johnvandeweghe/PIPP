<?php

namespace jvandeweghe\IPP\Attributes;

class BooleanAttribute extends Attribute {

    /**
     * @param $value
     * @return mixed
     * RFC2910 Section 3.9
     */
    protected function unpackValue($value) {
        return ord($value) == 1;
    }

    /**
     * @param $value
     * @return string
     * RFC2910 Section 3.9
     */
    protected function packValue($value) {
        return $value ? chr(0) : chr(1);
    }

    /**
     * @return int
     */
    public function getType(){
        return Attribute::TYPE_INTEGER_BOOLEAN;
    }
}
