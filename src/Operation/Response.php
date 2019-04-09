<?php

namespace IPP\Operation;

use IPP\Operation;

class Response extends Operation
{

    public function __construct(
        string $version,
        int $statusCode,
        int $requestId,
        string $attributesCharset,
        string $attributesNaturalLanguage,
        ?string $statusMessage,
        ?string $detailedStatusMessage,
        ?string $documentAccessError,
        ?array $unsupportedAttributed,
        string $data
    )
    {

    }
}
