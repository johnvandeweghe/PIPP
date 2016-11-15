<?php
namespace jvandeweghe\IPP\Attributes;


class UnsupportedAttribute extends DefaultAttribute  {
    public function getType(){
        return Attribute::TYPE_OUT_OF_BAND_UNSUPPORTED;
    }
}
