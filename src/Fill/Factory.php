<?php

namespace srag\RequiredData\Fill;

use srag\DIC\DICTrait;
use srag\RequiredData\Field\AbstractField;
use srag\RequiredData\Fill\Form\FormBuilder;
use srag\RequiredData\Utils\RequiredDataTrait;

/**
 * Class Factory
 *
 * @package srag\RequiredData\Fill
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Factory
{

    use DICTrait;
    use RequiredDataTrait;

    /**
     * @var self|null
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
     * Factory constructor
     */
    private function __construct()
    {

    }


    /**
     * @param AbstractFillCtrl $parent
     *
     * @return FormBuilder
     */
    public function newFillFormBuilderInstance(AbstractFillCtrl $parent) : FormBuilder
    {
        $form = new FormBuilder($parent);

        return $form;
    }


    /**
     * @param AbstractField $field
     *
     * @return AbstractFillField
     */
    public function newFillFieldInstance(AbstractField $field) : AbstractFillField
    {
        $class = substr(get_class($field), 0, -5) . "FillField";

        $fill_field = new $class($field);

        return $fill_field;
    }


    /**
     * @return FillStorage
     *
     * @internal
     */
    public function newFillStorageInstance() : FillStorage
    {
        $fill_storage = new FillStorage();

        return $fill_storage;
    }
}
