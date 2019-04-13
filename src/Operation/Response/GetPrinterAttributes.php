<?php
namespace IPP\Operation\Response;

use IPP\Operation\Response;

class GetPrinterAttributes extends Response
{
    public function __construct(
        string $version,
        int $operationIdOrStatusCode,
        int $requestId,
        string $attributesCharset,
        string $attributesNaturalLanguage,
        ?string $statusMessage,
        ?string $detailedStatusMessage,
        ?string $documentAccessError,
        ?array $unsupportedAttributed
    ) {
        parent::__construct($version, $operationIdOrStatusCode, $requestId, $attributesCharset,
            $attributesNaturalLanguage, $statusMessage, $detailedStatusMessage, $documentAccessError,
            $unsupportedAttributed);
    }
}
