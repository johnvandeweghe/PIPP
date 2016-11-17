<?php

use jvandeweghe\IPP\Attributes\Attribute;
use jvandeweghe\IPP\Operation;

class OperationTest extends PHPUnit_Framework_TestCase {
    public function testParseSampleBody() {
        $sampleText = "AgAACwAAAAEBRwASYXR0cmlidXRlcy1jaGFyc2V0AAV1dGYtOEgAG2F0dHJpYnV0ZXMtbmF0dXJhbC1sYW5ndWFnZQAFZW4tdXNFAAtwcmludGVyLXVyaQAdaHR0cDovLzE5Mi4xNjguMzMuOTk6ODAvcHJpbnREABRyZXF1ZXN0ZWQtYXR0cmlidXRlcwAVY29tcHJlc3Npb24tc3VwcG9ydGVkRAAAABBjb3BpZXMtc3VwcG9ydGVkRAAAAAxjdXBzLXZlcnNpb25EAAAAGWRvY3VtZW50LWZvcm1hdC1zdXBwb3J0ZWREAAAADW1hcmtlci1jb2xvcnNEAAAAEm1hcmtlci1oaWdoLWxldmVsc0QAAAANbWFya2VyLWxldmVsc0QAAAARbWFya2VyLWxvdy1sZXZlbHNEAAAADm1hcmtlci1tZXNzYWdlRAAAAAxtYXJrZXItbmFtZXNEAAAADG1hcmtlci10eXBlc0QAAAATbWVkaWEtY29sLXN1cHBvcnRlZEQAAAAkbXVsdGlwbGUtZG9jdW1lbnQtaGFuZGxpbmctc3VwcG9ydGVkRAAAABRvcGVyYXRpb25zLXN1cHBvcnRlZEQAAAAacHJpbnQtY29sb3ItbW9kZS1zdXBwb3J0ZWREAAAADXByaW50ZXItYWxlcnREAAAAGXByaW50ZXItYWxlcnQtZGVzY3JpcHRpb25EAAAAGXByaW50ZXItaXMtYWNjZXB0aW5nLWpvYnNEAAAAIHByaW50ZXItbWFuZGF0b3J5LWpvYi1hdHRyaWJ1dGVzRAAAAA1wcmludGVyLXN0YXRlRAAAABVwcmludGVyLXN0YXRlLW1lc3NhZ2VEAAAAFXByaW50ZXItc3RhdGUtcmVhc29ucwM=";
        $sampleBody = base64_decode($sampleText);

        $operation = Operation::buildFromBinary($sampleBody);

        $this->assertEquals(2, $operation->getMajorVersion());
        $this->assertEquals(0, $operation->getMinorVersion());
        $this->assertEquals(11, $operation->getOperationIdOrStatusCode());
        $this->assertEquals(1, $operation->getRequestId());
        $this->assertCount(1, $operation->getAttributeGroups());
        $this->assertEquals(\jvandeweghe\IPP\AttributeGroup::OPERATION_ATTRIBUTES_TAG, $operation->getAttributeGroups()[0]->getType());
        $this->assertCount(4, $operation->getAttributeGroups()[0]->getAttributes());
        $this->assertEquals(Attribute::TYPE_CHARACTER_STRING_CHARSET, $operation->getAttributeGroups()[0]->getAttributes()[0]->getType());
        $this->assertEquals(Attribute::TYPE_CHARACTER_STRING_NATURAL_LANGUAGE, $operation->getAttributeGroups()[0]->getAttributes()[1]->getType());
        $this->assertEquals(Attribute::TYPE_CHARACTER_STRING_URI, $operation->getAttributeGroups()[0]->getAttributes()[2]->getType());
        $this->assertEquals(Attribute::TYPE_CHARACTER_STRING_KEYWORD, $operation->getAttributeGroups()[0]->getAttributes()[3]->getType());
        $this->assertEmpty($operation->getData());
    }

    public function testBuildSampleBody() {
        $sampleText = "AgAACwAAAAEBRwASYXR0cmlidXRlcy1jaGFyc2V0AAV1dGYtOEgAG2F0dHJpYnV0ZXMtbmF0dXJhbC1sYW5ndWFnZQAFZW4tdXNFAAtwcmludGVyLXVyaQAdaHR0cDovLzE5Mi4xNjguMzMuOTk6ODAvcHJpbnREABRyZXF1ZXN0ZWQtYXR0cmlidXRlcwAVY29tcHJlc3Npb24tc3VwcG9ydGVkRAAAABBjb3BpZXMtc3VwcG9ydGVkRAAAAAxjdXBzLXZlcnNpb25EAAAAGWRvY3VtZW50LWZvcm1hdC1zdXBwb3J0ZWREAAAADW1hcmtlci1jb2xvcnNEAAAAEm1hcmtlci1oaWdoLWxldmVsc0QAAAANbWFya2VyLWxldmVsc0QAAAARbWFya2VyLWxvdy1sZXZlbHNEAAAADm1hcmtlci1tZXNzYWdlRAAAAAxtYXJrZXItbmFtZXNEAAAADG1hcmtlci10eXBlc0QAAAATbWVkaWEtY29sLXN1cHBvcnRlZEQAAAAkbXVsdGlwbGUtZG9jdW1lbnQtaGFuZGxpbmctc3VwcG9ydGVkRAAAABRvcGVyYXRpb25zLXN1cHBvcnRlZEQAAAAacHJpbnQtY29sb3ItbW9kZS1zdXBwb3J0ZWREAAAADXByaW50ZXItYWxlcnREAAAAGXByaW50ZXItYWxlcnQtZGVzY3JpcHRpb25EAAAAGXByaW50ZXItaXMtYWNjZXB0aW5nLWpvYnNEAAAAIHByaW50ZXItbWFuZGF0b3J5LWpvYi1hdHRyaWJ1dGVzRAAAAA1wcmludGVyLXN0YXRlRAAAABVwcmludGVyLXN0YXRlLW1lc3NhZ2VEAAAAFXByaW50ZXItc3RhdGUtcmVhc29ucwM=";

        $attributes = [
            new \jvandeweghe\IPP\Attributes\CharsetAttribute("attributes-charset", ["utf-8"]),
            new \jvandeweghe\IPP\Attributes\NaturalLanguageAttribute("attributes-natural-language", ["en-us"]),
            new \jvandeweghe\IPP\Attributes\URIAttribute("printer-uri", ["http://192.168.33.99:80/print"]),
            new \jvandeweghe\IPP\Attributes\KeywordAttribute("requested-attributes", [
                'compression-supported',
                'copies-supported',
                'cups-version',
                'document-format-supported',
                'marker-colors',
                'marker-high-levels',
                'marker-levels',
                'marker-low-levels',
                'marker-message',
                'marker-names',
                'marker-types',
                'media-col-supported',
                'multiple-document-handling-supported',
                'operations-supported',
                'print-color-mode-supported',
                'printer-alert',
                'printer-alert-description',
                'printer-is-accepting-jobs',
                'printer-mandatory-job-attributes',
                'printer-state',
                'printer-state-message',
                'printer-state-reasons'
            ])
        ];

        $attributeGroups = [
            new \jvandeweghe\IPP\AttributeGroup(\jvandeweghe\IPP\AttributeGroup::OPERATION_ATTRIBUTES_TAG, $attributes)
        ];

        $operation = new Operation(2, 0, 11, 1, $attributeGroups, "");

        $this->assertEquals(base64_decode($sampleText), $operation->toBinary());
    }

    public function testParseSampleBodyThenToBinaryIt() {
        $sampleText = "AgAACwAAAAEBRwASYXR0cmlidXRlcy1jaGFyc2V0AAV1dGYtOEgAG2F0dHJpYnV0ZXMtbmF0dXJhbC1sYW5ndWFnZQAFZW4tdXNFAAtwcmludGVyLXVyaQAdaHR0cDovLzE5Mi4xNjguMzMuOTk6ODAvcHJpbnREABRyZXF1ZXN0ZWQtYXR0cmlidXRlcwAVY29tcHJlc3Npb24tc3VwcG9ydGVkRAAAABBjb3BpZXMtc3VwcG9ydGVkRAAAAAxjdXBzLXZlcnNpb25EAAAAGWRvY3VtZW50LWZvcm1hdC1zdXBwb3J0ZWREAAAADW1hcmtlci1jb2xvcnNEAAAAEm1hcmtlci1oaWdoLWxldmVsc0QAAAANbWFya2VyLWxldmVsc0QAAAARbWFya2VyLWxvdy1sZXZlbHNEAAAADm1hcmtlci1tZXNzYWdlRAAAAAxtYXJrZXItbmFtZXNEAAAADG1hcmtlci10eXBlc0QAAAATbWVkaWEtY29sLXN1cHBvcnRlZEQAAAAkbXVsdGlwbGUtZG9jdW1lbnQtaGFuZGxpbmctc3VwcG9ydGVkRAAAABRvcGVyYXRpb25zLXN1cHBvcnRlZEQAAAAacHJpbnQtY29sb3ItbW9kZS1zdXBwb3J0ZWREAAAADXByaW50ZXItYWxlcnREAAAAGXByaW50ZXItYWxlcnQtZGVzY3JpcHRpb25EAAAAGXByaW50ZXItaXMtYWNjZXB0aW5nLWpvYnNEAAAAIHByaW50ZXItbWFuZGF0b3J5LWpvYi1hdHRyaWJ1dGVzRAAAAA1wcmludGVyLXN0YXRlRAAAABVwcmludGVyLXN0YXRlLW1lc3NhZ2VEAAAAFXByaW50ZXItc3RhdGUtcmVhc29ucwM=";
        $sampleBody = base64_decode($sampleText);

        $operation = Operation::buildFromBinary($sampleBody);

        $this->assertEquals($sampleBody, $operation->toBinary());
    }

    public function testGetValidAttributesByName() {
        $attributesCharset = new \jvandeweghe\IPP\Attributes\CharsetAttribute("attributes-charset", ["utf-8"]);
        $attributesNaturalLanguage = new \jvandeweghe\IPP\Attributes\NaturalLanguageAttribute("attributes-natural-language", ["en-us"]);
        $attributes = [
            $attributesCharset,
            $attributesNaturalLanguage,
        ];

        $attributeGroups = [
            new \jvandeweghe\IPP\AttributeGroup(\jvandeweghe\IPP\AttributeGroup::OPERATION_ATTRIBUTES_TAG, $attributes)
        ];

        $operation = new Operation(2, 0, 11, 1, $attributeGroups, "");

        $this->assertEquals($attributesCharset, $operation->getAttributeByName('attributes-charset'));
        $this->assertEquals($attributesNaturalLanguage, $operation->getAttributeByName('attributes-natural-language'));
    }

    public function testGetInvalidAttributesByNameReturnsNull() {
        $attributesCharset = new \jvandeweghe\IPP\Attributes\CharsetAttribute("attributes-charset", ["utf-8"]);
        $attributes = [
            $attributesCharset,
        ];

        $attributeGroups = [
            new \jvandeweghe\IPP\AttributeGroup(\jvandeweghe\IPP\AttributeGroup::OPERATION_ATTRIBUTES_TAG, $attributes)
        ];

        $operation = new Operation(2, 0, 11, 1, $attributeGroups, "");

        $this->assertEquals(null, $operation->getAttributeByName('attributes-natural-language'));
    }

    public function testEmptyAttributeGroupsDoesntExplode() {
        $attributeGroups = [];
        $operation = new Operation(2, 0, 11, 1, $attributeGroups, "");

        $this->assertEquals($attributeGroups, $operation->getAttributeGroups());

        $binary = $operation->toBinary();
        $operation = Operation::buildFromBinary($binary);

        $this->assertEquals($attributeGroups, $operation->getAttributeGroups());
    }
}
