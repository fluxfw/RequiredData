<?php

namespace srag\RequiredData\Field\Field\MultiSearchSelect\Form;

use srag\RequiredData\Field\Field\MultiSearchSelect\MultiSearchSelectField;
use srag\RequiredData\Field\Field\MultiSelect\Form\MultiSelectFieldFormBuilder;
use srag\RequiredData\Field\FieldCtrl;

/**
 * Class MultiSearchSelectFieldFormBuilder
 *
 * @package srag\RequiredData\Field\Field\MultiSearchSelect\Form
 */
class MultiSearchSelectFieldFormBuilder extends MultiSelectFieldFormBuilder
{

    /**
     * @var MultiSearchSelectField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, MultiSearchSelectField $field)
    {
        parent::__construct($parent, $field);
    }
}
