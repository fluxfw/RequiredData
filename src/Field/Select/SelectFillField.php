<?php

namespace srag\RequiredData\Field\Select;

use ilSelectInputGUI;
use srag\CustomInputGUIs\PropertyFormGUI\PropertyFormGUI;
use srag\RequiredData\Fill\AbstractFillField;

/**
 * Class SelectFillField
 *
 * @package srag\RequiredData\Field\Select
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class SelectFillField extends AbstractFillField
{

    /**
     * @var SelectField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(SelectField $field)
    {
        parent::__construct($field);
    }


    /**
     * @inheritDoc
     */
    public function getFormFields() : array
    {
        return [
            PropertyFormGUI::PROPERTY_CLASS   => ilSelectInputGUI::class,
            PropertyFormGUI::PROPERTY_OPTIONS => ["" => ""] + $this->field->getSelectOptions()
        ];
    }


    /**
     * @inheritDoc
     */
    public function formatAsJson($filled_value)
    {
        return strval($filled_value);
    }


    /**
     * @inheritDoc
     */
    public function formatAsString($filled_value) : string
    {
        return strval($this->field->getSelectOptions()[strval($filled_value)]);
    }
}
