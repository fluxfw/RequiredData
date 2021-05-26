<?php

namespace srag\RequiredData\Field\Field\DynamicValue;

use ILIAS\UI\Component\Input\Field\Input;
use ilNonEditableValueGUI;
use srag\CustomInputGUIs\HiddenInputGUI\HiddenInputGUI;
use srag\CustomInputGUIs\InputGUIWrapperUIInputComponent\InputGUIWrapperUIInputComponent;
use srag\RequiredData\Fill\AbstractFillField;

/**
 * Class DynamicValueFillField
 *
 * @package srag\RequiredData\Field\Field\DynamicValue
 */
abstract class DynamicValueFillField extends AbstractFillField
{

    /**
     * @var DynamicValueField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(DynamicValueField $field)
    {
        parent::__construct($field);
    }


    /**
     * @inheritDoc
     */
    public function formatAsJson($fill_value)
    {
        return $this->field->deliverDynamicValue();
    }


    /**
     * @inheritDoc
     */
    public function formatAsString($fill_value) : string
    {
        return strval($fill_value);
    }


    /**
     * @inheritDoc
     */
    public function getInput() : Input
    {
        if ($this->field->isHide()) {
            return (new InputGUIWrapperUIInputComponent(new HiddenInputGUI()))->withLabel($this->field->getLabel())
                ->withByline($this->field->getDescription())
                ->withRequired($this->field->isRequired());
        } else {
            return (new InputGUIWrapperUIInputComponent(new ilNonEditableValueGUI($this->field->getLabel())))->withByline($this->field->getDescription())
                ->withRequired($this->field->isRequired())
                ->withValue($this->field->deliverDynamicValue());
        }
    }
}
