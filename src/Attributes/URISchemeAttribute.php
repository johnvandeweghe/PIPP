<?php
namespace jvandeweghe\IPP\Attributes;


class URISchemeAttribute extends GenericStringAttribute {
    public function getType(){
        return Attribute::TYPE_CHARACTER_STRING_URI_SCHEME;
    }
}
