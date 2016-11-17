<?php
class AttributeGroupTest extends PHPUnit_Framework_TestCase {
    public function testGetValidAttributesByName() {
        $attributesCharset = new \jvandeweghe\IPP\Attributes\CharsetAttribute("attributes-charset", ["utf-8"]);
        $attributesNaturalLanguage = new \jvandeweghe\IPP\Attributes\NaturalLanguageAttribute("attributes-natural-language", ["en-us"]);
        $attributes = [
            $attributesCharset,
            $attributesNaturalLanguage,
        ];

        $attributeGroup = new \jvandeweghe\IPP\AttributeGroup(\jvandeweghe\IPP\AttributeGroup::OPERATION_ATTRIBUTES_TAG, $attributes);

        $this->assertEquals($attributesCharset, $attributeGroup->getAttributeByName('attributes-charset'));
        $this->assertEquals($attributesNaturalLanguage, $attributeGroup->getAttributeByName('attributes-natural-language'));
    }

    public function testGeInvalidAttributesByNameReturnsNull() {
        $attributesCharset = new \jvandeweghe\IPP\Attributes\CharsetAttribute("attributes-charset", ["utf-8"]);
        $attributes = [
            $attributesCharset,
        ];

        $attributeGroup = new \jvandeweghe\IPP\AttributeGroup(\jvandeweghe\IPP\AttributeGroup::OPERATION_ATTRIBUTES_TAG, $attributes);

        $this->assertEquals(null, $attributeGroup->getAttributeByName('attributes-natural-language'));
    }
}
