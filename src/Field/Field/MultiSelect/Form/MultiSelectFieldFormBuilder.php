<?php

namespace srag\RequiredData\Field\Field\MultiSelect\Form;

use srag\RequiredData\Field\Field\MultiSelect\MultiSelectField;
use srag\RequiredData\Field\Field\Select\Form\SelectFieldFormBuilder;
use srag\RequiredData\Field\FieldCtrl;

/**
 * Class MultiSelectFieldFormBuilder
 *
 * @package srag\RequiredData\Field\Field\MultiSelect\Form
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class MultiSelectFieldFormBuilder extends SelectFieldFormBuilder
{

    /**
     * @var MultiSelectField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, MultiSelectField $field)
    {
        parent::__construct($parent, $field);
    }
}
