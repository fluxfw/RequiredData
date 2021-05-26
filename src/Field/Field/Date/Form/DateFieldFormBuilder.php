<?php

namespace srag\RequiredData\Field\Field\Date\Form;

use srag\RequiredData\Field\Field\Date\DateField;
use srag\RequiredData\Field\FieldCtrl;
use srag\RequiredData\Field\Form\AbstractFieldFormBuilder;

/**
 * Class DateFieldFormBuilder
 *
 * @package srag\RequiredData\Field\Field\Date\Form
 */
class DateFieldFormBuilder extends AbstractFieldFormBuilder
{

    /**
     * @var DateField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, DateField $field)
    {
        parent::__construct($parent, $field);
    }
}
