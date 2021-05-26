<?php

namespace srag\RequiredData\Field\Field\Checkbox;

use srag\RequiredData\Field\AbstractField;

/**
 * Class CheckboxField
 *
 * @package srag\RequiredData\Field\Field\Checkbox
 */
class CheckboxField extends AbstractField
{

    const TABLE_NAME_SUFFIX = "chck";


    /**
     * @inheritDoc
     */
    public function getFieldDescription() : string
    {
        return "";
    }
}
