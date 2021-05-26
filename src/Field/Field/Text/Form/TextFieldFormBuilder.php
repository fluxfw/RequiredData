<?php

namespace srag\RequiredData\Field\Field\Text\Form;

use srag\RequiredData\Field\Field\Text\TextField;
use srag\RequiredData\Field\FieldCtrl;
use srag\RequiredData\Field\Form\AbstractFieldFormBuilder;

/**
 * Class TextFieldFormBuilder
 *
 * @package srag\RequiredData\Field\Field\Text\Form
 */
class TextFieldFormBuilder extends AbstractFieldFormBuilder
{

    /**
     * @var TextField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, TextField $field)
    {
        parent::__construct($parent, $field);
    }
}
