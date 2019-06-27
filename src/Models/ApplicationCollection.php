<?php

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Exceptions\BaseException;

/**
 * Class ApplicationCollection
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read FlagCollection|Flag[] $flags
 * @property-read SimpleArray $statuses
 * @property-read OffersNamespace $offers
 */
class ApplicationCollection extends Collection
{
    use CollectionPlugins\CollectionOfCreatable;

    protected $collectionLinks = [
        'flags'     => Flag::class,
        'statuses'  => SimpleArray::class,
        'offers'    => OffersNamespace::class,
    ];

    /**
     * @param $postData
     * @return Record
     * @throws BaseException
     */
    public function create($postData)
    {
        return $this->doCreate($postData);
    }
}
