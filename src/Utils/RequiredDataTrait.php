<?php

namespace srag\RequiredData\Utils;

use srag\RequiredData\Repository as RequiredDataRepository;

/**
 * Trait RequiredDataTrait
 *
 * @package srag\RequiredData\Utils
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
trait RequiredDataTrait
{

    /**
     * @return RequiredDataRepository
     */
    protected static function requiredData() : RequiredDataRepository
    {
        return RequiredDataRepository::getInstance();
    }
}
