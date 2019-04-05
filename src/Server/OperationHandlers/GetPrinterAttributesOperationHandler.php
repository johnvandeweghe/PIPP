<?php

namespace IPP\Server\OperationHandlers;


use IPP\AttributeGroup;
use IPP\Operation;
use IPP\Printer\Printer;

/**
 * https://tools.ietf.org/html/rfc2911#section-3.3.4
 * Class GetPrinterAttributesOperationHandler
 * @package IPP\Server\OperationHandlers
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
        $requestedAttributes = $operation->getAttributeByName("requested-attributes");

        $printerAttributes = $printer->getSupportedAttributes($requestedAttributes);

        $printerAttributeGroup = new AttributeGroup(AttributeGroup::PRINTER_ATTRIBUTES_TAG, $printerAttributes);

        $responseOperation = new Operation($printer->getIPPMajorVersion(), $printer->getIPPMinorVersion(), 0, $operation->getRequestId(), [$printerAttributeGroup], null);

        return $responseOperation;
    }
}
