<?php
namespace jvandeweghe\IPP\Attributes;


class URIAttribute extends GenericStringAttribute {
    public function getType(){
        return Attribute::TYPE_CHARACTER_STRING_URI;
    }
}
