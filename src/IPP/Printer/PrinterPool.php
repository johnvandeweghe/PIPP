<?php

namespace jvandeweghe\IPP\Printer;

use jvandeweghe\IPP\Printer\Exceptions\DuplicatePrinterException;

class PrinterPool {
    protected $pool = [];

    /**
     * PrinterPool constructor.
     * @param Printer[] $printers
     * @throws DuplicatePrinterException
     */
    public function __construct($printers = []){
        foreach($printers as $printer) {
            $this->addPrinter($printer);
        }
    }

    /**
     * @param Printer $printer
     * @throws DuplicatePrinterException
     */
    public function addPrinter(Printer $printer) {
        if(isset($this->pool[$printer->getName()])) {
            throw new DuplicatePrinterException("Printer names within a pool must be unique");
        }

        $this->pool[$printer->getName()] = $printer;
    }

    /**
     * @param $name
     * @return Printer|null
     */
    public function getPrinter($name) {
        return isset($this->pool[$name]) ? $this->pool[$name] : null;
    }
}
