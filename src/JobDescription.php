<?php
namespace IPP;

use DateTime;
use Psr\Http\Message\UriInterface;

// RFC 2911 4.3
class JobDescription
{
    /**
     * @var UriInterface
     */
    private $jobUri;
    /**
     * @var int
     */
    private $jobId;
    /**
     * @var UriInterface
     */
    private $jobPrinterUri;
    /**
     * @var UriInterface|null
     */
    private $jobMoreInfo;
    /**
     * @var string
     */
    private $jobName;
    /**
     * @var string
     */
    private $jobOriginatingUserName;
    /**
     * @var string
     */
    private $jobState;
    /**
     * @var string[]
     */
    private $jobStateReasons;
    /**
     * @var string|null
     */
    private $jobStateMessage;
    /**
     * @var string[]|null
     */
    private $jobDetailedStatusMessages;
    /**
     * @var string[]|null
     */
    private $jobDocumentAccessErrors;
    /**
     * @var int|null
     */
    private $numberOfDocuments;
    /**
     * @var string|null
     */
    private $outputDeviceAssigned;
    /**
     * @var int
     */
    private $timeAtCreation;
    /**
     * @var int
     */
    private $timeAtProcessing;
    /**
     * @var int
     */
    private $timeAtCompleted;
    /**
     * @var int
     */
    private $jobPrinterUpTime;
    /**
     * @var DateTime|null
     */
    private $dateTimeAtCreation;
    /**
     * @var DateTime|null
     */
    private $dateTimeAtProcessing;
    /**
     * @var DateTime|null
     */
    private $dateTimeAtCompleted;
    /**
     * @var int|null
     */
    private $numberOfInterveningJobs;
    /**
     * @var string|null
     */
    private $jobMessageFromOperator;
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
    /**
     * @var int|null
     */
    private $jobKOctetsProcessed;
    /**
     * @var int|null
     */
    private $jobImpressionsCompleted;
    /**
     * @var int|null
     */
    private $jobMediaSheetsCompleted;
    /**
     * @var string
     */
    private $attributesCharset;
    /**
     * @var string
     */
    private $attributesNaturalLanguage;

    /**
     * Job constructor.
     * @param UriInterface $jobUri
     * @param int $jobId
     * @param UriInterface $jobPrinterUri
     * @param UriInterface|null $jobMoreInfo
     * @param string $jobName
     * @param string $jobOriginatingUserName
     * @param string $jobState
     * @param string[] $jobStateReasons
     * @param string|null $jobStateMessage
     * @param array|null $jobDetailedStatusMessages
     * @param string[]|null $jobDocumentAccessErrors
     * @param int|null $numberOfDocuments
     * @param string|null $outputDeviceAssigned
     * @param int $timeAtCreation
     * @param int $timeAtProcessing
     * @param int $timeAtCompleted
     * @param int $jobPrinterUpTime
     * @param DateTime|null $dateTimeAtCreation
     * @param DateTime|null $dateTimeAtProcessing
     * @param DateTime|null $dateTimeAtCompleted
     * @param int|null $numberOfInterveningJobs
     * @param string|null $jobMessageFromOperator
     * @param int|null $jobKOctets
     * @param int|null $jobImpressions
     * @param int|null $jobMediaSheets
     * @param int|null $jobKOctetsProcessed
     * @param int|null $jobImpressionsCompleted
     * @param int|null $jobMediaSheetsCompleted
     * @param string $attributesCharset
     * @param string $attributesNaturalLanguage
     */
    public function __construct(
        UriInterface $jobUri,
        int $jobId,
        UriInterface $jobPrinterUri,
        ?UriInterface $jobMoreInfo,
        string $jobName,
        string $jobOriginatingUserName,
        string $jobState,
        array $jobStateReasons,
        ?string $jobStateMessage,
        ?array $jobDetailedStatusMessages,
        ?array $jobDocumentAccessErrors,
        ?int $numberOfDocuments,
        ?string $outputDeviceAssigned,
        int $timeAtCreation,
        int $timeAtProcessing,
        int $timeAtCompleted,
        int $jobPrinterUpTime,
        ?DateTime $dateTimeAtCreation,
        ?DateTime $dateTimeAtProcessing,
        ?DateTime $dateTimeAtCompleted,
        ?int $numberOfInterveningJobs,
        ?string $jobMessageFromOperator,
        ?int $jobKOctets,
        ?int $jobImpressions,
        ?int $jobMediaSheets,
        ?int $jobKOctetsProcessed,
        ?int $jobImpressionsCompleted,
        ?int $jobMediaSheetsCompleted,
        string $attributesCharset,
        string $attributesNaturalLanguage
    )
    {
        $this->jobUri = $jobUri;
        $this->jobId = $jobId;
        $this->jobPrinterUri = $jobPrinterUri;
        $this->jobMoreInfo = $jobMoreInfo;
        $this->jobName = $jobName;
        $this->jobOriginatingUserName = $jobOriginatingUserName;
        $this->jobState = $jobState;
        $this->jobStateReasons = $jobStateReasons;
        $this->jobStateMessage = $jobStateMessage;
        $this->jobDetailedStatusMessages = $jobDetailedStatusMessages;
        $this->jobDocumentAccessErrors = $jobDocumentAccessErrors;
        $this->numberOfDocuments = $numberOfDocuments;
        $this->outputDeviceAssigned = $outputDeviceAssigned;
        $this->timeAtCreation = $timeAtCreation;
        $this->timeAtProcessing = $timeAtProcessing;
        $this->timeAtCompleted = $timeAtCompleted;
        $this->jobPrinterUpTime = $jobPrinterUpTime;
        $this->dateTimeAtCreation = $dateTimeAtCreation;
        $this->dateTimeAtProcessing = $dateTimeAtProcessing;
        $this->dateTimeAtCompleted = $dateTimeAtCompleted;
        $this->numberOfInterveningJobs = $numberOfInterveningJobs;
        $this->jobMessageFromOperator = $jobMessageFromOperator;
        $this->jobKOctets = $jobKOctets;
        $this->jobImpressions = $jobImpressions;
        $this->jobMediaSheets = $jobMediaSheets;
        $this->jobKOctetsProcessed = $jobKOctetsProcessed;
        $this->jobImpressionsCompleted = $jobImpressionsCompleted;
        $this->jobMediaSheetsCompleted = $jobMediaSheetsCompleted;
        $this->attributesCharset = $attributesCharset;
        $this->attributesNaturalLanguage = $attributesNaturalLanguage;
    }

    public function getJobUri(): UriInterface
    {
        return $this->jobUri;
    }

    public function getJobId(): int
    {
        return $this->jobId;
    }

    public function getJobPrinterUri(): UriInterface
    {
        return $this->jobPrinterUri;
    }

    public function getJobMoreInfo(): ?UriInterface
    {
        return $this->jobMoreInfo;
    }

    public function getJobName(): string
    {
        return $this->jobName;
    }

    public function getJobOriginatingUserName(): string
    {
        return $this->jobOriginatingUserName;
    }

    public function getJobState(): string
    {
        return $this->jobState;
    }

    /**
     * @return string[]
     */
    public function getJobStateReasons(): array
    {
        return $this->jobStateReasons;
    }

    public function getJobStateMessage(): ?string
    {
        return $this->jobStateMessage;
    }

    /**
     * @return string[]|null
     */
    public function getJobDetailedStatusMessages(): ?array
    {
        return $this->jobDetailedStatusMessages;
    }

    /**
     * @return string[]|null
     */
    public function getJobDocumentAccessErrors(): ?array
    {
        return $this->jobDocumentAccessErrors;
    }

    public function getNumberOfDocuments(): ?int
    {
        return $this->numberOfDocuments;
    }

    public function getOutputDeviceAssigned(): ?string
    {
        return $this->outputDeviceAssigned;
    }

    public function getTimeAtCreation(): int
    {
        return $this->timeAtCreation;
    }

    public function getTimeAtProcessing(): int
    {
        return $this->timeAtProcessing;
    }

    public function getTimeAtCompleted(): int
    {
        return $this->timeAtCompleted;
    }

    public function getJobPrinterUpTime(): int
    {
        return $this->jobPrinterUpTime;
    }

    public function getDateTimeAtCreation(): ?DateTime
    {
        return $this->dateTimeAtCreation;
    }

    public function getDateTimeAtProcessing(): ?DateTime
    {
        return $this->dateTimeAtProcessing;
    }

    public function getDateTimeAtCompleted(): ?DateTime
    {
        return $this->dateTimeAtCompleted;
    }

    public function getNumberOfInterveningJobs(): ?int
    {
        return $this->numberOfInterveningJobs;
    }

    public function getJobMessageFromOperator(): ?string
    {
        return $this->jobMessageFromOperator;
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

    public function getJobKOctetsProcessed(): ?int
    {
        return $this->jobKOctetsProcessed;
    }

    public function getJobImpressionsCompleted(): ?int
    {
        return $this->jobImpressionsCompleted;
    }

    public function getJobMediaSheetsCompleted(): ?int
    {
        return $this->jobMediaSheetsCompleted;
    }

    public function getAttributesCharset(): string
    {
        return $this->attributesCharset;
    }

    public function getAttributesNaturalLanguage(): string
    {
        return $this->attributesNaturalLanguage;
    }
}
