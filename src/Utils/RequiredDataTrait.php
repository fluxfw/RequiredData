<?php

namespace srag\RequiredData\Utils;

use srag\RequiredData\Repository as RequiredDataRepository;

/**
 * Trait RequiredDataTrait
 *
 * @package srag\RequiredData\Utils
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
