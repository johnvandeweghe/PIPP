<?php

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
        $this->assertCount(3, $operation->getAttributeGroups()[0]->getAttributes());
        $this->assertEquals(\jvandeweghe\IPP\Attribute::TYPE_CHARACTER_STRING_CHARSET, $operation->getAttributeGroups()[0]->getAttributes()[0]->getType());
        $this->assertEquals(\jvandeweghe\IPP\Attribute::TYPE_CHARACTER_STRING_NATURAL_LANGUAGE, $operation->getAttributeGroups()[0]->getAttributes()[1]->getType());
        $this->assertEquals(\jvandeweghe\IPP\Attribute::TYPE_CHARACTER_STRING_URI, $operation->getAttributeGroups()[0]->getAttributes()[2]->getType());
        $this->assertEmpty($operation->getData());
    }
}
