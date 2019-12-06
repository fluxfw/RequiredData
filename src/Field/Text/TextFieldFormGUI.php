<?php

namespace srag\RequiredData\Field\Text;

use ilTextInputGUI;
use srag\CustomInputGUIs\PropertyFormGUI\PropertyFormGUI;
use srag\RequiredData\Field\AbstractFieldFormGUI;

/**
 * Class TextFieldFormGUI
 *
 * @package srag\RequiredData\Field\Text
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class TextFieldFormGUI extends AbstractFieldFormGUI
{

    /**
     * @var TextField
     */
    protected $object;


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
