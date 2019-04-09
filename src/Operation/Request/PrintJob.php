<?php
namespace IPP\Operation\Request;

use IPP\Operation\PrinterRequest;

//RFC2911 3.2.1.1
class PrintJob extends PrinterRequest
{
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
        //TODO: https://tools.ietf.org/html/rfc2911#section-4.2 as described in Group 2
        string $data
    ) {
        parent::__construct($version, $operationId, $requestId, $attributesCharset, $attributesNaturalLanguage,
            $printerUri, $data);
    }
}
