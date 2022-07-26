<?php


namespace Dream\Apply\Client\Models;

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
    const COLLECTION_CLASS = EmailCollection::class;

    protected $collectionLinks = [
        'attachments' => EmailAttachment::class,
    ];
}
