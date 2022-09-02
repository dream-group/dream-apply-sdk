<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\UrlNamespace;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 */
final class Reports extends UrlNamespace
{
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
