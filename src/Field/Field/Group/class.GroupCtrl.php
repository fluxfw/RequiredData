<?php

namespace srag\RequiredData\Field\Field\Group;

use srag\RequiredData\Field\FieldCtrl;

/**
 * Class GroupCtrl
 *
 * @package           srag\RequiredData\Field\Field\Group
 *
 * @author            studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 *
 * @ilCtrl_isCalledBy srag\RequiredData\Field\Field\Group\GroupCtrl: srag\RequiredData\Field\Field\Group\GroupsCtrl
 * @ilCtrl_isCalledBy srag\RequiredData\Field\Field\StaticMultiSearchSelect\SMSSAjaxAutoCompleteCtrl: srag\RequiredData\Field\Field\Group\GroupCtrl
 */
class GroupCtrl extends FieldCtrl
{

    /**
     * @inheritDoc
     */
    protected function ungroup() : void
    {
        die();
    }
}
