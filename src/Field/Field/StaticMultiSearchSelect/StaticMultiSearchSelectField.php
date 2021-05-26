<?php

namespace srag\RequiredData\Field\Field\StaticMultiSearchSelect;

use srag\RequiredData\Field\Field\MultiSearchSelect\MultiSearchSelectField;

/**
 * Class StaticMultiSearchSelectField
 *
 * @package srag\RequiredData\Field\Field\StaticMultiSearchSelect
 */
abstract class StaticMultiSearchSelectField extends MultiSearchSelectField
{

    /**
     * @var string
     *
     * @abstract
     */
    const TABLE_NAME_SUFFIX = "";
}
