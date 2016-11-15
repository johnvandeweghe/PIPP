<?php
namespace jvandeweghe\IPP\Attributes;


class KeywordAttribute extends GenericStringAttribute {
    public function getType(){
        return Attribute::TYPE_CHARACTER_STRING_KEYWORD;
    }
}
