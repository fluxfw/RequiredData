<?php

namespace srag\RequiredData\Field\Date;

use ilDate;
use ilDatePresentation;
use ilDateTime;
use ilDateTimeInputGUI;
use srag\CustomInputGUIs\PropertyFormGUI\PropertyFormGUI;
use srag\RequiredData\Fill\AbstractFillField;

/**
 * Class DateFillField
 *
 * @package srag\RequiredData\Field\Date
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class DateFillField extends AbstractFillField
{

    /**
     * @var DateField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(DateField $field)
    {
        parent::__construct($field);
    }


    /**
     * @inheritDoc
     */
    public function getFormFields() : array
    {
        return [
            PropertyFormGUI::PROPERTY_CLASS => ilDateTimeInputGUI::class
        ];
    }


    /**
     * @inheritDoc
     */
    public function formatAsJson($filled_value)
    {
        return intval($filled_value instanceof ilDateTime ? $filled_value->getUnixTime() : $filled_value);
    }


    /**
     * @inheritDoc
     */
    public function formatAsString($filled_value) : string
    {
        return ilDatePresentation::formatDate(new ilDate(intval($filled_value), IL_CAL_UNIX));
    }
}
