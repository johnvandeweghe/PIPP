<?php
namespace IPP;

class PrinterJobTemplate
{
    /**
     * @var int|null
     */
    private $jobPriorityDefault;
    /**
     * @var int|null
     */
    private $jobPrioritySupported;
    /**
     * @var string|null
     */
    private $jobHoldUntilDefault;
    /**
     * @var string[]|null
     */
    private $jobHoldUntilSupported;
    /**
     * @var string|null
     */
    private $jobSheetsDefault;
    /**
     * @var string[]|null
     */
    private $jobSheetsSupported;
    /**
     * @var string|null
     */
    private $multipleDocumentHandlingDefault;
    /**
     * @var string[]|null
     */
    private $multipleDocumentHandlingSupported;
    /**
     * @var int|null
     */
    private $copiesDefault;
    /**
     * @var int[]|null
     */
    private $copiesSupported;
    /**
     * @var string[]|null
     */
    private $finishingsDefault;
    /**
     * @var string[]|null
     */
    private $finishingsSupported;
    /**
     * @var bool|null
     */
    private $pageRangesSupported;
    /**
     * @var string|null
     */
    private $sidesDefault;
    /**
     * @var string[]|null
     */
    private $sidesSupported;
    /**
     * @var int|null
     */
    private $numberUpDefault;
    /**
     * @var string|null
     */
    private $orientationRequestedDefault;
    /**
     * @var string[]|null
     */
    private $orientationRequestedSupported;
    /**
     * @var string[]|null
     */
    private $numberUpSupported;
    /**
     * @var string|null
     */
    private $mediaDefault;
    /**
     * @var string[]|null
     */
    private $mediaSupported;
    /**
     * @var string[]|null
     */
    private $mediaReady;
    /**
     * @var string|null
     */
    private $printerResolutionDefault;
    /**
     * @var string[]|null
     */
    private $printerResolutionSupported;
    /**
     * @var string|null
     */
    private $printQualityDefault;
    /**
     * @var string[]|null
     */
    private $printQualitySupported;

    /**
     * PrinterJobTemplate constructor.
     * @param int|null $jobPriorityDefault
     * @param int|null $jobPrioritySupported
     * @param string|null $jobHoldUntilDefault
     * @param string[]|null $jobHoldUntilSupported
     * @param string|null $jobSheetsDefault
     * @param string[]|null $jobSheetsSupported
     * @param string|null $multipleDocumentHandlingDefault
     * @param string[]|null $multipleDocumentHandlingSupported
     * @param int|null $copiesDefault
     * @param int[]|null $copiesSupported
     * @param string[]|null $finishingsDefault
     * @param string[]|null $finishingsSupported
     * @param bool|null $pageRangesSupported
     * @param string|null $sidesDefault
     * @param string[]|null $sidesSupported
     * @param int|null $numberUpDefault
     * @param string|null $orientationRequestedDefault
     * @param string[]|null $orientationRequestedSupported
     * @param string[]|null $numberUpSupported
     * @param string|null $mediaDefault
     * @param string[]|null $mediaSupported
     * @param string[]|null $mediaReady
     * @param string|null $printerResolutionDefault
     * @param string[]|null $printerResolutionSupported
     * @param string|null $printQualityDefault
     * @param string[]|null $printQualitySupported
     */
    public function __construct(
        ?int $jobPriorityDefault,
        ?int $jobPrioritySupported,
        ?string $jobHoldUntilDefault,
        ?array $jobHoldUntilSupported,
        ?string $jobSheetsDefault,
        ?array $jobSheetsSupported,
        ?string $multipleDocumentHandlingDefault,
        ?array $multipleDocumentHandlingSupported,
        ?int $copiesDefault,
        ?array $copiesSupported,
        ?array $finishingsDefault,
        ?array $finishingsSupported,
        ?bool $pageRangesSupported,
        ?string $sidesDefault,
        ?array $sidesSupported,
        ?int $numberUpDefault,
        ?string $orientationRequestedDefault,
        ?array $orientationRequestedSupported,
        ?array $numberUpSupported,
        ?string $mediaDefault,
        ?array $mediaSupported,
        ?array $mediaReady,
        ?string $printerResolutionDefault,
        ?array $printerResolutionSupported,
        ?string $printQualityDefault,
        ?array $printQualitySupported
    )
    {
        $this->jobPriorityDefault = $jobPriorityDefault;
        $this->jobPrioritySupported = $jobPrioritySupported;
        $this->jobHoldUntilDefault = $jobHoldUntilDefault;
        $this->jobHoldUntilSupported = $jobHoldUntilSupported;
        $this->jobSheetsDefault = $jobSheetsDefault;
        $this->jobSheetsSupported = $jobSheetsSupported;
        $this->multipleDocumentHandlingDefault = $multipleDocumentHandlingDefault;
        $this->multipleDocumentHandlingSupported = $multipleDocumentHandlingSupported;
        $this->copiesDefault = $copiesDefault;
        $this->copiesSupported = $copiesSupported;
        $this->finishingsDefault = $finishingsDefault;
        $this->finishingsSupported = $finishingsSupported;
        $this->pageRangesSupported = $pageRangesSupported;
        $this->sidesDefault = $sidesDefault;
        $this->sidesSupported = $sidesSupported;
        $this->numberUpDefault = $numberUpDefault;
        $this->orientationRequestedDefault = $orientationRequestedDefault;
        $this->orientationRequestedSupported = $orientationRequestedSupported;
        $this->numberUpSupported = $numberUpSupported;
        $this->mediaDefault = $mediaDefault;
        $this->mediaSupported = $mediaSupported;
        $this->mediaReady = $mediaReady;
        $this->printerResolutionDefault = $printerResolutionDefault;
        $this->printerResolutionSupported = $printerResolutionSupported;
        $this->printQualityDefault = $printQualityDefault;
        $this->printQualitySupported = $printQualitySupported;
    }

    /**
     * @return int|null
     */
    public function getJobPriorityDefault(): ?int
    {
        return $this->jobPriorityDefault;
    }

    /**
     * @return int|null
     */
    public function getJobPrioritySupported(): ?int
    {
        return $this->jobPrioritySupported;
    }

    /**
     * @return string|null
     */
    public function getJobHoldUntilDefault(): ?string
    {
        return $this->jobHoldUntilDefault;
    }

    /**
     * @return string[]|null
     */
    public function getJobHoldUntilSupported(): ?array
    {
        return $this->jobHoldUntilSupported;
    }

    /**
     * @return string|null
     */
    public function getJobSheetsDefault(): ?string
    {
        return $this->jobSheetsDefault;
    }

    /**
     * @return string[]|null
     */
    public function getJobSheetsSupported(): ?array
    {
        return $this->jobSheetsSupported;
    }

    /**
     * @return string|null
     */
    public function getMultipleDocumentHandlingDefault(): ?string
    {
        return $this->multipleDocumentHandlingDefault;
    }

    /**
     * @return string[]|null
     */
    public function getMultipleDocumentHandlingSupported(): ?array
    {
        return $this->multipleDocumentHandlingSupported;
    }

    /**
     * @return int|null
     */
    public function getCopiesDefault(): ?int
    {
        return $this->copiesDefault;
    }

    /**
     * @return int[]|null
     */
    public function getCopiesSupported(): ?array
    {
        return $this->copiesSupported;
    }

    /**
     * @return string[]|null
     */
    public function getFinishingsDefault(): ?array
    {
        return $this->finishingsDefault;
    }

    /**
     * @return string[]|null
     */
    public function getFinishingsSupported(): ?array
    {
        return $this->finishingsSupported;
    }

    /**
     * @return bool|null
     */
    public function getPageRangesSupported(): ?bool
    {
        return $this->pageRangesSupported;
    }

    /**
     * @return string|null
     */
    public function getSidesDefault(): ?string
    {
        return $this->sidesDefault;
    }

    /**
     * @return string[]|null
     */
    public function getSidesSupported(): ?array
    {
        return $this->sidesSupported;
    }

    /**
     * @return int|null
     */
    public function getNumberUpDefault(): ?int
    {
        return $this->numberUpDefault;
    }

    /**
     * @return string|null
     */
    public function getOrientationRequestedDefault(): ?string
    {
        return $this->orientationRequestedDefault;
    }

    /**
     * @return string[]|null
     */
    public function getOrientationRequestedSupported(): ?array
    {
        return $this->orientationRequestedSupported;
    }

    /**
     * @return string[]|null
     */
    public function getNumberUpSupported(): ?array
    {
        return $this->numberUpSupported;
    }

    /**
     * @return string|null
     */
    public function getMediaDefault(): ?string
    {
        return $this->mediaDefault;
    }

    /**
     * @return string[]|null
     */
    public function getMediaSupported(): ?array
    {
        return $this->mediaSupported;
    }

    /**
     * @return string[]|null
     */
    public function getMediaReady(): ?array
    {
        return $this->mediaReady;
    }

    /**
     * @return string|null
     */
    public function getPrinterResolutionDefault(): ?string
    {
        return $this->printerResolutionDefault;
    }

    /**
     * @return string[]|null
     */
    public function getPrinterResolutionSupported(): ?array
    {
        return $this->printerResolutionSupported;
    }

    /**
     * @return string|null
     */
    public function getPrintQualityDefault(): ?string
    {
        return $this->printQualityDefault;
    }

    /**
     * @return string[]|null
     */
    public function getPrintQualitySupported(): ?array
    {
        return $this->printQualitySupported;
    }
}
