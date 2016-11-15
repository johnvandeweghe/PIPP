<?php

namespace jvandeweghe\IPP\Attributes;

class IntegerAttribute extends GenericIntegerAttribute  {
    /**
     * @return int
     */
    public function getType(){
        return Attribute::TYPE_INTEGER_INTEGER;
    }
}
