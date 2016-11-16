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
            $this->addPrinter($printer, $printer->getPrinterURISupported()->getValues()[0]);
        }
    }

    /**
     * @param Printer $printer
     * @param $path
     * @throws DuplicatePrinterException
     */
    public function addPrinter(Printer $printer, $path) {
        if(isset($this->pool[$path])) {
            throw new DuplicatePrinterException("Printer paths within a pool must be unique");
        }

        $this->pool[$path] = $printer;
    }

    /**
     * @param $path
     * @return Printer|null
     */
    public function getPrinter($path) {
        return isset($this->pool[$path]) ? $this->pool[$path] : null;
    }
}
