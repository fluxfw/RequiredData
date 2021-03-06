<?php

namespace srag\RequiredData\Fill;

use ILIAS\UI\Component\Input\Field\Input;
use srag\DIC\DICTrait;
use srag\RequiredData\Field\AbstractField;
use srag\RequiredData\Utils\RequiredDataTrait;

/**
 * Class AbstractFillField
 *
 * @package srag\RequiredData\Fill
 */
abstract class AbstractFillField
{

    use DICTrait;
    use RequiredDataTrait;

    /**
     * @var AbstractField
     */
    protected $field;


    /**
     * AbstractFillField constructor
     *
     * @param AbstractField $field
     */
    public function __construct(AbstractField $field)
    {
        $this->field = $field;
    }


    /**
     * @param mixed $fill_value
     *
     * @return mixed
     */
    public abstract function formatAsJson($fill_value);


    /**
     * @param mixed $fill_value
     *
     * @return string
     */
    public abstract function formatAsString($fill_value) : string;


    /**
     * @return Input
     */
    public abstract function getInput() : Input;
}
