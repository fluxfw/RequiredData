<?php

namespace srag\RequiredData\Field\MultiSelect;

use ilMultiSelectInputGUI;
use srag\CustomInputGUIs\PropertyFormGUI\PropertyFormGUI;
use srag\RequiredData\Field\Select\SelectFillField;

/**
 * Class MultiSelectFillField
 *
 * @package srag\RequiredData\Field\MultiSelect
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class MultiSelectFillField extends SelectFillField
{

    /**
     * @var MultiSelectField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(MultiSelectField $field)
    {
        parent::__construct($field);
    }


    /**
     * @inheritDoc
     */
    public function getFormFields() : array
    {
        return [
            PropertyFormGUI::PROPERTY_CLASS   => ilMultiSelectInputGUI::class,
            PropertyFormGUI::PROPERTY_OPTIONS => $this->field->getSelectOptions()
        ];
    }


    /**
     * @inheritDoc
     */
    public function formatAsJson($filled_value)
    {
        return (array) ($filled_value);
    }


    /**
     * @inheritDoc
     */
    public function formatAsString($filled_value) : string
    {
        return nl2br(implode("\n", array_map(function (string $value) : string {
            return strval($this->field->getSelectOptions()[$value]);
        }, (array) ($filled_value))), false);
    }
}
