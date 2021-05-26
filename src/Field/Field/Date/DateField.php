<?php

namespace srag\RequiredData\Field\Field\Date;

use srag\RequiredData\Field\AbstractField;

/**
 * Class DateField
 *
 * @package srag\RequiredData\Field\Field\Date
 */
class DateField extends AbstractField
{

    const TABLE_NAME_SUFFIX = "dat";


    /**
     * @inheritDoc
     */
    public function getFieldDescription() : string
    {
        return "";
    }
}
