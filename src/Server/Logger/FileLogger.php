<?php

namespace jvandeweghe\IPP\Server\Logger;

use jvandeweghe\IPP\Server\Logger\Exceptions\FileAccessException;

class FileLogger implements Logger {
    protected $file;
    /**
     * @var int
     */
    protected $loggingLevel;

    public function __construct($filePath, $loggingLevel = (Logger::LEVEL_ERROR | Logger::LEVEL_WARNING)) {
        $this->file = fopen($filePath, "a");
        if(!$this->file){
            throw new FileAccessException("Unable to access \"$filePath\"");
        }
        $this->loggingLevel = $loggingLevel;
    }

    public function log($message, $level) {
        if($level & $this->loggingLevel){
            //TODO: improve $loglevel printing
            fwrite($this->file, "$level: $message\n");
        }
    }
}
