<?php
namespace jvandeweghe\IPP\Attributes;


class NameWithoutLanguageAttribute extends GenericStringAttribute {
    public function getType(){
        return Attribute::TYPE_CHARACTER_STRING_NAME_WITHOUT_LANGUAGE;
    }
}
