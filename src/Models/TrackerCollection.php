<?php

namespace Dream\Apply\Client\Models;

class TrackerCollection extends Collection
{
    use CollectionPlugins\CollectionOfCreatable;
    use CollectionPlugins\CollectionOfDeletable;

    /**
     * @param $code
     * @param $notes
     * @return Tracker
     * @throws \Dream\Apply\Client\Exceptions\BaseException
     */
    public function create($code, $notes)
    {
        /** @var Tracker $tracker */
        $tracker = $this->doCreate([
            'code' => $code,
            'notes' => $notes,
        ], 'Tracker with such code already exists');

        return $tracker;
    }
}
