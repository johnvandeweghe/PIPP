<?php
namespace IPP\Operation\Request;

use Psr\Http\Message\UriInterface;

class PrintUri extends PrintJob
{
    /**
     * @var UriInterface
     */
    private $dataUri;

    public function __construct(
        string $version,
        int $operationId,
        int $requestId,
        string $attributesCharset,
        string $attributesNaturalLanguage,
        UriInterface $printerUri,
        ?string $requestingUserName,
        ?string $jobName,
        ?bool $ippAttributeFidelity,
        ?string $documentName,
        ?string $compression,
        ?string $documentFormat,
        ?string $documentNaturalLanguage,
        ?int $jobKOctets,
        ?int $jobImpressions,
        ?int $jobMediaSheets,
        UriInterface $dataUri
    ) {
        parent::__construct($version, $operationId, $requestId, $attributesCharset, $attributesNaturalLanguage,
            $printerUri, $requestingUserName, $jobName, $ippAttributeFidelity, $documentName, $compression,
            $documentFormat, $documentNaturalLanguage, $jobKOctets, $jobImpressions, $jobMediaSheets, null);
        $this->dataUri = $dataUri;
    }

    public function getDataUri(): UriInterface
    {
        return $this->dataUri;
    }
}
