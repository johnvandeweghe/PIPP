<?php

namespace jvandeweghe\IPP;

//TODO: Make this an interface instead of having a type
class Attribute {
    //Value tag types (RFC 2190 Section 3.5.1)
    const TYPE_OUT_OF_BAND_UNSUPPORTED = 0x10;
    const TYPE_OUT_OF_BAND_DEFAULT = 0x11;
    const TYPE_OUT_OF_BAND_UNKNOWN = 0x12;
    const TYPE_OUT_OF_BAND_NO_VALUE = 0x13;
    //0x14-0x1F reserved for future "out-of-band" types

    const TYPE_INTEGER_GENERIC_INTEGER = 0x20;
    const TYPE_INTEGER_INTEGER = 0x21;
    const TYPE_INTEGER_BOOLEAN = 0x22;
    const TYPE_INTEGER_ENUM = 0x23;
    //0x24-0x2F reserved for future integer types

    const TYPE_OCTET_STRING_UNSPECIFIED = 0x30;
    const TYPE_OCTET_STRING_DATETIME = 0x31;
    const TYPE_OCTET_STRING_RESOLUTION = 0x32;
    const TYPE_OCTET_STRING_RANGE_OF_INTEGER = 0x33;
    const TYPE_OCTET_STRING_RESERVED = 0x34;
    const TYPE_OCTET_STRING_TEXT_WITH_LANGUAGE = 0x35;
    const TYPE_OCTET_STRING_NAME_WITH_LANGUAGE = 0x36;
    //0x37-0x3F reserved for future octet string types

    const TYPE_CHARACTER_STRING_GENERIC = 0x40;
    const TYPE_CHARACTER_STRING_TEXT_WITHOUT_LANGUAGE = 0x41;
    const TYPE_CHARACTER_STRING_NAME_WITHOUT_LANGUAGE = 0x42;
    const TYPE_CHARACTER_STRING_RESERVED = 0x43;
    const TYPE_CHARACTER_STRING_KEYWORD = 0x44;
    const TYPE_CHARACTER_STRING_URI = 0x45;
    const TYPE_CHARACTER_STRING_URI_SCHEME = 0x46;
    const TYPE_CHARACTER_STRING_CHARSET = 0x47;
    const TYPE_CHARACTER_STRING_NATURAL_LANGUAGE = 0x48;
    const TYPE_CHARACTER_STRING_MIME_MEDIA_TYPE = 0x49;
    //0x4A-0x5F reserved for future character string types

    /**
     * @var $type int
     */
    protected $type;
    /**
     * @var $name string
     */
    protected $name;
    /**
     * @var $values []
     */
    protected $values;

    /**
     * Attribute constructor.
     * @param int $type
     * @param string $name
     * @param [] $values
     */
    public function __construct($type, $name, array $values) {
        $this->type = $type;
        $this->name = $name;
        $this->values = $values;
    }


    /**
     * @param $data
     * @return array
     *

    /**
     * @param $data
     * @return array
    -----------------------------------------------
    |                   value-tag                 |   1 byte
    -----------------------------------------------
    |               name-length  (value is u)     |   2 bytes
    -----------------------------------------------
    |                     name                    |   u bytes
    -----------------------------------------------
    |              value-length  (value is v)     |   2 bytes
    -----------------------------------------------
    |                     value                   |   v bytes
    -----------------------------------------------
     */
    public static function buildFromBinary($data) {
        $attributes = [];

        if(!$data) {
            return $attributes;
        }

        $currentAttribute = 0;
        $bytePos = 0;

        while($bytePos < strlen($data)) {
            $type = ord(substr($data, $bytePos, 1));

            $nameLength = unpack("n", substr($data, $bytePos + 1, 2))[1];
            $name = substr($data, $bytePos + 3, $nameLength);

            $valueLength = unpack("n", substr($data, $bytePos + 1 + 2 + $nameLength, 2))[1];
            $value = substr($data, $bytePos + 1 + 2 + $nameLength + 2, $valueLength);

            $length = 5 + $nameLength + $valueLength;
            $bytePos += $length;

            if($name) {
                $attributes[$currentAttribute] = new Attribute($type, $name, [self::unpackValue($type, $value)]);
                $currentAttribute++;
            } else {
                $attributes[$currentAttribute - 1]->addValue($value);
            }
        }

        return $attributes;
    }

    /**
     * @param $type
     * @param $value
     * @return mixed
     * RFC2910 Section 3.9
     */
    protected static function unpackValue($type, $value) {
        switch($type) {
            case self::TYPE_OUT_OF_BAND_DEFAULT:
            case self::TYPE_OUT_OF_BAND_NO_VALUE:
            case self::TYPE_OUT_OF_BAND_UNKNOWN:
            case self::TYPE_OUT_OF_BAND_UNSUPPORTED:
                return null;
            case self::TYPE_INTEGER_GENERIC_INTEGER:
            case self::TYPE_INTEGER_INTEGER:
            case self::TYPE_INTEGER_ENUM:
                return unpack("N", $value)[1];
            case self::TYPE_INTEGER_BOOLEAN:
                return ord($value) == 1;
            case self::TYPE_CHARACTER_STRING_GENERIC:
            case self::TYPE_CHARACTER_STRING_TEXT_WITHOUT_LANGUAGE:
            case self::TYPE_CHARACTER_STRING_NAME_WITHOUT_LANGUAGE:
            case self::TYPE_CHARACTER_STRING_RESERVED:
            case self::TYPE_CHARACTER_STRING_KEYWORD:
            case self::TYPE_CHARACTER_STRING_URI:
            case self::TYPE_CHARACTER_STRING_URI_SCHEME:
            case self::TYPE_CHARACTER_STRING_CHARSET:
            case self::TYPE_CHARACTER_STRING_NATURAL_LANGUAGE:
            case self::TYPE_CHARACTER_STRING_MIME_MEDIA_TYPE:
            default:
                return $value;
            //TODO: handle octet string types (binary)
        }
    }

    /**
     * @param $type
     * @param $value
     * @return string
     * RFC2910 Section 3.9
     */
    protected static function packValue($type, $value) {
        switch($type) {
            case self::TYPE_OUT_OF_BAND_DEFAULT:
            case self::TYPE_OUT_OF_BAND_NO_VALUE:
            case self::TYPE_OUT_OF_BAND_UNKNOWN:
            case self::TYPE_OUT_OF_BAND_UNSUPPORTED:
                return "";
            case self::TYPE_INTEGER_GENERIC_INTEGER:
            case self::TYPE_INTEGER_INTEGER:
            case self::TYPE_INTEGER_ENUM:
                return pack("N", $value);
            case self::TYPE_INTEGER_BOOLEAN:
                return $value ? chr(0) : chr(1);
            case self::TYPE_CHARACTER_STRING_GENERIC:
            case self::TYPE_CHARACTER_STRING_TEXT_WITHOUT_LANGUAGE:
            case self::TYPE_CHARACTER_STRING_NAME_WITHOUT_LANGUAGE:
            case self::TYPE_CHARACTER_STRING_RESERVED:
            case self::TYPE_CHARACTER_STRING_KEYWORD:
            case self::TYPE_CHARACTER_STRING_URI:
            case self::TYPE_CHARACTER_STRING_URI_SCHEME:
            case self::TYPE_CHARACTER_STRING_CHARSET:
            case self::TYPE_CHARACTER_STRING_NATURAL_LANGUAGE:
            case self::TYPE_CHARACTER_STRING_MIME_MEDIA_TYPE:
            default:
                return $value;
            //TODO: handle octet string types (binary)
        }
    }

    public function toBinary() {
        $data = "";
        $first = true;
        foreach($this->getValues() as $value) {
            $data .= chr($this->getType());
            if($first) {
                $data .= pack("n", strlen($this->getName()));
                $data .= $this->getName();

                $first = false;
            } else {
                $data .= pack("n", 0);
            }

            $value = self::packValue($this->getType(), $value);

            $data .= pack("n", strlen($value));
            $data .= $value;
        }

        return $data;
    }

    public function addValue($value) {
        $this->values[] = $value;
    }

    /**
     * @return int
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return []
     */
    public function getValues() {
        return $this->values;
    }

}
