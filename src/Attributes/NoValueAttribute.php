<?php
namespace jvandeweghe\IPP\Attributes;


class UnknownAttribute extends DefaultAttribute  {
    public function getType(){
        return Attribute::TYPE_OUT_OF_BAND_UNKNOWN;
    }
}
