<?php

namespace srag\RequiredData\Field;

use srag\DataTable\Component\Data\Data;
use srag\DataTable\Component\Data\Row\RowData;
use srag\DataTable\Component\Settings\Settings;
use srag\DataTable\Component\Table;
use srag\DataTable\Implementation\Column\Formatter\Actions\AbstractActionsFormatter;
use srag\DataTable\Implementation\Data\Fetcher\AbstractDataFetcher;
use srag\DIC\DICTrait;
use srag\RequiredData\Utils\RequiredDataTrait;

/**
 * Class FieldsTable
 *
 * @package srag\RequiredData\Field
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class FieldsTable
{

    use DICTrait;
    use RequiredDataTrait;
    /**
     * @var FieldsCtrl
     */
    protected $parent;


    /**
     * FieldsTable constructor
     *
     * @param FieldsCtrl $parent
     */
    public function __construct(FieldsCtrl $parent)
    {
        $this->parent = $parent;
    }


    /**
     * @return Table
     */
    public function build() : Table
    {
        $columns = [
            self::requiredData()->dataTable()->column()->column("sort", "")->withFormatter(self::requiredData()->dataTable()->column()->formatter()->actions()->sort(self::dic()
                ->ctrl()
                ->getLinkTargetByClass(FieldCtrl::class, FieldCtrl::CMD_MOVE_FIELD_UP, "", true), self::dic()
                ->ctrl()
                ->getLinkTargetByClass(FieldCtrl::class, FieldCtrl::CMD_MOVE_FIELD_DOWN, "", true))),
            self::requiredData()->dataTable()->column()->column("enabled",
                self::requiredData()->getPlugin()->translate("enabled", FieldsCtrl::LANG_MODULE))->withSortable(false)->withFormatter(self::requiredData()->dataTable()->column()->formatter()->check())
        ];

        if (self::requiredData()->isEnableNames()) {
            $columns[] = self::requiredData()->dataTable()->column()->column("name",
                self::requiredData()->getPlugin()->translate("name", FieldsCtrl::LANG_MODULE))->withSortable(false);
        }

        $columns = array_merge($columns, [
            self::requiredData()->dataTable()->column()->column("type_title",
                self::requiredData()->getPlugin()->translate("type", FieldsCtrl::LANG_MODULE))->withSortable(false),
            self::requiredData()->dataTable()->column()->column("required",
                self::requiredData()->getPlugin()->translate("required", FieldsCtrl::LANG_MODULE))->withSortable(false)->withFormatter(self::requiredData()
                ->dataTable()
                ->column()
                ->formatter()
                ->check()),
            self::requiredData()->dataTable()->column()->column("label",
                self::requiredData()->getPlugin()->translate("label", FieldsCtrl::LANG_MODULE))->withSortable(false),
            self::requiredData()->dataTable()->column()->column("description",
                self::requiredData()->getPlugin()->translate("description", FieldsCtrl::LANG_MODULE))->withSortable(false),
            self::requiredData()->dataTable()->column()->column("field_description",
                self::requiredData()->getPlugin()->translate("field_description", FieldsCtrl::LANG_MODULE))->withSortable(false),
            self::requiredData()->dataTable()->column()->column("actions",
                self::requiredData()->getPlugin()->translate("actions", FieldsCtrl::LANG_MODULE))->withFormatter(new class() extends AbstractActionsFormatter {

                use RequiredDataTrait;


                /**
                 * @inheritDoc
                 */
                protected function getActions(RowData $row) : array
                {
                    self::dic()->ctrl()->setParameterByClass(FieldCtrl::class, FieldCtrl::GET_PARAM_FIELD_TYPE, $row("type"));
                    self::dic()->ctrl()->setParameterByClass(FieldCtrl::class, FieldCtrl::GET_PARAM_FIELD_ID, $row("field_id"));

                    return [
                        self::dic()->ui()->factory()->link()->standard(self::requiredData()->getPlugin()->translate("edit_field", FieldsCtrl::LANG_MODULE), self::dic()->ctrl()
                            ->getLinkTargetByClass(FieldCtrl::class, FieldCtrl::CMD_EDIT_FIELD)),
                        self::dic()->ui()->factory()->link()->standard(self::requiredData()->getPlugin()->translate("remove_field", FieldsCtrl::LANG_MODULE), self::dic()->ctrl()
                            ->getLinkTargetByClass(FieldCtrl::class, FieldCtrl::CMD_REMOVE_FIELD_CONFIRM))
                    ];
                }
            })
        ]);

        $table = self::requiredData()->dataTable()->table("fields_" . self::requiredData()->getPlugin()->getPluginObject()->getId(),
            self::dic()->ctrl()->getLinkTarget($this->parent, FieldsCtrl::CMD_LIST_FIELDS),
            self::requiredData()->getPlugin()->translate("fields", FieldsCtrl::LANG_MODULE), $columns,
            new class($this->parent) extends AbstractDataFetcher {

                use RequiredDataTrait;
                /**
                 * @var FieldsCtrl
                 */
                protected $parent;


                /**
                 * @inheritDoc
                 */
                public function __construct(FieldsCtrl $parent)
                {
                    $this->parent = $parent;

                    parent::__construct();
                }


                /**
                 * @inheritDoc
                 */
                public function fetchData(Settings $settings) : Data
                {
                    $data = self::requiredData()->fields()->getFields($this->parent->getParentContext(), $this->parent->getParentId(), null, false);

                    return self::requiredData()->dataTable()->data()->data(array_map(function (AbstractField $field
                    ) : RowData {
                        return self::requiredData()->dataTable()->data()->row()->getter($field->getId(), $field);
                    }, $data), count($data));
                }
            })->withPlugin(self::requiredData()->getPlugin())->withMultipleActions([
            self::requiredData()->getPlugin()->translate("enable_fields", FieldsCtrl::LANG_MODULE)  => self::dic()
                ->ctrl()
                ->getLinkTarget($this->parent, FieldsCtrl::CMD_ENABLE_FIELDS, "", "", false, false),
            self::requiredData()->getPlugin()->translate("disable_fields", FieldsCtrl::LANG_MODULE) => self::dic()
                ->ctrl()
                ->getLinkTarget($this->parent, FieldsCtrl::CMD_DISABLE_FIELD, "", "", false, false),
            self::requiredData()->getPlugin()->translate("remove_fields", FieldsCtrl::LANG_MODULE)  => self::dic()
                ->ctrl()
                ->getLinkTarget($this->parent, FieldsCtrl::CMD_REMOVE_FIELDS_CONFIRM, "", "", false, false)
        ]);

        return $table;
    }


    /**
     * @return string
     */
    public function render() : string
    {
        self::dic()->toolbar()->addComponent(self::dic()->ui()->factory()->button()->standard(self::requiredData()->getPlugin()->translate("add_field", FieldsCtrl::LANG_MODULE), self::dic()->ctrl()
            ->getLinkTargetByClass(FieldCtrl::class, FieldCtrl::CMD_ADD_FIELD)));

        return self::output()->getHTML($this->build());
    }
}
