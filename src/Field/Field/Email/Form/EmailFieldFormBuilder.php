<?php

namespace srag\RequiredData\Field\Field\Email\Form;

use srag\RequiredData\Field\Field\Email\EmailField;
use srag\RequiredData\Field\Field\Text\Form\TextFieldFormBuilder;
use srag\RequiredData\Field\FieldCtrl;

/**
 * Class EmailFieldFormBuilder
 *
 * @package srag\RequiredData\Field\Field\Email\Form
 */
class EmailFieldFormBuilder extends TextFieldFormBuilder
{

    /**
     * @var EmailField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, EmailField $field)
    {
        parent::__construct($parent, $field);
    }
}
