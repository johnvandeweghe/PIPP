<?php
namespace jvandeweghe\IPP\Attributes;


class CharsetAttribute extends GenericStringAttribute {
    public function getType(){
        return Attribute::TYPE_CHARACTER_STRING_CHARSET;
    }
}
