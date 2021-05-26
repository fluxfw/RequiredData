<?php

namespace srag\RequiredData\Field\Field\Email;

use srag\RequiredData\Field\Field\Text\TextField;

/**
 * Class EmailField
 *
 * @package srag\RequiredData\Field\Field\Email
 */
class EmailField extends TextField
{

    const TABLE_NAME_SUFFIX = "eml";


    /**
     * @inheritDoc
     */
    public function supportsMultiLang() : bool
    {
        return false;
    }
}
