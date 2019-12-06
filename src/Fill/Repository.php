<?php

namespace srag\RequiredData\Fill;

use srag\DIC\DICTrait;
use srag\RequiredData\Utils\RequiredDataTrait;
use stdClass;

/**
 * Class Repository
 *
 * @package srag\RequiredData\Fill
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Repository
{

    use DICTrait;
    use RequiredDataTrait;
    /**
     * @var self
     */
    protected static $instance = null;


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * Repository constructor
     */
    private function __construct()
    {

    }


    /**
     * @internal
     */
    public function dropTables()/*:void*/
    {

    }


    /**
     * @return Factory
     */
    public function factory() : Factory
    {
        return Factory::getInstance();
    }


    /**
     * @param int      $parent_context
     * @param int      $parent_id
     * @param stdClass $filled_values
     *
     * @return stdClass
     */
    public function formatAsJsons(int $parent_context, int $parent_id, stdClass $filled_values) : stdClass
    {
        foreach ($filled_values as $field_id => &$value) {
            list($type, $field_id) = explode("_", $field_id);

            $field = self::requiredData()->fields()->getFieldById($parent_context, $parent_id, $type, $field_id);

            if ($field !== null) {
                $value = $this->factory()->newFillFieldInstance($field)->formatAsJson($value);
            }
        }

        return $filled_values;
    }


    /**
     * @param int      $parent_context
     * @param int      $parent_id
     * @param stdClass $filled_values
     *
     * @return stdClass
     */
    public function formatAsStrings(int $parent_context, int $parent_id, stdClass $filled_values) : stdClass
    {
        $formated_filled_values = new stdClass();

        foreach ($filled_values as $field_id => $value) {
            list($type, $field_id) = explode("_", $field_id);

            $field = self::requiredData()->fields()->getFieldById($parent_context, $parent_id, $type, $field_id);

            if ($field !== null) {
                $formated_filled_values->{$field->getLabel()} = $this->factory()->newFillFieldInstance($field)->formatAsString($value);
            }
        }

        return $formated_filled_values;
    }


    /**
     * @internal
     */
    public function installTables()/*:void*/
    {

    }
}
