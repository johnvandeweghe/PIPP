<?php

namespace jvandeweghe\IPP\Server;

interface OperationHandlerProvider {
    /**
     * @return string[] a list of operation handler class names
     */
    public function getOperationHandlers();

    /**
     * @param $operationId
     * @return string the class name of an operation handler
     */
    public function getOperationHandlersById($operationId);
}
