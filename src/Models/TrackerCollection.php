<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 23/12/16
 * Time: 17:01
 */

namespace Dream\DreamApply\Client\Models;

class TrackerCollection extends CollectionOfCreatable
{
    /**
     * @param $code
     * @param $notes
     * @return Tracker
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
