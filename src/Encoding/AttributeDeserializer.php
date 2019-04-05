<?php

namespace IPP\Encoding;

use IPP\Attribute;

class AttributeDeserializer
{
    /**
     * @param $data
     * @return Attribute[]
     * -----------------------------------------------
     * |                   value-tag                 |   1 byte
     * -----------------------------------------------
     * |               name-length  (value is u)     |   2 bytes
     * -----------------------------------------------
     * |                     name                    |   u bytes
     * -----------------------------------------------
     * |              value-length  (value is v)     |   2 bytes
     * -----------------------------------------------
     * |                     value                   |   v bytes
     * -----------------------------------------------
     */
    public function buildFromBinaryString(string $data): array
    {
        $attributes = [];

        if (!$data) {
            return $attributes;
        }

        $currentAttribute = 0;
        $bytePos = 0;

        while ($bytePos < strlen($data)) {
            $type = ord(substr($data, $bytePos, 1));

            $nameLength = unpack("n", substr($data, $bytePos + 1, 2))[1];
            $name = substr($data, $bytePos + 3, $nameLength);

            $valueLength = unpack("n", substr($data, $bytePos + 1 + 2 + $nameLength, 2))[1];
            $value = substr($data, $bytePos + 1 + 2 + $nameLength + 2, $valueLength);

            $length = 5 + $nameLength + $valueLength;
            $bytePos += $length;

            if ($name) {
                $attributes[$currentAttribute] = new Attribute($type, $name, []);
                $currentAttribute++;
            }

            $unpackedData = $this->unpackValue($type, $value);
            $previousAttribute = $attributes[$currentAttribute - 1];
            $attributes[$currentAttribute - 1] = new Attribute(
                $previousAttribute->getType(),
                $previousAttribute->getName(),
                array_merge($previousAttribute->getValues(), $unpackedData)
            );
        }

        return $attributes;
    }


    /**
     * @param $type
     * @param $value
     * @return mixed
     */
    private function unpackValue(int $type, $value)
    {
        switch ($type) {
            case Attribute::TYPE_INTEGER_BOOLEAN:
                return ord($value) == 1;
            case Attribute::TYPE_INTEGER_INTEGER:
            case Attribute::TYPE_INTEGER_ENUM:
            case Attribute::TYPE_INTEGER_GENERIC_INTEGER:
                return unpack("N", $value)[1] ?? 0;
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
                return null;
        }
    }
}
