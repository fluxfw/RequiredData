<?php

namespace srag\RequiredData\Field\Field\Group\Form;

use srag\RequiredData\Field\Field\Group\GroupField;
use srag\RequiredData\Field\Field\Group\GroupsCtrl;
use srag\RequiredData\Field\FieldCtrl;
use srag\RequiredData\Field\Form\AbstractFieldFormBuilder;

/**
 * Class GroupFieldFormBuilder
 *
 * @package srag\RequiredData\Field\Field\Group\Form
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class GroupFieldFormBuilder extends AbstractFieldFormBuilder
{

    /**
     * @var GroupField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, GroupField $field)
    {
        parent::__construct($parent, $field);
    }


    /**
     * @inheritDoc
     */
    public function render() : string
    {
        GroupsCtrl::addTabs();

        return parent::render();
    }
}
