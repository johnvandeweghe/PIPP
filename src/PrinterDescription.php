<?php
namespace IPP;

use DateTime;
use Psr\Http\Message\UriInterface;

// RFC 2911 4.4
class PrinterDescription
{
    /**
     * @var UriInterface[]
     */
    private $printerUriSupported;
    /**
     * @var string[]
     */
    private $uriSecuritySupported;
    /**
     * @var string[]
     */
    private $uriAuthenticationSupported;
    /**
     * @var string
     */
    private $printerName;
    /**
     * @var string|null
     */
    private $printerLocation;
    /**
     * @var string|null
     */
    private $printerInfo;
    /**
     * @var UriInterface|null
     */
    private $printerMoreInfo;
    /**
     * @var UriInterface|null
     */
    private $printerDriverInstaller;
    /**
     * @var string|null
     */
    private $printerMakeAndModel;
    /**
     * @var UriInterface|null
     */
    private $printerMoreInfoManufacturer;
    /**
     * @var string
     */
    private $printerState;
    /**
     * @var string[]
     */
    private $printerStateReasons;
    /**
     * @var string|null
     */
    private $printerStateMessage;
    /**
     * @var string[]
     */
    private $ippVersionsSupported;
    /**
     * @var string[]
     */
    private $operationsSupported;
    /**
     * @var bool|null
     */
    private $multipleDocumentJobsSupported;
    /**
     * @var string
     */
    private $charsetConfigured;
    /**
     * @var string[]
     */
    private $charsetSupported;
    /**
     * @var string
     */
    private $naturalLanguageConfigured;
    /**
     * @var string[]
     */
    private $generatedNaturalLanguageSupported;
    /**
     * @var string
     */
    private $documentFormatDefault;
    /**
     * @var string[]
     */
    private $documentFormatSupported;
    /**
     * @var bool
     */
    private $printerIsAcceptingJobs;
    /**
     * @var int
     */
    private $queuedJobCount;
    /**
     * @var string|null
     */
    private $printerMessageFromOperator;
    /**
     * @var bool|null
     */
    private $colorSupported;
    /**
     * @var string[]|null
     */
    private $referenceUriSchemesSupported;
    /**
     * @var string
     */
    private $pdlOverrideSupported;
    /**
     * @var int
     */
    private $printerUpTime;
    /**
     * @var DateTime|null
     */
    private $printerCurrentTime;
    /**
     * @var int|null
     */
    private $multipleOperationTimeOut;
    /**
     * @var string[]
     */
    private $compressionSupported;
    /**
     * @var int[]|null
     */
    private $jobKOctetsSupported;
    /**
     * @var int[]|null
     */
    private $jobImpressionsSupported;
    /**
     * @var int[]|null
     */
    private $jobMediaSheetsSupported;
    /**
     * @var int|null
     */
    private $pagesPerMinute;
    /**
     * @var int|null
     */
    private $pagesPerMinuteColor;

    /**
     * PrinterDescription constructor.
     * @param UriInterface[] $printerUriSupported
     * @param string[] $uriSecuritySupported
     * @param string[] $uriAuthenticationSupported
     * @param string $printerName
     * @param string|null $printerLocation
     * @param string|null $printerInfo
     * @param UriInterface|null $printerMoreInfo
     * @param UriInterface|null $printerDriverInstaller
     * @param string|null $printerMakeAndModel
     * @param UriInterface|null $printerMoreInfoManufacturer
     * @param string $printerState
     * @param string[] $printerStateReasons
     * @param string|null $printerStateMessage
     * @param string[] $ippVersionsSupported
     * @param string[] $operationsSupported
     * @param bool|null $multipleDocumentJobsSupported
     * @param string $charsetConfigured
     * @param string[] $charsetSupported
     * @param string $naturalLanguageConfigured
     * @param string[] $generatedNaturalLanguageSupported
     * @param string $documentFormatDefault
     * @param string[] $documentFormatSupported
     * @param bool $printerIsAcceptingJobs
     * @param int $queuedJobCount
     * @param string|null $printerMessageFromOperator
     * @param bool|null $colorSupported
     * @param string[]|null $referenceUriSchemesSupported
     * @param string $pdlOverrideSupported
     * @param int $printerUpTime
     * @param DateTime|null $printerCurrentTime
     * @param int|null $multipleOperationTimeOut
     * @param string[] $compressionSupported
     * @param int[]|null $jobKOctetsSupported
     * @param int[]|null $jobImpressionsSupported
     * @param int[]|null $jobMediaSheetsSupported
     * @param int|null $pagesPerMinute
     * @param int|null $pagesPerMinuteColor
     */
    public function __construct(
        array $printerUriSupported,
        array $uriSecuritySupported,
        array $uriAuthenticationSupported,
        string $printerName,
        ?string $printerLocation,
        ?string $printerInfo,
        ?UriInterface $printerMoreInfo,
        ?UriInterface $printerDriverInstaller,
        ?string $printerMakeAndModel,
        ?UriInterface $printerMoreInfoManufacturer,
        string $printerState,
        array $printerStateReasons,
        ?string $printerStateMessage,
        array $ippVersionsSupported,
        array $operationsSupported,
        ?bool $multipleDocumentJobsSupported,
        string $charsetConfigured,
        array $charsetSupported,
        string $naturalLanguageConfigured,
        array $generatedNaturalLanguageSupported,
        string $documentFormatDefault,
        array $documentFormatSupported,
        bool $printerIsAcceptingJobs,
        int $queuedJobCount,
        ?string $printerMessageFromOperator,
        ?bool $colorSupported,
        ?array $referenceUriSchemesSupported,
        string $pdlOverrideSupported,
        int $printerUpTime,
        ?DateTime $printerCurrentTime,
        ?int $multipleOperationTimeOut,
        array $compressionSupported,
        ?array $jobKOctetsSupported,
        ?array $jobImpressionsSupported,
        ?array $jobMediaSheetsSupported,
        ?int $pagesPerMinute,
        ?int $pagesPerMinuteColor
    )
    {
        $this->printerUriSupported = $printerUriSupported;
        $this->uriSecuritySupported = $uriSecuritySupported;
        $this->uriAuthenticationSupported = $uriAuthenticationSupported;
        $this->printerName = $printerName;
        $this->printerLocation = $printerLocation;
        $this->printerInfo = $printerInfo;
        $this->printerMoreInfo = $printerMoreInfo;
        $this->printerDriverInstaller = $printerDriverInstaller;
        $this->printerMakeAndModel = $printerMakeAndModel;
        $this->printerMoreInfoManufacturer = $printerMoreInfoManufacturer;
        $this->printerState = $printerState;
        $this->printerStateReasons = $printerStateReasons;
        $this->printerStateMessage = $printerStateMessage;
        $this->ippVersionsSupported = $ippVersionsSupported;
        $this->operationsSupported = $operationsSupported;
        $this->multipleDocumentJobsSupported = $multipleDocumentJobsSupported;
        $this->charsetConfigured = $charsetConfigured;
        $this->charsetSupported = $charsetSupported;
        $this->naturalLanguageConfigured = $naturalLanguageConfigured;
        $this->generatedNaturalLanguageSupported = $generatedNaturalLanguageSupported;
        $this->documentFormatDefault = $documentFormatDefault;
        $this->documentFormatSupported = $documentFormatSupported;
        $this->printerIsAcceptingJobs = $printerIsAcceptingJobs;
        $this->queuedJobCount = $queuedJobCount;
        $this->printerMessageFromOperator = $printerMessageFromOperator;
        $this->colorSupported = $colorSupported;
        $this->referenceUriSchemesSupported = $referenceUriSchemesSupported;
        $this->pdlOverrideSupported = $pdlOverrideSupported;
        $this->printerUpTime = $printerUpTime;
        $this->printerCurrentTime = $printerCurrentTime;
        $this->multipleOperationTimeOut = $multipleOperationTimeOut;
        $this->compressionSupported = $compressionSupported;
        $this->jobKOctetsSupported = $jobKOctetsSupported;
        $this->jobImpressionsSupported = $jobImpressionsSupported;
        $this->jobMediaSheetsSupported = $jobMediaSheetsSupported;
        $this->pagesPerMinute = $pagesPerMinute;
        $this->pagesPerMinuteColor = $pagesPerMinuteColor;
    }

    /**
     * @return UriInterface[]
     */
    public function getPrinterUriSupported(): array
    {
        return $this->printerUriSupported;
    }

    /**
     * @return string[]
     */
    public function getUriSecuritySupported(): array
    {
        return $this->uriSecuritySupported;
    }

    /**
     * @return string[]
     */
    public function getUriAuthenticationSupported(): array
    {
        return $this->uriAuthenticationSupported;
    }

    /**
     * @return string
     */
    public function getPrinterName(): string
    {
        return $this->printerName;
    }

    /**
     * @return string|null
     */
    public function getPrinterLocation(): ?string
    {
        return $this->printerLocation;
    }

    /**
     * @return string|null
     */
    public function getPrinterInfo(): ?string
    {
        return $this->printerInfo;
    }

    /**
     * @return UriInterface|null
     */
    public function getPrinterMoreInfo(): ?UriInterface
    {
        return $this->printerMoreInfo;
    }

    /**
     * @return UriInterface|null
     */
    public function getPrinterDriverInstaller(): ?UriInterface
    {
        return $this->printerDriverInstaller;
    }

    /**
     * @return string|null
     */
    public function getPrinterMakeAndModel(): ?string
    {
        return $this->printerMakeAndModel;
    }

    /**
     * @return UriInterface|null
     */
    public function getPrinterMoreInfoManufacturer(): ?UriInterface
    {
        return $this->printerMoreInfoManufacturer;
    }

    /**
     * @return string
     */
    public function getPrinterState(): string
    {
        return $this->printerState;
    }

    /**
     * @return string[]
     */
    public function getPrinterStateReasons(): array
    {
        return $this->printerStateReasons;
    }

    /**
     * @return string|null
     */
    public function getPrinterStateMessage(): ?string
    {
        return $this->printerStateMessage;
    }

    /**
     * @return string[]
     */
    public function getIppVersionsSupported(): array
    {
        return $this->ippVersionsSupported;
    }

    /**
     * @return string[]
     */
    public function getOperationsSupported(): array
    {
        return $this->operationsSupported;
    }

    /**
     * @return bool|null
     */
    public function getMultipleDocumentJobsSupported(): ?bool
    {
        return $this->multipleDocumentJobsSupported;
    }

    /**
     * @return string
     */
    public function getCharsetConfigured(): string
    {
        return $this->charsetConfigured;
    }

    /**
     * @return string[]
     */
    public function getCharsetSupported(): array
    {
        return $this->charsetSupported;
    }

    /**
     * @return string
     */
    public function getNaturalLanguageConfigured(): string
    {
        return $this->naturalLanguageConfigured;
    }

    /**
     * @return string[]
     */
    public function getGeneratedNaturalLanguageSupported(): array
    {
        return $this->generatedNaturalLanguageSupported;
    }

    /**
     * @return string
     */
    public function getDocumentFormatDefault(): string
    {
        return $this->documentFormatDefault;
    }

    /**
     * @return string[]
     */
    public function getDocumentFormatSupported(): array
    {
        return $this->documentFormatSupported;
    }

    /**
     * @return bool
     */
    public function isPrinterIsAcceptingJobs(): bool
    {
        return $this->printerIsAcceptingJobs;
    }

    /**
     * @return int
     */
    public function getQueuedJobCount(): int
    {
        return $this->queuedJobCount;
    }

    /**
     * @return string|null
     */
    public function getPrinterMessageFromOperator(): ?string
    {
        return $this->printerMessageFromOperator;
    }

    /**
     * @return bool|null
     */
    public function getColorSupported(): ?bool
    {
        return $this->colorSupported;
    }

    /**
     * @return string[]|null
     */
    public function getReferenceUriSchemesSupported(): ?array
    {
        return $this->referenceUriSchemesSupported;
    }

    /**
     * @return string
     */
    public function getPdlOverrideSupported(): string
    {
        return $this->pdlOverrideSupported;
    }

    /**
     * @return int
     */
    public function getPrinterUpTime(): int
    {
        return $this->printerUpTime;
    }

    /**
     * @return DateTime|null
     */
    public function getPrinterCurrentTime(): ?DateTime
    {
        return $this->printerCurrentTime;
    }

    /**
     * @return int|null
     */
    public function getMultipleOperationTimeOut(): ?int
    {
        return $this->multipleOperationTimeOut;
    }

    /**
     * @return string[]
     */
    public function getCompressionSupported(): array
    {
        return $this->compressionSupported;
    }

    /**
     * @return int[]|null
     */
    public function getJobKOctetsSupported(): ?array
    {
        return $this->jobKOctetsSupported;
    }

    /**
     * @return int[]|null
     */
    public function getJobImpressionsSupported(): ?array
    {
        return $this->jobImpressionsSupported;
    }

    /**
     * @return int[]|null
     */
    public function getJobMediaSheetsSupported(): ?array
    {
        return $this->jobMediaSheetsSupported;
    }

    /**
     * @return int|null
     */
    public function getPagesPerMinute(): ?int
    {
        return $this->pagesPerMinute;
    }

    /**
     * @return int|null
     */
    public function getPagesPerMinuteColor(): ?int
    {
        return $this->pagesPerMinuteColor;
    }
}
