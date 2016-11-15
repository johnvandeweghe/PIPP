<?php
namespace jvandeweghe\IPP\Attributes;


class MIMEMediaTypeAttribute extends GenericStringAttribute {
    public function getType(){
        return Attribute::TYPE_CHARACTER_STRING_MIME_MEDIA_TYPE;
    }
}
