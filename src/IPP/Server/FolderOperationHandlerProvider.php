<?php

namespace jvandeweghe\IPP\Server;

use jvandeweghe\IPP\Server\OperationHandlers\OperationHandler;

class FolderOperationHandlerProvider implements OperationHandlerProvider {

    /**
     * @var string
     */
    private $globPattern;

    public function __construct($globPattern) {
        $this->globPattern = $globPattern;
    }

    //TODO: Caching, this will be evoked on each request right now
    public function getOperationHandlers() {
        $operationHandlers = [];
        foreach (glob('test/class/*.php') as $file) {
            $class = $this->getOperationHandlerNamespace() . basename($file, '.php');

            if (class_exists($class) && is_subclass_of($class, $this->getOperationHandlerNamespace() . "OperationHandler")) {
                $operationHandlers[] = $class;
            }
        }

        return $operationHandlers;
    }

    private function getOperationHandlerNamespace() {
        return '\jvandeweghe\IPP\Server\OperationHandlers\\';
    }

    /**
     * @param $operationId
     * @return string
     */
    public function getOperationHandlersById($operationId){
        $operationHandlers = $this->getOperationHandlers();
        foreach($operationHandlers as $operationHandler) {
            if ($operationHandler::getOperationId() == $operationId) {
                return $operationHandler;
            }
        }

        return null;
    }
}
