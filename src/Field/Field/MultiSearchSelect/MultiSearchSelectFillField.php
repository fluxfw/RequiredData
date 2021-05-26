<?php

namespace srag\RequiredData\Field\Field\MultiSearchSelect;

use ILIAS\UI\Component\Input\Field\Input;
use srag\CustomInputGUIs\InputGUIWrapperUIInputComponent\InputGUIWrapperUIInputComponent;
use srag\CustomInputGUIs\MultiSelectSearchNewInputGUI\MultiSelectSearchNewInputGUI;
use srag\RequiredData\Field\Field\MultiSelect\MultiSelectFillField;

/**
 * Class MultiSearchSelectFillField
 *
 * @package srag\RequiredData\Field\Field\MultiSearchSelect
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
    public function formatAsJson($fill_value)
    {
        return MultiSelectSearchNewInputGUI::cleanValues(parent::formatAsJson($fill_value));
    }


    /**
     * @inheritDoc
     */
    public function formatAsString($fill_value) : string
    {
        return parent::formatAsString(MultiSelectSearchNewInputGUI::cleanValues((array) $fill_value));
    }


    /**
     * @inheritDoc
     */
    public function getInput() : Input
    {
        $input = (new InputGUIWrapperUIInputComponent(new MultiSelectSearchNewInputGUI($this->field->getLabel())))->withByline($this->field->getDescription())
            ->withRequired($this->field->isRequired());

        $input->getInput()->setOptions($this->field->getSelectOptions());

        return $input;
    }
}
