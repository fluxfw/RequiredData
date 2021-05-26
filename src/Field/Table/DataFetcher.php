<?php

namespace srag\RequiredData\Field\Table;

use srag\DataTableUI\Component\Data\Data;
use srag\DataTableUI\Component\Data\Row\RowData;
use srag\DataTableUI\Component\Settings\Settings;
use srag\DataTableUI\Implementation\Data\Fetcher\AbstractDataFetcher;
use srag\RequiredData\Field\AbstractField;
use srag\RequiredData\Field\FieldsCtrl;
use srag\RequiredData\Utils\RequiredDataTrait;

/**
 * Class DataFetcher
 *
 * @package srag\RequiredData\Field\Table
 */
class DataFetcher extends AbstractDataFetcher
{

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

        $max_count = count($data);

        $data = array_slice($data, $settings->getOffset(), $settings->getRowsCount());

        return self::dataTableUI()->data()->data(array_map(function (AbstractField $field
        ) : RowData {
            return self::dataTableUI()->data()->row()->getter($field->getId(), $field);
        }, $data), $max_count);
    }
}
