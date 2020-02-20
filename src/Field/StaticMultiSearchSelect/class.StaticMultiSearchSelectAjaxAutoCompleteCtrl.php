<?php

namespace srag\RequiredData\Field\StaticMultiSearchSelect;

use srag\CustomInputGUIs\MultiSelectSearchNewInputGUI\AbstractAjaxAutoCompleteCtrl;
use srag\RequiredData\Field\FieldCtrl;
use srag\RequiredData\Utils\RequiredDataTrait;

/**
 * Class StaticMultiSearchSelectAjaxAutoCompleteCtrl
 *
 * @package srag\RequiredData\Field\StaticMultiSearchSelect
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class StaticMultiSearchSelectAjaxAutoCompleteCtrl extends AbstractAjaxAutoCompleteCtrl
{

    use RequiredDataTrait;
    /**
     * @var FieldCtrl
     */
    protected $parent;


    /**
     * StaticMultiSearchSelectAjaxAutoCompleteCtrl constructor
     *
     * @param FieldCtrl $parent
     */
    public function __construct(FieldCtrl $parent)
    {
        parent::__construct();

        $this->parent = $parent;
    }


    /**
     * @inheritDoc
     */
    public function searchOptions(string $search = null) : array
    {
        $form = self::requiredData()->fields()->factory()->newFormInstance($this->parent, $this->parent->getField());

        return $form->deliverPossibleOptions($search);
    }


    /**
     * @inheritDoc
     */
    public function fillOptions(array $ids) : array
    {
        // TODO: Implement fillOptions() method.
    }
}
