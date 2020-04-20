<?php

namespace srag\RequiredData\Field\Field\Integer\Form;

use srag\RequiredData\Field\Field\Integer\IntegerField;
use srag\RequiredData\Field\FieldCtrl;
use srag\RequiredData\Field\FieldsCtrl;
use srag\RequiredData\Field\Form\AbstractFieldFormBuilder;

/**
 * Class IntegerFieldFormBuilder
 *
 * @package srag\RequiredData\Field\Field\Integer\Form
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class IntegerFieldFormBuilder extends AbstractFieldFormBuilder
{

    /**
     * @var IntegerField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, IntegerField $field)
    {
        parent::__construct($parent, $field);
    }


    /**
     * @inheritDoc
     */
    protected function getData() : array
    {
        $data = parent::getData();

        if ($this->field->getMinValue() !== null) {
            $data["min_value"] = [
                "value"        => true,
                "group_values" => [
                    "dependant_group" => [
                        "min_value" => $this->field->getMinValue()
                    ]
                ]
            ];
        } else {
            $data["min_value"] = [
                "value"        => false,
                "group_values" => [
                    "dependant_group" => [
                        "min_value" => 0
                    ]
                ]
            ];
        }

        if ($this->field->getMaxValue() !== null) {
            $data["max_value"] = [
                "value"        => true,
                "group_values" => [
                    "dependant_group" => [
                        "max_value" => $this->field->getMaxValue()
                    ]
                ]
            ];
        } else {
            $data["max_value"] = [
                "value"        => false,
                "group_values" => [
                    "dependant_group" => [
                        "max_value" => 0
                    ]
                ]
            ];
        }

        return $data;
    }


    /**
     * @inheritDoc
     */
    protected function getFields() : array
    {
        $fields = parent::getFields();

        $fields += [
            "min_value" => self::dic()
                ->ui()
                ->factory()
                ->input()
                ->field()
                ->checkbox(self::requiredData()->getPlugin()->translate("min_value", FieldsCtrl::LANG_MODULE))
                ->withDependantGroup(self::dic()->ui()->factory()->input()->field()->dependantGroup([
                    "min_value" => self::dic()->ui()->factory()->input()->field()->numeric(self::requiredData()->getPlugin()->translate("min_value", FieldsCtrl::LANG_MODULE))
                ])),
            "max_value" => self::dic()->ui()->factory()->input()->field()->checkbox(self::requiredData()->getPlugin()->translate("max_value", FieldsCtrl::LANG_MODULE))->withDependantGroup(self::dic()
                ->ui()
                ->factory()
                ->input()
                ->field()
                ->dependantGroup([
                    "max_value" => self::dic()->ui()->factory()->input()->field()->numeric(self::requiredData()->getPlugin()->translate("max_value", FieldsCtrl::LANG_MODULE))
                ]))
        ];

        return $fields;
    }


    /**
     * @inheritDoc
     */
    protected function storeData(array $data) : void
    {
        if ($data["min_value"]["value"] === "checked") {
            $data["min_value"] = intval($data["min_value"]["group_values"]["dependant_group"]["min_value"]);
        } else {
            $data["min_value"] = null;
        }

        if ($data["max_value"]["value"] === "checked") {
            $data["max_value"] = intval($data["max_value"]["group_values"]["dependant_group"]["max_value"]);
        } else {
            $data["max_value"] = null;
        }

        parent::storeData($data);
    }
}
