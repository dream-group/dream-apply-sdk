<?php

namespace Dream\Apply\Client\Models;

class EmailCollection extends Collection
{
    use CollectionPlugins\CollectionOfCreatable;

    /**
     * @param $subject
     * @param $message
     * @return Email
     * @throws \Dream\Apply\Client\Exceptions\BaseException
     */
    public function create($subject, $message)
    {
        /** @var Email $email */
        $email = $this->doCreate([
            'subject' => $subject,
            'message' => $message,
        ]);

        return $email;
    }
}
