<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\UrlNamespace;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read OfferTypes $types
 */
final class Offers extends UrlNamespace
{
    /**
     * @return OfferTypes
     */
    public function getTypes()
    {
        return $this->buildCollection(
            OfferTypes::class,
            $this->baseUrl . '/types',
            []
        );
    }

    /**
     * @deprecated Use getTypes() instead
     * @return OfferTypes
     */
    public function types()
    {
        return $this->getTypes();
    }

    protected function getNamespace($name)
    {
        if ($name === 'types') {
            return $this->buildCollection(
                OfferTypes::class,
                $this->baseUrl . '/types',
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'types',
        ];
    }
}
