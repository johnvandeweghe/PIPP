<?php
namespace IPP\Operation\Response;

use IPP\JobDescription;
use IPP\Operation\Response;

class PrintJob extends Response
{
    /**
     * @var JobDescription
     */
    private $job;

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
        JobDescription $job
    ) {
        parent::__construct($version, $statusCode, $requestId, $attributesCharset, $attributesNaturalLanguage,
            $statusMessage, $detailedStatusMessage, $documentAccessError, $unsupportedAttributed);
        $this->job = $job;
    }

    public function getJob(): JobDescription
    {
        return $this->job;
    }
}
