<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\ReportsTrait;
use Dream\Apply\Client\BaseModels\SimpleArray;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 */
final class Reports extends SimpleArray
{
    use ReportsTrait;

    protected function getField($name)
    {
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
        ];
    }

    protected function getNamespace($name)
    {
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
        ];
    }
}
