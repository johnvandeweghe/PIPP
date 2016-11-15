<?php

namespace jvandeweghe\IPP\Server\OperationHandlers;


use jvandeweghe\IPP\Operation;
use jvandeweghe\IPP\Printer\Printer;

/**
 * https://tools.ietf.org/html/rfc2911#section-3.3.4
 * Class GetPrinterAttributesOperationHandler
 * @package jvandeweghe\IPP\Server\OperationHandlers
 */
class GetPrinterAttributesOperationHandler implements OperationHandler {

    /**
     * @return int
     */
    public function getOperationId() {
        return Operation::OPERATION_GET_PRINTER_ATTRIBUTES;
    }

    /**
     * @param Operation $operation
     * @param Printer $printer
     * @return Operation
     */
    public function handleOperation(Operation $operation, Printer $printer) {
        //TODO: Build an operation response from printer data

        return $operation;
    }
}
