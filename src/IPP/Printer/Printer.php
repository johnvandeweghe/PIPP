<?php

namespace jvandeweghe\IPP\Printer;

interface Printer {
    //Has attributes, has queues, maybe jobs?
    /**
     * @return string
     */
    public function getName();
}
