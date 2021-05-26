<?php

namespace srag\RequiredData\Field\Field\Checkbox\Form;

use srag\RequiredData\Field\Field\Checkbox\CheckboxField;
use srag\RequiredData\Field\FieldCtrl;
use srag\RequiredData\Field\Form\AbstractFieldFormBuilder;

/**
 * Class CheckboxFieldFormBuilder
 *
 * @package srag\RequiredData\Field\Field\Checkbox\Form
 */
class CheckboxFieldFormBuilder extends AbstractFieldFormBuilder
{

    /**
     * @var CheckboxField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, CheckboxField $field)
    {
        parent::__construct($parent, $field);
    }
}
