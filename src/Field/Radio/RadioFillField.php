<?php

namespace srag\RequiredData\Field\Radio;

use ilRadioGroupInputGUI;
use ilRadioOption;
use srag\CustomInputGUIs\PropertyFormGUI\PropertyFormGUI;
use srag\RequiredData\Field\Select\SelectFillField;

/**
 * Class RadioFillField
 *
 * @package srag\RequiredData\Field\Radio
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class RadioFillField extends SelectFillField
{

    /**
     * @var RadioField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(RadioField $field)
    {
        parent::__construct($field);
    }


    /**
     * @inheritDoc
     */
    public function getFormFields() : array
    {
        return [
            PropertyFormGUI::PROPERTY_CLASS    => ilRadioGroupInputGUI::class,
            PropertyFormGUI::PROPERTY_SUBITEMS => array_map(function (string $option) : array {
                return [
                    PropertyFormGUI::PROPERTY_CLASS => ilRadioOption::class,
                    "setTitle"                      => $option
                ];
            }, $this->field->getSelectOptions())
        ];
    }
}
