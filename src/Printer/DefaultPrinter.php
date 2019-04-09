<?php

namespace IPP\Printer;

use IPP\Attributes\Attribute;
use IPP\Attributes\BooleanAttribute;
use IPP\Attributes\CharsetAttribute;
use IPP\Attributes\EnumAttribute;
use IPP\Attributes\IntegerAttribute;
use IPP\Attributes\KeywordAttribute;
use IPP\Attributes\MIMEMediaTypeAttribute;
use IPP\Attributes\NameWithoutLanguageAttribute;
use IPP\Attributes\NaturalLanguageAttribute;
use IPP\Attributes\NoValueAttribute;
use IPP\Attributes\TextWithoutLanguageAttribute;
use IPP\Attributes\UnknownAttribute;
use IPP\Attributes\UnsupportedAttribute;
use IPP\Attributes\URIAttribute;
use IPP\Attributes\URISchemeAttribute;

class DefaultPrinter implements Printer {
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

    /**
     * DefaultPrinter constructor.
     * @param URIAttribute $printerURISupported
     * @param KeywordAttribute $uriSecuritySupported
     * @param KeywordAttribute $uriAuthenticationSupported
     * @param NameWithoutLanguageAttribute $printerName
     * @param EnumAttribute $printerState
     * @param KeywordAttribute $printerStateReasons
     * @param KeywordAttribute $ippVersionsSupported
     * @param KeywordAttribute $operationsSupported
     * @param BooleanAttribute|NoValueAttribute|UnknownAttribute|UnsupportedAttribute $multipleDocumentJobsSupported
     * @param CharsetAttribute $charsetConfigured
     * @param CharsetAttribute $charsetSupported
     * @param NaturalLanguageAttribute $naturalLanguageConfigured
     * @param NaturalLanguageAttribute $generatedNaturalLanguageSupported
     * @param MIMEMediaTypeAttribute $documentFormatDefault
     * @param MIMEMediaTypeAttribute $documentFormatSupported
     * @param BooleanAttribute $printerIsAcceptingJobs
     * @param IntegerAttribute $queuedJobCount
     * @param KeywordAttribute $pdlOverrideSupported
     * @param IntegerAttribute $printerUpTime
     * @param KeywordAttribute $compressionSupported
     * TODO: Make this not so difficult to use
     */
    public function __construct(URIAttribute $printerURISupported, KeywordAttribute $uriSecuritySupported,
                                KeywordAttribute $uriAuthenticationSupported, NameWithoutLanguageAttribute $printerName,
                                EnumAttribute $printerState, KeywordAttribute $printerStateReasons, KeywordAttribute $ippVersionsSupported,
                                KeywordAttribute $operationsSupported, $multipleDocumentJobsSupported, CharsetAttribute $charsetConfigured,
                                CharsetAttribute $charsetSupported, NaturalLanguageAttribute $naturalLanguageConfigured,
                                NaturalLanguageAttribute $generatedNaturalLanguageSupported, MIMEMediaTypeAttribute $documentFormatDefault,
                                MIMEMediaTypeAttribute $documentFormatSupported, BooleanAttribute $printerIsAcceptingJobs,
                                IntegerAttribute $queuedJobCount, KeywordAttribute $pdlOverrideSupported,
                                IntegerAttribute $printerUpTime, KeywordAttribute $compressionSupported) {
        $this->printerURISupported = $printerURISupported;
        $this->uriSecuritySupported = $uriSecuritySupported;
        $this->uriAuthenticationSupported = $uriAuthenticationSupported;
        $this->printerName = $printerName;
        $this->printerLocation = new UnsupportedAttribute('printer-location');
        $this->printerInfo = new UnsupportedAttribute('printer-info');
        $this->printerMoreInfo = new UnsupportedAttribute('printer-more-info');
        $this->printerDriverInstaller = new UnsupportedAttribute('printer-driver-installer');
        $this->printerMakeAndModel = new UnsupportedAttribute('printer-make-and-model');
        $this->printerMoreInfoManufacturer = new UnsupportedAttribute('printer-more-info-manufacturer');
        $this->printerState = $printerState;
        $this->printerStateReasons = $printerStateReasons;
        $this->printerStateMessage = new UnsupportedAttribute('printer-status-message');
        $this->ippVersionsSupported = $ippVersionsSupported;
        $this->operationsSupported = $operationsSupported;
        $this->multipleDocumentJobsSupported = $multipleDocumentJobsSupported;
        $this->charsetConfigured = $charsetConfigured;
        $this->charsetSupported = $charsetSupported;
        $this->naturalLanguageConfigured = $naturalLanguageConfigured;
        $this->generatedNaturalLanguageSupported = $generatedNaturalLanguageSupported;
        $this->documentFormatDefault = $documentFormatDefault;
        $this->documentFormatSupported = $documentFormatSupported;
        $this->printerIsAcceptingJobs = $printerIsAcceptingJobs;
        $this->queuedJobCount = $queuedJobCount;
        $this->printerMessageFromOperator = new UnsupportedAttribute('printer-message-from-operator');
        $this->colorSupported = new UnsupportedAttribute('color-supported');
        $this->referenceURISchemesSupported = new UnsupportedAttribute('reference-uri-schemes-supported');
        $this->pdlOverrideSupported = $pdlOverrideSupported;
        $this->printerUpTime = $printerUpTime;
        $this->printerCurrentTime = new UnsupportedAttribute('printer-current-time');
        $this->multipleOperationTimeOut = new UnsupportedAttribute('multiple-operation-time-out');
        $this->compressionSupported = $compressionSupported;
        $this->jobKOctetsSupported = new UnsupportedAttribute('job-k-octets-supported');
        $this->jobImpressionsSupported = new UnsupportedAttribute('job-impressions-supported');
        $this->jobMediaSheetsSupported = new UnsupportedAttribute('job-media-sheets-supported');
        $this->pagesPerMinute = new UnsupportedAttribute("pages-per-minute");
        $this->pagesPerMinuteColor = new UnsupportedAttribute("pages-per-minute-color");
    }

    public static function createFromValues($uri, $printerName){
        return new DefaultPrinter(
            new URIAttribute('printer-uri-supported', [$uri]),
            new KeywordAttribute('uri-security-supported', ["none"]),
            new KeywordAttribute('uri-authentication-supported', ["none"]),
            new NameWithoutLanguageAttribute('printer-name', [$printerName]),
            new EnumAttribute("printer-state", [3]),
            new KeywordAttribute("printer-state-reasons", ["none"]),
            new KeywordAttribute("ipp-versions-supported", [pack("C*", [1,1])]),
            new KeywordAttribute("operations-supported", [\IPP\Encoding\Operation::OPERATION_GET_PRINTER_ATTRIBUTES]),
            new BooleanAttribute("multiple-document-jobs-supported", [false]),
            new CharsetAttribute("charset-configured", ["utf-8"]),
            new CharsetAttribute("charset-supported", ["utf-8"]),
            new NaturalLanguageAttribute("natural-language-configured", ["en-us"]),
            new NaturalLanguageAttribute("generated-natural-language-supported", ["en-us"]),
            new MIMEMediaTypeAttribute("document-format-default", ["text/plain; charset=utf-8"]),
            new MIMEMediaTypeAttribute("document-format-supported", ["text/plain; charset=utf-8"]),
            new BooleanAttribute("printer-is-accepting-jobs", [true]),
            new IntegerAttribute("queued-job-count", [0]),
            new KeywordAttribute("pdl-override-support", ["not-attempted"]),
            new IntegerAttribute("printer-up-time", [time()]),
            new KeywordAttribute("compression-supported", ["none"])
        );
    }
    /**
     * @param KeywordAttribute $requestedAttributes
     * @return \IPP\Attributes\Attribute[]
     */
    public function getSupportedAttributes($requestedAttributes) {
        $attributes = [];
        foreach($this as $attribute) {
          if( !($attribute instanceof UnsupportedAttribute) && in_array($attribute->getName(), $requestedAttributes->getValues())){
              $attributes[] = $attribute;
          }
        }

        return $attributes;
    }


    public function getUnsupportedAttributes() {
        return [];
    }

    /**
     * @return URIAttribute
     */
    public function getPrinterURISupported() {
        return $this->printerURISupported;
    }

    /**
     * @return KeywordAttribute
     */
    public function getUriSecuritySupported() {
        return $this->uriSecuritySupported;
    }

    /**
     * @return KeywordAttribute
     */
    public function getUriAuthenticationSupported() {
        return $this->uriAuthenticationSupported;
    }

    /**
     * @return NameWithoutLanguageAttribute
     */
    public function getPrinterName() {
        return $this->printerName;
    }

    /**
     * @return NoValueAttribute|TextWithoutLanguageAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPrinterLocation() {
        return $this->printerLocation;
    }

    /**
     * @return NoValueAttribute|TextWithoutLanguageAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPrinterInfo() {
        return $this->printerInfo;
    }

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute|URIAttribute
     */
    public function getPrinterMoreInfo() {
        return $this->printerMoreInfo;
    }

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute|URIAttribute
     */
    public function getPrinterDriverInstaller() {
        return $this->printerDriverInstaller;
    }

    /**
     * @return NoValueAttribute|TextWithoutLanguageAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPrinterMakeAndModel() {
        return $this->printerMakeAndModel;
    }

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute|URIAttribute
     */
    public function getPrinterMoreInfoManufacturer() {
        return $this->printerMoreInfoManufacturer;
    }

    /**
     * @return EnumAttribute
     */
    public function getPrinterState() {
        return $this->printerState;
    }

    /**
     * @return KeywordAttribute
     */
    public function getPrinterStateReasons() {
        return $this->printerStateReasons;
    }

    /**
     * @return NoValueAttribute|TextWithoutLanguageAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPrinterStateMessage() {
        return $this->printerStateMessage;
    }

    /**
     * @return KeywordAttribute
     */
    public function getIppVersionsSupported() {
        return $this->ippVersionsSupported;
    }

    /**
     * @return KeywordAttribute
     */
    public function getOperationsSupported() {
        return $this->operationsSupported;
    }

    /**
     * @return BooleanAttribute|NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getMultipleDocumentJobsSupported() {
        return $this->multipleDocumentJobsSupported;
    }

    /**
     * @return CharsetAttribute
     */
    public function getCharsetConfigured() {
        return $this->charsetConfigured;
    }

    /**
     * @return CharsetAttribute
     */
    public function getCharsetSupported() {
        return $this->charsetSupported;
    }

    /**
     * @return NaturalLanguageAttribute
     */
    public function getNaturalLanguageConfigured() {
        return $this->naturalLanguageConfigured;
    }

    /**
     * @return NaturalLanguageAttribute
     */
    public function getGeneratedNaturalLanguageSupported() {
        return $this->generatedNaturalLanguageSupported;
    }

    /**
     * @return MIMEMediaTypeAttribute
     */
    public function getDocumentFormatDefault() {
        return $this->documentFormatDefault;
    }

    /**
     * @return MIMEMediaTypeAttribute
     */
    public function getDocumentFormatSupported() {
        return $this->documentFormatSupported;
    }

    /**
     * @return BooleanAttribute
     */
    public function getPrinterIsAcceptingJobs() {
        return $this->printerIsAcceptingJobs;
    }

    /**
     * @return IntegerAttribute
     */
    public function getQueuedJobCount() {
        return $this->queuedJobCount;
    }

    /**
     * @return NoValueAttribute|TextWithoutLanguageAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPrinterMessageFromOperator() {
        return $this->printerMessageFromOperator;
    }

    /**
     * @return BooleanAttribute|NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getColorSupported() {
        return $this->colorSupported;
    }

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute|URISchemeAttribute
     */
    public function getReferenceURISchemesSupported() {
        return $this->referenceURISchemesSupported;
    }

    /**
     * @return KeywordAttribute
     */
    public function getPdlOverrideSupported() {
        return $this->pdlOverrideSupported;
    }

    /**
     * @return IntegerAttribute
     */
    public function getPrinterUpTime() {
        return $this->printerUpTime;
    }

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPrinterCurrentTime() {
        return $this->printerCurrentTime;
    }

    /**
     * @return IntegerAttribute|NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getMultipleOperationTimeOut() {
        return $this->multipleOperationTimeOut;
    }

    /**
     * @return KeywordAttribute
     */
    public function getCompressionSupported() {
        return $this->compressionSupported;
    }

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getJobKOctetsSupported() {
        return $this->jobKOctetsSupported;
    }

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getJobImpressionsSupported() {
        return $this->jobImpressionsSupported;
    }

    /**
     * @return NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getJobMediaSheetsSupported() {
        return $this->jobMediaSheetsSupported;
    }

    /**
     * @return IntegerAttribute|NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPagesPerMinute() {
        return $this->pagesPerMinute;
    }

    /**
     * @return IntegerAttribute|NoValueAttribute|UnknownAttribute|UnsupportedAttribute
     */
    public function getPagesPerMinuteColor() {
        return $this->pagesPerMinuteColor;
    }

    public function getIPPMajorVersion() {
        return 1;
    }

    public function getIPPMinorVersion() {
        return 1;
    }


}
