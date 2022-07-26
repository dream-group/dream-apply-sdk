<?php

namespace Dream\Apply\Client\Models;

class FlagCollection extends Collection
{
    use CollectionPlugins\CollectionOfCreatable;
    use CollectionPlugins\CollectionOfDeletable;

    /**
     * @param $name
     * @return Flag
     * @throws \Dream\Apply\Client\Exceptions\BaseException
     */
    public function create($name)
    {
        /** @var Flag $flag */
        $flag = $this->doCreate(['name' => $name], 'Flag with such name already exists');
        return $flag;
    }
}
