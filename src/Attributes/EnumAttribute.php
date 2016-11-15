<?php

namespace jvandeweghe\IPP\Attributes;

class EnumAttribute extends GenericIntegerAttribute  {
    /**
     * @return int
     */
    public function getType(){
        return Attribute::TYPE_INTEGER_ENUM;
    }
}
