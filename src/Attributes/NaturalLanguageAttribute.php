<?php
namespace jvandeweghe\IPP\Attributes;


class NaturalLanguageAttribute extends GenericStringAttribute {
    public function getType(){
        return Attribute::TYPE_CHARACTER_STRING_NATURAL_LANGUAGE;
    }
}
