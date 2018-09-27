<?php


namespace Dream\DreamApply\Client\Models;

/**
 * Class Email
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $inserted
 * @property-read string $delivered
 * @property-read string $failed
 * @property-read string $opened
 * @property-read array  $from       contains ['email', 'name']
 * @property-read string $subject
 * @property-read string $message
 *
 * @property-read Collection|EmailAttachment[] $attachments
 */
class Email extends Record
{
    protected $collectionLinks = [
        'attachments' => EmailAttachment::class,
    ];
}
