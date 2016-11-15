<?php

namespace jvandeweghe\IPP\Server;

use jvandeweghe\IPP\Server\Exceptions\UnsupportedOperationException;

interface OperationHandlerProvider {
    /**
     * @return string[] a list of operation handler class names
     */
    public function getOperationHandlers();

    /**
     * @param $operationId
     * @return string the class name of an operation handler
     * @throws UnsupportedOperationException
     */
    public function getOperationHandlersById($operationId);
}
