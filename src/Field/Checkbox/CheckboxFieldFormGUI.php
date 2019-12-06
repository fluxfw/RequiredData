<?php

namespace srag\RequiredData\Field\Checkbox;

use srag\RequiredData\Field\AbstractFieldCtrl;
use srag\RequiredData\Field\AbstractFieldFormGUI;

/**
 * Class CheckboxFieldFormGUI
 *
 * @package srag\RequiredData\Field\Checkbox
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class CheckboxFieldFormGUI extends AbstractFieldFormGUI
{

    /**
     * @var CheckboxField
     */
    protected $object;


    /**
     * @inheritDoc
     */
    public function __construct(AbstractFieldCtrl $parent, CheckboxField $object)
    {
        parent::__construct($parent, $object);
    }
}
