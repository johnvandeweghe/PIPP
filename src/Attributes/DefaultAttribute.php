<?php
namespace jvandeweghe\IPP\Attributes;


class DefaultAttribute extends Attribute  {
    protected function unpackValue($value){
        return null;
    }

    protected function packValue($value){
        return "";
    }
    public function getType(){
        return Attribute::TYPE_OUT_OF_BAND_DEFAULT;
    }
}
