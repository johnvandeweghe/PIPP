<?php

namespace IPP\Encoding;

use IPP\Attribute;

class AttributeSerializer
{

    /**
     * @param Attribute $attribute
     * @return string
     */
    public function toBinary(Attribute $attribute)
    {
        $data = "";
        $first = true;
        foreach ($attribute->getValues() as $value) {
            $data .= chr($attribute->getType());
            if ($first) {
                $data .= pack("n", strlen($attribute->getName()));
                $data .= $attribute->getName();

                $first = false;
            } else {
                $data .= pack("n", 0);
            }

            $value = $this->packValue($attribute->getType(), $value);

            $data .= pack("n", strlen($value));
            $data .= $value;
        }

        return $data;
    }

    private function packValue(int $type, $value): string
    {
        switch ($type) {
            case Attribute::TYPE_INTEGER_BOOLEAN:
                return $value ? chr(0) : chr(1);
            case Attribute::TYPE_INTEGER_INTEGER:
            case Attribute::TYPE_INTEGER_ENUM:
            case Attribute::TYPE_INTEGER_GENERIC_INTEGER:
                return pack("N", $value);
            case Attribute::TYPE_CHARACTER_STRING_CHARSET:
            case Attribute::TYPE_CHARACTER_STRING_KEYWORD:
            case Attribute::TYPE_CHARACTER_STRING_MIME_MEDIA_TYPE:
            case Attribute::TYPE_CHARACTER_STRING_NAME_WITHOUT_LANGUAGE:
            case Attribute::TYPE_CHARACTER_STRING_NATURAL_LANGUAGE:
            case Attribute::TYPE_CHARACTER_STRING_TEXT_WITHOUT_LANGUAGE:
            case Attribute::TYPE_CHARACTER_STRING_URI:
            case Attribute::TYPE_CHARACTER_STRING_URI_SCHEME:
            case Attribute::TYPE_CHARACTER_STRING_GENERIC:
                return $value;
            case Attribute::TYPE_OUT_OF_BAND_DEFAULT:
            case Attribute::TYPE_OUT_OF_BAND_UNKNOWN:
            case Attribute::TYPE_OUT_OF_BAND_NO_VALUE:
            case Attribute::TYPE_OUT_OF_BAND_UNSUPPORTED:
            default:
                return '';
        }
    }
}
