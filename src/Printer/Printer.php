<?php

namespace IPP\Printer;

interface Printer {

    public function getIPPMajorVersion();
    public function getIPPMinorVersion();
    //TODO: The rest of the operations

    /**
     * @param KeywordAttribute $requestedAttributes
     * @return \IPP\Attributes\Attribute[]
     */
    public function getSupportedAttributes($requestedAttributes);

    /**
     * TODO: This is not used currently, and might need a filter parameter like above
     * @return Attribute[]
     */
    public function getUnsupportedAttributes();

    /**
     * @return URIAttribute
     */
    public function getPrinterURISupported();

    /**
     * @return KeywordAttribute
     */
    public function getUriSecuritySupported();

    /**
     * @return KeywordAttribute
     */
    public function getUriAuthenticationSupported();

    /**
     * @return NameWithoutLanguageAttribute
     */
    public function getPrinterName();

    /**
     * @return NoValueAttribute|TextWithoutLanguageAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPrinterLocation();

    /**
     * @return NoValueAttribute|TextWithoutLanguageAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPrinterInfo();

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute|URIAttribute
     */
    public function getPrinterMoreInfo();

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute|URIAttribute
     */
    public function getPrinterDriverInstaller();

    /**
     * @return NoValueAttribute|TextWithoutLanguageAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPrinterMakeAndModel();

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute|URIAttribute
     */
    public function getPrinterMoreInfoManufacturer();

    /**
     * @return EnumAttribute
     */
    public function getPrinterState();

    /**
     * @return KeywordAttribute
     */
    public function getPrinterStateReasons();

    /**
     * @return NoValueAttribute|TextWithoutLanguageAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPrinterStateMessage();

    /**
     * @return KeywordAttribute
     */
    public function getIppVersionsSupported();

    /**
     * @return KeywordAttribute
     */
    public function getOperationsSupported();

    /**
     * @return BooleanAttribute|NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getMultipleDocumentJobsSupported();

    /**
     * @return CharsetAttribute
     */
    public function getCharsetConfigured();

    /**
     * @return CharsetAttribute
     */
    public function getCharsetSupported();

    /**
     * @return NaturalLanguageAttribute
     */
    public function getNaturalLanguageConfigured();

    /**
     * @return NaturalLanguageAttribute
     */
    public function getGeneratedNaturalLanguageSupported();

    /**
     * @return MIMEMediaTypeAttribute
     */
    public function getDocumentFormatDefault();

    /**
     * @return MIMEMediaTypeAttribute
     */
    public function getDocumentFormatSupported();

    /**
     * @return BooleanAttribute
     */
    public function getPrinterIsAcceptingJobs();

    /**
     * @return IntegerAttribute
     */
    public function getQueuedJobCount();
    /**
     * @return NoValueAttribute|TextWithoutLanguageAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPrinterMessageFromOperator();

    /**
     * @return BooleanAttribute|NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getColorSupported();

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute|URISchemeAttribute
     */
    public function getReferenceURISchemesSupported();
    /**
     * @return KeywordAttribute
     */
    public function getPdlOverrideSupported();

    /**
     * @return IntegerAttribute
     */
    public function getPrinterUpTime();

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPrinterCurrentTime();

    /**
     * @return IntegerAttribute|NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getMultipleOperationTimeOut();

    /**
     * @return KeywordAttribute
     */
    public function getCompressionSupported();

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getJobKOctetsSupported();

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getJobImpressionsSupported();

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getJobMediaSheetsSupported();

    /**
     * @return IntegerAttribute|NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPagesPerMinute();

    /**
     * @return IntegerAttribute|NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPagesPerMinuteColor();
}
