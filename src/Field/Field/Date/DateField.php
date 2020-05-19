<?php

namespace srag\RequiredData\Field\Field\Date;

use srag\RequiredData\Field\AbstractField;

/**
 * Class DateField
 *
 * @package srag\RequiredData\Field\Field\Date
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
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
