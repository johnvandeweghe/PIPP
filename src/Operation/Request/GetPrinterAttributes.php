<?php
namespace IPP\Operation\Request;

use IPP\Operation\PrinterRequest;

class GetPrinterAttributes extends PrinterRequest
{
    /**
     * @var string|null
     */
    private $requestingUserName;
    /**
     * @var array|string[]|null
     */
    private $requestedAttributes;
    /**
     * @var string|null
     */
    private $documentFormat;

    /**
     * GetPrinterAttributes constructor.
     * @param string $version
     * @param int $operationId
     * @param int $requestId
     * @param string $attributesCharset
     * @param string $attributesNaturalLanguage
     * @param string $printerUri
     * @param string|null $requestingUserName
     * @param string[]|null $requestedAttributes
     * @param string|null $documentFormat
     */
    public function __construct(
        string $version,
        int $operationId,
        int $requestId,
        string $attributesCharset,
        string $attributesNaturalLanguage,
        string $printerUri,
        ?string $requestingUserName,
        ?array $requestedAttributes,
        ?string $documentFormat
    ) {
        parent::__construct($version, $operationId, $requestId, $attributesCharset, $attributesNaturalLanguage,
            $printerUri, null);
        $this->requestingUserName = $requestingUserName;
        $this->requestedAttributes = $requestedAttributes;
        $this->documentFormat = $documentFormat;
    }

    public function getRequestingUserName(): ?string
    {
        return $this->requestingUserName;
    }

    public function getRequestedAttributes()
    {
        return $this->requestedAttributes;
    }

    public function getDocumentFormat(): ?string
    {
        return $this->documentFormat;
    }
}
