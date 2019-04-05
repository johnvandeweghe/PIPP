<?php

namespace IPP\Server\OperationHandlers;

use IPP\Operation;
use IPP\Printer\Printer;

interface OperationHandler {
    /**
     * @return int
     */
    public function getOperationId();

    /**
     * @param Operation $operation
     * @param Printer $printer
     * @return Operation
     */
    public function handleOperation(Operation $operation, Printer $printer);
}
