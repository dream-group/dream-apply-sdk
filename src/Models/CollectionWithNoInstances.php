<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 19.12.16
 * Time: 16:24
 */

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Exceptions\ItemNotFoundException;

/**
 * Class CollectionWithNoInstances
 * @package Dream\DreamApply\Client\Models
 *
 * When we have /some-items/ call but no /some-items/ID
 */
class CollectionWithNoInstances extends Collection
{
    const IS_ITEM_IN_QUERY_PARTIAL = false; // item here is all the data we have

    public function get($id)
    {
        $data = $this->getRawData();

        if (array_key_exists($id, $data)) {
            return new $this->itemClass($this->client, null, $data[$id], false);
        }

        throw new ItemNotFoundException();
    }

    public function exists($id)
    {
        $data = $this->getRawData();

        return array_key_exists($id, $data);
    }
}
