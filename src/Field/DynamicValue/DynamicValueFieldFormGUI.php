<?php

namespace srag\RequiredData\Field\DynamicValue;

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
    protected $object;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, DynamicValueField $object)
    {
        parent::__construct($parent, $object);
    }
}
