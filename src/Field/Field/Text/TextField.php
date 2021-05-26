<?php

namespace srag\RequiredData\Field\Field\Text;

use srag\RequiredData\Field\AbstractField;

/**
 * Class TextField
 *
 * @package srag\RequiredData\Field\Field\Text
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
