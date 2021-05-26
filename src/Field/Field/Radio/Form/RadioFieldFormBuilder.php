<?php

namespace srag\RequiredData\Field\Field\Radio\Form;

use srag\RequiredData\Field\Field\Radio\RadioField;
use srag\RequiredData\Field\Field\Select\Form\SelectFieldFormBuilder;
use srag\RequiredData\Field\FieldCtrl;

/**
 * Class RadioFieldFormBuilder
 *
 * @package srag\RequiredData\Field\Field\Radio\Form
 */
class RadioFieldFormBuilder extends SelectFieldFormBuilder
{

    /**
     * @var RadioField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, RadioField $field)
    {
        parent::__construct($parent, $field);
    }
}
