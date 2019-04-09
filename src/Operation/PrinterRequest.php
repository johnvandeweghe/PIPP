<?php

namespace IPP\Operation;

use IPP\Operation;

abstract class PrinterRequest extends Operation
{

    /**
     * @var string
     */
    private $printerUri;

    public function __construct(
        string $version,
        int $operationId,
        int $requestId,
        string $attributesCharset,
        string $attributesNaturalLanguage,
        string $printerUri,
        string $data
    )
    {
        parent::__construct($version, $operationId, $requestId, $attributesCharset, $attributesNaturalLanguage, $data);
        $this->printerUri = $printerUri;
    }

    public function getPrinterUri(): string
    {
        return $this->printerUri;
    }
}
