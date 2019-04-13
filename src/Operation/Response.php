<?php

namespace IPP\Operation;

use IPP\Operation;

class Response extends Operation
{

    /**
     * @var string|null
     */
    private $statusMessage;
    /**
     * @var string|null
     */
    private $detailedStatusMessage;
    /**
     * @var string|null
     */
    private $documentAccessError;
    /**
     * @var array|null
     */
    private $unsupportedAttributed;

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
            $attributesNaturalLanguage, null);
        $this->statusMessage = $statusMessage;
        $this->detailedStatusMessage = $detailedStatusMessage;
        $this->documentAccessError = $documentAccessError;
        $this->unsupportedAttributed = $unsupportedAttributed;
    }

    public function getStatusMessage(): ?string
    {
        return $this->statusMessage;
    }

    public function getDetailedStatusMessage(): ?string
    {
        return $this->detailedStatusMessage;
    }

    public function getDocumentAccessError(): ?string
    {
        return $this->documentAccessError;
    }

    public function getUnsupportedAttributed(): ?array
    {
        return $this->unsupportedAttributed;
    }
}
