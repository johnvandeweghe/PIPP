<?php

namespace IPP;

class Operation {
    protected $versionNumber;
    protected $requestId;

    /**
     * Operation constructor.
     * @param int $versionNumber
     * @param int $requestId
     */
    public function __construct($versionNumber, $requestId) {
        $this->versionNumber = $versionNumber;
        $this->requestId = $requestId;
    }

    /*
     *
   An operation request or response is encoded as follows:

   -----------------------------------------------
   |                  version-number             |   2 bytes  - required
   -----------------------------------------------
   |               operation-id (request)        |
   |                      or                     |   2 bytes  - required
   |               status-code (response)        |
   -----------------------------------------------
   |                   request-id                |   4 bytes  - required
   -----------------------------------------------
   |                 attribute-group             |   n bytes - 0 or more
   -----------------------------------------------
   |              end-of-attributes-tag          |   1 byte   - required
   -----------------------------------------------
   |                     data                    |   q bytes  - optional
   -----------------------------------------------
     */


    public static function buildFromRequest($body) {
        $versionNumber = substr($body, 0, 2);
        $requestId = substr($body, 4, 4);

        return new Operation($versionNumber, $requestId);
    }



    /**
     * @return int
     */
    public function getVersionNumber() {
        return $this->versionNumber;
    }

    /**
     * @return int
     */
    public function getRequestId() {
        return $this->requestId;
    }
}
