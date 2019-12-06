<?php

namespace srag\RequiredData\Fill;

use ilSession;
use srag\DIC\DICTrait;
use srag\RequiredData\Utils\RequiredDataTrait;

/**
 * Class Repository
 *
 * @package srag\RequiredData\Fill
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Repository
{

    const SESSION_TEMP_FIELD_VALUES_STORAGE = "required_data_temp_field_values";
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
     * @param FillStorage $fill_storage
     */
    protected function deleteFillStorage(FillStorage $fill_storage)/*: void*/
    {
        $fill_storage->delete();
    }


    /**
     * @param int $fill_id
     */
    public function deleteFillStorages(int $fill_id)/*: void*/
    {
        foreach ($this->getFillStorages($fill_id) as $fill_storage) {
            $this->deleteFillStorage($fill_storage);
        }
    }


    /**
     * @internal
     */
    public function dropTables()/*:void*/
    {
        self::dic()->database()->dropTable(FillStorage::getTableName(), false);
    }


    /**
     * @return Factory
     */
    public function factory() : Factory
    {
        return Factory::getInstance();
    }


    /**
     * @param int   $parent_context
     * @param int   $parent_id
     * @param array $filled_values
     *
     * @return array
     */
    public function formatAsJsons(int $parent_context, int $parent_id, array $filled_values) : array
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
     * @param int   $parent_context
     * @param int   $parent_id
     * @param array $filled_values
     *
     * @return array
     */
    public function formatAsStrings(int $parent_context, int $parent_id, array $filled_values) : array
    {
        $formated_filled_values = [];

        foreach ($filled_values as $field_id => $value) {
            list($type, $field_id) = explode("_", $field_id);

            $field = self::requiredData()->fields()->getFieldById($parent_context, $parent_id, $type, $field_id);

            if ($field !== null) {
                $formated_filled_values[$field->getLabel()] = $this->factory()->newFillFieldInstance($field)->formatAsString($value);
            }
        }

        return $formated_filled_values;
    }


    /**
     * @param int $fill_id
     *
     * @return FillStorage[]
     */
    protected function getFillStorages(int $fill_id) : array
    {
        $fill_storages = FillStorage::where([
            "fill_id" => $fill_id
        ])->get();

        return $fill_storages;
    }


    /**
     * @param int|null $fill_id
     *
     * @return array
     */
    public function getFilledValues(/*?*/ int $fill_id = null) : array
    {
        if ($fill_id === null) {
            if (isset($_SESSION[self::SESSION_TEMP_FIELD_VALUES_STORAGE])) {
                return (array) ilSession::get(self::SESSION_TEMP_FIELD_VALUES_STORAGE);
            }

            return [];
        }

        $filled_values = [];

        foreach ($this->getFillStorages($fill_id) as $fill_storage) {
            $filled_values[$fill_storage->getFieldId()] = $fill_storage->getFieldValue();
        }

        return $filled_values;
    }


    /**
     * @internal
     */
    public function installTables()/*:void*/
    {
        FillStorage::updateDB();
    }


    /**
     * @param int|null   $fill_id
     * @param array|null $filled_values
     */
    public function storeFilledValues(/*?*/ int $fill_id = null, /*?*/ array $filled_values = null)/*:void*/
    {
        if ($fill_id !== null) {
            if ($filled_values === null) {
                if (isset($_SESSION[self::SESSION_TEMP_FIELD_VALUES_STORAGE])) {
                    $filled_values = (array) ilSession::get(self::SESSION_TEMP_FIELD_VALUES_STORAGE);

                    ilSession::clear(self::SESSION_TEMP_FIELD_VALUES_STORAGE);
                }
            }

            $this->deleteFillStorages($fill_id);

            foreach ($filled_values as $field_id => $filled_value) {
                $fill_storage = $this->factory()->newFillStorageInstance();

                $fill_storage->setFillId($fill_id);

                $fill_storage->setFieldId($field_id);

                $fill_storage->setFieldValue($filled_value);

                $this->storeFillStorage($fill_storage);
            }
        } else {
            ilSession::set(self::SESSION_TEMP_FIELD_VALUES_STORAGE, $filled_values);
        }
    }


    /**
     * @param FillStorage $fill_storage
     */
    protected function storeFillStorage(FillStorage $fill_storage)/*:void*/
    {
        $fill_storage->store();
    }
}
