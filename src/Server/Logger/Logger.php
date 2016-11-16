<?php
namespace jvandeweghe\IPP\Server\Logger;

interface Logger {
    const LEVEL_INFO = 2;
    const LEVEL_WARNING = 4;
    const LEVEL_ERROR = 8;

    const LEVEL_ALL = self::LEVEL_INFO | self::LEVEL_WARNING | self::LEVEL_ERROR;

    public function log($message, $level);
}
