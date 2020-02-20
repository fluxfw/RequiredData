<?php

namespace srag\RequiredData\Field\Radio;

use srag\RequiredData\Field\FieldCtrl;
use srag\RequiredData\Field\Select\SelectFieldFormGUI;

/**
 * Class RadioFieldFormGUI
 *
 * @package srag\RequiredData\Field\Radio
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class RadioFieldFormGUI extends SelectFieldFormGUI
{

    /**
     * @var RadioField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, RadioField $field)
    {
        parent::__construct($parent, $field);
    }
}
