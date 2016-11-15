<?php

namespace jvandeweghe\IPP\Attributes;

class TextWithoutLanguageAttribute extends GenericStringAttribute  {
    /**
     * @return int
     */
    public function getType(){
        return Attribute::TYPE_CHARACTER_STRING_TEXT_WITHOUT_LANGUAGE;
    }
}
