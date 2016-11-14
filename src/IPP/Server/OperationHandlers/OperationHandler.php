<?php

namespace jvandeweghe\IPP\Server\OperationHandlers;

use jvandeweghe\IPP\Operation;
use jvandeweghe\IPP\Printer;

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
