<?php

namespace jvandeweghe\IPP\Server\OperationHandlers;


use jvandeweghe\IPP\Operation;
use jvandeweghe\IPP\Server\Server;

class GetPrinterAttributesOperationHandler implements OperationHandler {

    /**
     * @return int
     */
    public function getOperationId() {
        return Operation::OPERATION_GET_PRINTER_ATTRIBUTES;
    }

    /**
     * @param Operation $operation
     * @param Server $server
     * @return Operation
     */
    public function handleOperation(Operation $operation, Server $server) {
        // TODO: Implement handleOperation() method.
    }
}
