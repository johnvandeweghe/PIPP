<?php
namespace IPP\Operation\Request;

use IPP\Operation\PrinterRequest;
use Psr\Http\Message\UriInterface;

//RFC2911 3.2.1.1
class PrintJob extends PrinterRequest
{
    /**
     * @var string|null
     */
    private $requestingUserName;
    /**
     * @var string|null
     */
    private $jobName;
    /**
     * @var bool|null
     */
    private $ippAttributeFidelity;
    /**
     * @var string|null
     */
    private $documentName;
    /**
     * @var string|null
     */
    private $compression;
    /**
     * @var string|null
     */
    private $documentFormat;
    /**
     * @var string|null
     */
    private $documentNaturalLanguage;
    /**
     * @var int|null
     */
    private $jobKOctets;
    /**
     * @var int|null
     */
    private $jobImpressions;
    /**
     * @var int|null
     */
    private $jobMediaSheets;

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
        //TODO: https://tools.ietf.org/html/rfc2911#section-4.2 as described in Group 2
        string $data
    ) {
        parent::__construct($version, $operationId, $requestId, $attributesCharset, $attributesNaturalLanguage,
            $printerUri, $data);
        $this->requestingUserName = $requestingUserName;
        $this->jobName = $jobName;
        $this->ippAttributeFidelity = $ippAttributeFidelity;
        $this->documentName = $documentName;
        $this->compression = $compression;
        $this->documentFormat = $documentFormat;
        $this->documentNaturalLanguage = $documentNaturalLanguage;
        $this->jobKOctets = $jobKOctets;
        $this->jobImpressions = $jobImpressions;
        $this->jobMediaSheets = $jobMediaSheets;
    }

    public function getRequestingUserName(): ?string
    {
        return $this->requestingUserName;
    }

    public function getJobName(): ?string
    {
        return $this->jobName;
    }

    public function getIppAttributeFidelity(): ?bool
    {
        return $this->ippAttributeFidelity;
    }

    public function getDocumentName(): ?string
    {
        return $this->documentName;
    }

    public function getCompression(): ?string
    {
        return $this->compression;
    }

    public function getDocumentFormat(): ?string
    {
        return $this->documentFormat;
    }

    public function getDocumentNaturalLanguage(): ?string
    {
        return $this->documentNaturalLanguage;
    }

    public function getJobKOctets(): ?int
    {
        return $this->jobKOctets;
    }

    public function getJobImpressions(): ?int
    {
        return $this->jobImpressions;
    }

    public function getJobMediaSheets(): ?int
    {
        return $this->jobMediaSheets;
    }
}
