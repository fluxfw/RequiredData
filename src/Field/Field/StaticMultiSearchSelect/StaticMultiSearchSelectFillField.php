<?php

namespace srag\RequiredData\Field\Field\StaticMultiSearchSelect;

use srag\RequiredData\Field\Field\MultiSearchSelect\MultiSearchSelectFillField;

/**
 * Class StaticMultiSearchSelectFillField
 *
 * @package srag\RequiredData\Field\Field\StaticMultiSearchSelect
 */
abstract class StaticMultiSearchSelectFillField extends MultiSearchSelectFillField
{

    /**
     * @var StaticMultiSearchSelectField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(StaticMultiSearchSelectField $field)
    {
        parent::__construct($field);
    }
}
