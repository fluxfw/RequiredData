<?php

namespace srag\RequiredData\Field\Text;

use srag\RequiredData\Field\AbstractFieldFormGUI;
use srag\RequiredData\Field\FieldCtrl;

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
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, TextField $field)
    {
        parent::__construct($parent, $field);
    }
}
