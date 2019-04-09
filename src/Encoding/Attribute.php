<?php

namespace IPP\Encoding;

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
     * @var int
     */
    private $type;
    /**
     * @var $name string
     */
    protected $name;
    /**
     * @var mixed[] $values
     */
    protected $values;

    public function __construct(int $type, string $name, array $values) {
        $this->type = $type;
        $this->name = $name;
        $this->values = $values;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
}
