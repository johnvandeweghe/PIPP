<?php

namespace jvandeweghe\IPP\Printer;

use jvandeweghe\IPP\Attributes\BooleanAttribute;
use jvandeweghe\IPP\Attributes\CharsetAttribute;
use jvandeweghe\IPP\Attributes\EnumAttribute;
use jvandeweghe\IPP\Attributes\IntegerAttribute;
use jvandeweghe\IPP\Attributes\KeywordAttribute;
use jvandeweghe\IPP\Attributes\MIMEMediaTypeAttribute;
use jvandeweghe\IPP\Attributes\NameWithoutLanguageAttribute;
use jvandeweghe\IPP\Attributes\NaturalLanguageAttribute;
use jvandeweghe\IPP\Attributes\NoValueAttribute;
use jvandeweghe\IPP\Attributes\TextWithoutLanguageAttribute;
use jvandeweghe\IPP\Attributes\UnknownAttribute;
use jvandeweghe\IPP\Attributes\UnsupportedAttribute;
use jvandeweghe\IPP\Attributes\URIAttribute;
use jvandeweghe\IPP\Attributes\URISchemeAttribute;

class Printer {
    //4.4 Printer Description Attributes
    /**
     * @var URIAttribute
     */
    protected $printerURISupported;
    /**
     * @var KeywordAttribute
     */
    protected $uriSecuritySupported;
    /**
     * @var KeywordAttribute
     */
    protected $uriAuthenticationSupported;
    /**
     * @var NameWithoutLanguageAttribute TODO:NameWithLanguage 127
     */
    protected $printerName;
    /**
     * @var TextWithoutLanguageAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute TODO:TextWithLanguage 127
     */
    protected $printerLocation;
    /**
     * @var TextWithoutLanguageAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute
     */
    protected $printerInfo;
    /**
     * @var URIAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute
     */
    protected $printerMoreInfo;
    /**
     * @var URIAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute
     */
    protected $printerDriverInstaller;
    /**
     * @var TextWithoutLanguageAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute TODO:TextWithLanguage 127
     */
    protected $printerMakeAndModel;
    /**
     * @var URIAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute
     */
    protected $printerMoreInfoManufacturer;
    /**
     * @var EnumAttribute
     */
    protected $printerState;
    /**
     * @var KeywordAttribute
     */
    protected $printerStateReasons;
    /**
     * @var TextWithoutLanguageAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute TODO:TextWithLanguage MAX
     */
    protected $printerStateMessage;
    /**
     * @var KeywordAttribute
     */
    protected $ippVersionsSupported;
    /**
     * @var KeywordAttribute
     */
    protected $operationsSupported;
    /**
     * @var BooleanAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute
     */
    protected $multipleDocumentJobsSupported;
    /**
     * @var CharsetAttribute
     */
    protected $charsetConfigured;
    /**
     * @var CharsetAttribute
     */
    protected $charsetSupported;
    /**
     * @var NaturalLanguageAttribute
     */
    protected $naturalLanguageConfigured;
    /**
     * @var NaturalLanguageAttribute
     */
    protected $generatedNaturalLanguageSupported;
    /**
     * @var MIMEMediaTypeAttribute
     */
    protected $documentFormatDefault;
    /**
     * @var MIMEMediaTypeAttribute
     */
    protected $documentFormatSupported;
    /**
     * @var BooleanAttribute
     */
    protected $printerIsAcceptingJobs;
    /**
     * @var IntegerAttribute
     */
    protected $queuedJobCount;
    /**
     * @var TextWithoutLanguageAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute TODO:TextWithLanguage 127
     */
    protected $printerMessageFromOperator;
    /**
     * @var BooleanAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute
     */
    protected $colorSupported;
    /**
     * @var URISchemeAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute
     */
    protected $referenceURISchemesSupported;
    /**
     * @var KeywordAttribute
     */
    protected $pdlOverrideSupported;
    /**
     * @var IntegerAttribute
     */
    protected $printerUpTime;
    /**
     * @var UnknownAttribute|NoValueAttribute|UnsupportedAttribute TODO: DateTimeAttribute
     */
    protected $printerCurrentTime;
    /**
     * @var IntegerAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute
     */
    protected $multipleOperationTimeOut;
    /**
     * @var KeywordAttribute
     */
    protected $compressionSupported;
    /**
     * @var UnknownAttribute|NoValueAttribute|UnsupportedAttribute TODO: RangeOfIntegerAttribute
     */
    protected $jobKOctetsSupported;
    /**
     * @var UnknownAttribute|NoValueAttribute|UnsupportedAttribute TODO: RangeOfIntegerAttribute
     */
    protected $jobImpressionsSupported;
    /**
     * @var UnknownAttribute|NoValueAttribute|UnsupportedAttribute TODO: RangeOfIntegerAttribute
     */
    protected $jobMediaSheetsSupported;
    /**
     * @var IntegerAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute
     */
    protected $pagesPerMinute;
    /**
     * @var IntegerAttribute|UnknownAttribute|NoValueAttribute|UnsupportedAttribute
     */
    protected $pagesPerMinuteColor;

    //TODO: Constructor, or more likely a factory, or a builder maybe?

}
