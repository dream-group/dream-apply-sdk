<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\BaseException;
use Dream\Apply\Client\Models\CollectionPlugins\CollectionOfCreatable;

class CourseCollection extends Collection
{
    use CollectionOfCreatable;

    /**
     * @param $fields
     * @return Record
     * @throws BaseException
     */
    public function create($fields)
    {
        if (isset($fields['institution']) && $fields['institution'] instanceof Institution) {
            /** @var Institution $institution */
            $institution = $fields['institution'];
            $fields['institution'] = $institution->id();
        }

        return $this->doCreate($fields);
    }
}
