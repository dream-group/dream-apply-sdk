<?php

namespace Dream\DreamApply\Client\Models;

class FlagCollection extends CollectionOfCreatable
{
    /**
     * @param $name
     * @return Flag
     */
    public function create($name)
    {
        /** @var Flag $flag */
        $flag = $this->doCreate(['name' => $name], 'Flag with such name already exists');
        return $flag;
    }
}
