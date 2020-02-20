<?php

namespace srag\RequiredData\Field\SearchSelect;

use srag\RequiredData\Field\FieldCtrl;
use srag\RequiredData\Field\MultiSearchSelect\MultiSearchSelectFieldFormGUI;

/**
 * Class SearchSelectFieldFormGUI
 *
 * @package srag\RequiredData\Field\SearchSelect
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class SearchSelectFieldFormGUI extends MultiSearchSelectFieldFormGUI
{

    /**
     * @var SearchSelectField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, SearchSelectField $field)
    {
        parent::__construct($parent, $field);
    }
}
