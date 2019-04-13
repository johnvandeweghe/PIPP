<?php

namespace IPP;

/**
 * Fields every operation regardless of request or response, printer or job, must have as defined in RFC2911
 * @package IPP
 */
abstract class Operation
{

    /**
     * @var string
     */
    private $version;
    /**
     * @var int
     */
    private $operationIdOrStatusCode;
    /**
     * @var int
     */
    private $requestId;
    /**
     * @var string
     */
    private $attributesCharset;
    /**
     * @var string
     */
    private $attributesNaturalLanguage;
    /**
     * @var string|null
     */
    private $data;

    public function __construct(
        string $version,
        int $operationIdOrStatusCode,
        int $requestId,
        string $attributesCharset,
        string $attributesNaturalLanguage,
        ?string $data
    )
    {
        $this->version = $version;
        $this->operationIdOrStatusCode = $operationIdOrStatusCode;
        $this->requestId = $requestId;
        $this->attributesCharset = $attributesCharset;
        $this->attributesNaturalLanguage = $attributesNaturalLanguage;
        $this->data = $data;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getOperationIdOrStatusCode(): int
    {
        return $this->operationIdOrStatusCode;
    }

    public function getRequestId(): int
    {
        return $this->requestId;
    }

    public function getAttributesCharset(): string
    {
        return $this->attributesCharset;
    }

    public function getAttributesNaturalLanguage(): string
    {
        return $this->attributesNaturalLanguage;
    }

    public function getData(): ?string
    {
        return $this->data;
    }
}
