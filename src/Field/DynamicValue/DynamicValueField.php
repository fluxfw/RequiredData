<?php

namespace srag\RequiredData\Field\DynamicValue;

use srag\RequiredData\Field\AbstractField;
use srag\RequiredData\Field\FieldsCtrl;

/**
 * Class DynamicValueField
 *
 * @package srag\RequiredData\Field\DynamicValue
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
abstract class DynamicValueField extends AbstractField
{

    /**
     * @var bool
     *
     * @con_has_field    true
     * @con_fieldtype    integer
     * @con_length       1
     * @con_is_notnull   true
     */
    protected $hide = false;


    /**
     * @inheritDoc
     */
    public function getFieldDescription() : string
    {
        return htmlspecialchars(self::requiredData()->getPlugin()->translate("dynamic_value", FieldsCtrl::LANG_MODULE, [$this->deliverDynamicValue()]));
    }


    /**
     * @return string
     */
    public abstract function deliverDynamicValue() : string;


    /**
     * @return bool
     */
    public function isHide() : bool
    {
        return $this->hide;
    }


    /**
     * @param bool $hide
     */
    public function setHide(bool $hide)/* : void*/
    {
        $this->hide = $hide;
    }
}
