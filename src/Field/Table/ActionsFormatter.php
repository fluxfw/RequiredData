<?php

namespace srag\RequiredData\Field\Table;

use srag\DataTableUI\Component\Data\Row\RowData;
use srag\DataTableUI\Implementation\Column\Formatter\Actions\AbstractActionsFormatter;
use srag\RequiredData\Field\FieldCtrl;
use srag\RequiredData\Field\FieldsCtrl;
use srag\RequiredData\Utils\RequiredDataTrait;

/**
 * Class ActionsFormatter
 *
 * @package srag\RequiredData\Field\Table
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ActionsFormatter extends AbstractActionsFormatter
{

    use RequiredDataTrait;


    /**
     * @inheritDoc
     */
    protected function getActions(RowData $row) : array
    {
        self::dic()->ctrl()->setParameterByClass(FieldCtrl::class, FieldCtrl::GET_PARAM_FIELD_TYPE, $row("type"));
        self::dic()->ctrl()->setParameterByClass(FieldCtrl::class, FieldCtrl::GET_PARAM_FIELD_ID, $row("field_id"));

        return [
            self::dic()->ui()->factory()->link()->standard(self::requiredData()->getPlugin()->translate("edit_field", FieldsCtrl::LANG_MODULE),
                self::dic()->ctrl()->getLinkTargetByClass(FieldCtrl::class, FieldCtrl::CMD_EDIT_FIELD)),
            self::dic()->ui()->factory()->link()->standard(self::requiredData()->getPlugin()->translate("remove_field", FieldsCtrl::LANG_MODULE),
                self::dic()->ctrl()->getLinkTargetByClass(FieldCtrl::class, FieldCtrl::CMD_REMOVE_FIELD_CONFIRM))
        ];
    }
}
