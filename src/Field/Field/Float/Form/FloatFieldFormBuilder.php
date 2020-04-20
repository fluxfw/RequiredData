<?php

namespace srag\RequiredData\Field\Field\Float\Form;

use srag\RequiredData\Field\Field\Float\FloatField;
use srag\RequiredData\Field\Field\Integer\Form\IntegerFieldFormBuilder;
use srag\RequiredData\Field\FieldCtrl;
use srag\RequiredData\Field\FieldsCtrl;

/**
 * Class FloatFieldFormBuilder
 *
 * @package srag\RequiredData\Field\Field\Float\Form
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class FloatFieldFormBuilder extends IntegerFieldFormBuilder
{

    /**
     * @var FloatField
     */
    protected $field;


    /**
     * @inheritDoc
     */
    public function __construct(FieldCtrl $parent, FloatField $field)
    {
        parent::__construct($parent, $field);
    }


    /**
     * @inheritDoc
     */
    protected function getData() : array
    {
        $data = parent::getData();

        if ($this->field->getCountDecimals() !== null) {
            $data["count_decimals"] = [
                "value"        => true,
                "group_values" => [
                    "dependant_group" => [
                        "count_decimals" => $this->field->getCountDecimals()
                    ]
                ]
            ];
        } else {
            $data["count_decimals"] = [
                "value"        => false,
                "group_values" => [
                    "dependant_group" => [
                        "count_decimals" => 0
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
            "count_decimals" => self::dic()
                ->ui()
                ->factory()
                ->input()
                ->field()
                ->checkbox(self::requiredData()->getPlugin()->translate("count_decimals", FieldsCtrl::LANG_MODULE))
                ->withDependantGroup(self::dic()->ui()->factory()->input()->field()->dependantGroup([
                    "count_decimals" => self::dic()->ui()->factory()->input()->field()->numeric(self::requiredData()->getPlugin()->translate("count_decimals", FieldsCtrl::LANG_MODULE))
                ]))
        ];

        return $fields;
    }


    /**
     * @inheritDoc
     */
    protected function storeData(array $data) : void
    {
        if (boolval($data["count_decimals"]["value"])) {
            $data["count_decimals"] = intval($data["count_decimals"]["group_values"]["dependant_group"]["count_decimals"]);
        } else {
            $data["count_decimals"] = null;
        }

        parent::storeData($data);
    }
}
