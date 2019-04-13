<?php

namespace IPP\Operation;

use IPP\Operation;
use Psr\Http\Message\UriInterface;

abstract class PrinterRequest extends Operation
{

    /**
     * @var UriInterface
     */
    private $printerUri;

    public function __construct(
        string $version,
        int $operationId,
        int $requestId,
        string $attributesCharset,
        string $attributesNaturalLanguage,
        UriInterface $printerUri,
        ?string $data
    )
    {
        parent::__construct($version, $operationId, $requestId, $attributesCharset, $attributesNaturalLanguage, $data);
        $this->printerUri = $printerUri;
    }

    public function getPrinterUri(): UriInterface
    {
        return $this->printerUri;
    }
}
