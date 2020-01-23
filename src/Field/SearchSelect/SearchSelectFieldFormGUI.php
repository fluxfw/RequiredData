<?php

namespace srag\RequiredData\Field\SearchSelect;

use srag\RequiredData\Field\FieldCtrl;
use srag\RequiredData\Field\Select\SelectFieldFormGUI;

/**
 * Class SearchSelectFieldFormGUI
 *
 * @package srag\RequiredData\Field\SearchSelect
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class SearchSelectFieldFormGUI extends SelectFieldFormGUI
{

    /**
     * @var SearchSelectField
     */
    protected $object;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, SearchSelectField $object)
    {
        parent::__construct($parent, $object);
    }
}
