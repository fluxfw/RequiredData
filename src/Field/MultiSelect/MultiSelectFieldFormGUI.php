<?php

namespace srag\RequiredData\Field\MultiSelect;

use srag\RequiredData\Field\AbstractFieldCtrl;
use srag\RequiredData\Field\Select\SelectFieldFormGUI;

/**
 * Class MultiSelectFieldFormGUI
 *
 * @package srag\RequiredData\Field\MultiSelect
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class MultiSelectFieldFormGUI extends SelectFieldFormGUI
{

    /**
     * @var MultiSelectField
     */
    protected $object;


    /**
     * @inheritDoc
     */
    public function __construct(AbstractFieldCtrl $parent, MultiSelectField $object)
    {
        parent::__construct($parent, $object);
    }
}
