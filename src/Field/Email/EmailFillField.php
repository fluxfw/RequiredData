<?php

namespace srag\RequiredData\Field\Email;

use ilTextInputGUI;
use srag\CustomInputGUIs\PropertyFormGUI\PropertyFormGUI;
use srag\RequiredData\Field\Text\TextFillField;

/**
 * Class EmailFillField
 *
 * @package srag\RequiredData\Field\Email
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class EmailFillField extends TextFillField
{

    /**
     * @var EmailField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(EmailField $field)
    {
        parent::__construct($field);
    }


    /**
     * @inheritDoc
     */
    public function getFormFields() : array
    {
        return [
            PropertyFormGUI::PROPERTY_CLASS => ilTextInputGUI::class
        ];
    }
}
