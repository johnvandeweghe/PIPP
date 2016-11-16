<?php

namespace jvandeweghe\IPP\Attributes;

use jvandeweghe\IPP\Attributes\Exceptions\UnknownAttributeTypeException;

abstract class Attribute {
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
     * @var $name string
     */
    protected $name;
    /**
     * @var $values mixed[]
     */
    protected $values;

    /**
     * Attribute constructor.
     * @param string $name
     * @param [] $values
     */
    public function __construct($name, array $values) {
        $this->name = $name;
        foreach($values as $value) {
            $this->validateValue($value);
            $this->values[] = $value;
        }
    }

    protected function validateValue($value) {
        return;
        throw new \Exception(); //TODO: Write special exception for this
        //TODO: Make abstract, and use to validate length limits, ranges, etc
    }

    /**
     * @param $type
     * @param $name
     * @param $values
     * @return Attribute
     * @throws UnknownAttributeTypeException
     */
    //TODO: Write validation into each attribute constructor
    public static function factory($type, $name, $values) {
        switch($type) {
            case self::TYPE_OUT_OF_BAND_DEFAULT:
                return new DefaultAttribute($name);
            case self::TYPE_OUT_OF_BAND_NO_VALUE:
                return new NoValueAttribute($name);
            case self::TYPE_OUT_OF_BAND_UNKNOWN:
                return new UnknownAttribute($name);
            case self::TYPE_OUT_OF_BAND_UNSUPPORTED:
                return new UnsupportedAttribute($name);
            case self::TYPE_INTEGER_GENERIC_INTEGER:
                return new GenericIntegerAttribute($name, $values);
            case self::TYPE_INTEGER_INTEGER:
                return new IntegerAttribute($name, $values);
            case self::TYPE_INTEGER_ENUM:
                return new EnumAttribute($name, $values);
            case self::TYPE_INTEGER_BOOLEAN:
                return new BooleanAttribute($name, $values);
            case self::TYPE_CHARACTER_STRING_GENERIC:
                return new GenericStringAttribute($name, $values);
            case self::TYPE_CHARACTER_STRING_TEXT_WITHOUT_LANGUAGE:
                return new TextWithoutLanguageAttribute($name, $values);
            case self::TYPE_CHARACTER_STRING_NAME_WITHOUT_LANGUAGE:
                return new NameWithoutLanguageAttribute($name, $values);
            case self::TYPE_CHARACTER_STRING_KEYWORD:
                return new KeywordAttribute($name, $values);
            case self::TYPE_CHARACTER_STRING_URI:
                return new URIAttribute($name, $values);
            case self::TYPE_CHARACTER_STRING_URI_SCHEME:
                return new URISchemeAttribute($name, $values);
            case self::TYPE_CHARACTER_STRING_CHARSET:
                return new CharsetAttribute($name, $values);
            case self::TYPE_CHARACTER_STRING_NATURAL_LANGUAGE:
                return new NaturalLanguageAttribute($name, $values);
            case self::TYPE_CHARACTER_STRING_MIME_MEDIA_TYPE:
                return new MIMEMediaTypeAttribute($name, $values);

            case self::TYPE_CHARACTER_STRING_RESERVED:
            default:
                return new GenericStringAttribute($name, $values);
                //TODO: below
                throw new UnknownAttributeTypeException($type . " is unknown");

            //TODO: handle octet string types (binary)
        }
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
        /**
         * @var $attributes Attribute[]
         */
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
                $attributes[$currentAttribute] = self::factory($type, $name, []);
                $currentAttribute++;
            }
            $attributes[$currentAttribute - 1]->addRawValue($value);
        }

        return $attributes;
    }

    /**
     * @param $value
     * @return mixed
     * RFC2910 Section 3.9
     */
    protected abstract function unpackValue($value);

    /**
     * @param $value
     * @return string
     * RFC2910 Section 3.9
     */
    protected abstract function packValue($value);

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

            $value = $this->packValue($value);

            $data .= pack("n", strlen($value));
            $data .= $value;
        }

        return $data;
    }

    public function addRawValue($rawValue) {
        $value = $this->unpackValue($rawValue);
        $this->validateValue($value);
        $this->values[] = $value;
    }

    /**
     * @return int
     */
    public abstract function getType();

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed[]
     */
    public function getValues() {
        return $this->values;
    }

}
