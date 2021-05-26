<?php

namespace srag\RequiredData\Field\Field\Group;

require_once __DIR__ . "/../../../../../../autoload.php";

use srag\RequiredData\Field\FieldsCtrl;

/**
 * Class GroupsCtrl
 *
 * @package           srag\RequiredData\Field\Field\Group
 *
 * @ilCtrl_isCalledBy srag\RequiredData\Field\Field\Group\GroupsCtrl: srag\RequiredData\Field\FieldCtrl
 */
class GroupsCtrl extends FieldsCtrl
{

    /**
     * @inheritDoc
     */
    public function getFieldCtrlClass() : string
    {
        return GroupCtrl::class;
    }


    /**
     * @inheritDoc
     */
    protected function createGroupOfFields() : void
    {
        die();
    }


    /**
     * @inheritDoc
     */
    protected function setTabs() : void
    {
        parent::setTabs();

        self::addTabs();
    }
}
