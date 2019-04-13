<?php
namespace IPP;

class Job
{
    /**
     * @var string
     */
    private $jobUri;
    /**
     * @var int
     */
    private $jobId;
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
     * @var int|null
     */
    private $numberOfInterveningJobs;

    /**
     * Job constructor.
     * @param string $jobUri
     * @param int $jobId
     * @param string $jobState
     * @param string[] $jobStateReasons
     * @param string|null $jobStateMessage
     * @param int|null $numberOfInterveningJobs
     */
    public function __construct(
        string $jobUri,
        int $jobId,
        string $jobState,
        array $jobStateReasons,
        ?string $jobStateMessage,
        ?int $numberOfInterveningJobs
    )
    {
        $this->jobUri = $jobUri;
        $this->jobId = $jobId;
        $this->jobState = $jobState;
        $this->jobStateReasons = $jobStateReasons;
        $this->jobStateMessage = $jobStateMessage;
        $this->numberOfInterveningJobs = $numberOfInterveningJobs;
    }

    /**
     * @return string
     */
    public function getJobUri(): string
    {
        return $this->jobUri;
    }

    /**
     * @return int
     */
    public function getJobId(): int
    {
        return $this->jobId;
    }

    /**
     * @return string
     */
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

    /**
     * @return string|null
     */
    public function getJobStateMessage(): ?string
    {
        return $this->jobStateMessage;
    }

    /**
     * @return int|null
     */
    public function getNumberOfInterveningJobs(): ?int
    {
        return $this->numberOfInterveningJobs;
    }
}
