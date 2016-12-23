<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 23/12/16
 * Time: 16:58
 */

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
