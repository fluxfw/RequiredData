<?php

namespace srag\RequiredData\Field\MultiSearchSelect;

use srag\CustomInputGUIs\MultiSelectSearchInputGUI\MultiSelectSearchInputGUI;
use srag\CustomInputGUIs\PropertyFormGUI\PropertyFormGUI;
use srag\RequiredData\Field\MultiSelect\MultiSelectFillField;

/**
 * Class MultiSearchSelectFillField
 *
 * @package srag\RequiredData\Field\MultiSearchSelect
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class MultiSearchSelectFillField extends MultiSelectFillField
{

    /**
     * @var MultiSearchSelectField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(MultiSearchSelectField $field)
    {
        parent::__construct($field);
    }


    /**
     * @inheritDoc
     */
    public function getFormFields() : array
    {
        return [
            PropertyFormGUI::PROPERTY_CLASS   => MultiSelectSearchInputGUI::class,
            PropertyFormGUI::PROPERTY_OPTIONS => $this->field->getSelectOptions()
        ];
    }
}
