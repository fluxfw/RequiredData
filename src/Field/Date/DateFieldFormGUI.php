<?php

namespace srag\RequiredData\Field\Date;

use srag\RequiredData\Field\AbstractFieldFormGUI;
use srag\RequiredData\Field\FieldCtrl;

/**
 * Class DateFieldFormGUI
 *
 * @package srag\RequiredData\Field\Date
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class DateFieldFormGUI extends AbstractFieldFormGUI
{

    /**
     * @var DateField
     */
    protected $object;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, DateField $object)
    {
        parent::__construct($parent, $object);
    }
}
