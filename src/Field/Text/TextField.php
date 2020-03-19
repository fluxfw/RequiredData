<?php

namespace srag\RequiredData\Field\Text;

use srag\RequiredData\Field\AbstractField;

/**
 * Class TextField
 *
 * @package srag\RequiredData\Field\Text
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class TextField extends AbstractField
{

    const TABLE_NAME_SUFFIX = "txt";


    /**
     * @inheritDoc
     */
    public function getFieldDescription() : string
    {
        return "";
    }


    /**
     * @inheritDoc
     */
    public function supportsMultiLang() : bool
    {
        return true;
    }
}
