<?php

namespace srag\RequiredData\Field\MultilineText;

use srag\RequiredData\Field\AbstractFieldCtrl;
use srag\RequiredData\Field\Text\TextFieldFormGUI;

/**
 * Class MultilineTextFieldFormGUI
 *
 * @package srag\RequiredData\Field\MultilineText
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class MultilineTextFieldFormGUI extends TextFieldFormGUI
{

    /**
     * @var MultilineTextField
     */
    protected $object;


    /**
     * @inheritDoc
     */
    public function __construct(AbstractFieldCtrl $parent, MultilineTextField $object)
    {
        parent::__construct($parent, $object);
    }
}
