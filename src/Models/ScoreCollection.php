<?php

namespace Dream\DreamApply\Client\Models;

class ScoreCollection extends Collection
{
    use CollectionPlugins\CollectionOfCreatable;

    /**
     * @param int|string $application (ID)
     * @param float|string $points (decimal)
     * @param string|null $comments
     * @throws \Dream\DreamApply\Client\Exceptions\BaseException
     */
    public function create($application, $points, $comments = null)
    {
        /** @var Score $score */
        $score = $this->doCreate([
            'application' => $application,
            'points' => $points,
            'comments' => $comments,
        ]);

        return $score;
    }
}
