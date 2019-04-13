<?php
namespace IPP\Operation\Request;

class PrintUri extends PrintJob
{
    /**
     * @var string
     */
    private $dataUri;

    public function __construct(
        string $version,
        int $operationId,
        int $requestId,
        string $attributesCharset,
        string $attributesNaturalLanguage,
        string $printerUri,
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
        string $dataUri
    ) {
        parent::__construct($version, $operationId, $requestId, $attributesCharset, $attributesNaturalLanguage,
            $printerUri, $requestingUserName, $jobName, $ippAttributeFidelity, $documentName, $compression,
            $documentFormat, $documentNaturalLanguage, $jobKOctets, $jobImpressions, $jobMediaSheets, null);
        $this->dataUri = $dataUri;
    }

    /**
     * @return string
     */
    public function getDataUri(): string
    {
        return $this->dataUri;
    }
}
