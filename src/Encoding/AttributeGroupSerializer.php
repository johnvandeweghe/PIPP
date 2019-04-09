<?php

namespace IPP\Encoding;

class AttributeGroupSerializer
{
    /**
     * @var AttributeSerializer
     */
    private $attributeSerializer;

    public function __construct(AttributeSerializer $attributeSerializer)
    {
        $this->attributeSerializer = $attributeSerializer;
    }


    public function toBinary(AttributeGroup $attributeGroup) {
        $data = chr($attributeGroup->getType());
        foreach($attributeGroup->getAttributes() as $attribute) {
            $data .= $this->attributeSerializer->toBinary($attribute);
        }

        return $data;
    }
}
