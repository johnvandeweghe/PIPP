<?php
namespace jvandeweghe\IPP\Attributes;


class NoValueAttribute extends DefaultAttribute  {
    public function getType(){
        return Attribute::TYPE_OUT_OF_BAND_NO_VALUE;
    }
}
