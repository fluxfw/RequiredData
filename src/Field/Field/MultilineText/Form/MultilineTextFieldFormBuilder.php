<?php

namespace srag\RequiredData\Field\Field\MultilineText\Form;

use srag\RequiredData\Field\Field\MultilineText\MultilineTextField;
use srag\RequiredData\Field\Field\Text\Form\TextFieldFormBuilder;
use srag\RequiredData\Field\FieldCtrl;

/**
 * Class MultilineTextFieldFormBuilder
 *
 * @package srag\RequiredData\Field\Field\MultilineText\Form
 */
class MultilineTextFieldFormBuilder extends TextFieldFormBuilder
{

    /**
     * @var MultilineTextField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, MultilineTextField $field)
    {
        parent::__construct($parent, $field);
    }
}
