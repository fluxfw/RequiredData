<?php

namespace srag\RequiredData\Field\DynamicValue;

use ilCheckboxInputGUI;
use srag\RequiredData\Field\AbstractFieldFormGUI;
use srag\RequiredData\Field\FieldCtrl;

/**
 * Class DynamicValueFieldFormGUI
 *
 * @package srag\RequiredData\Field\DynamicValue
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
abstract class DynamicValueFieldFormGUI extends AbstractFieldFormGUI
{

    /**
     * @var DynamicValueField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, DynamicValueField $field)
    {
        parent::__construct($parent, $field);
    }


    /**
     * @inheritDoc
     */
    protected function initFields()/*:void*/
    {
        parent::initFields();

        $this->fields = array_merge(
            $this->fields,
            [
                "hide" => [
                    self::PROPERTY_CLASS => ilCheckboxInputGUI::class
                ]
            ]);
    }
}
