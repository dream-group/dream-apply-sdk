<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use ArrayAccess;

/**
 * @generated
 * @property-read string $name
 */
final class AcademicTermType implements ArrayAccess
{
    use BaseMethods\Record;

    const NAME_SEMESTER_FALL = 'Fall semester';

    const NAME_SEMESTER_AUTUMN = 'Autumn semester';

    const NAME_SEMESTER_SPRING = 'Spring semester';

    const NAME_SEMESTER_1 = 'Semester 1';

    const NAME_SEMESTER_2 = 'Semester 2';

    const NAME_TRIMESTER_1 = 'Trimester 1';

    const NAME_TRIMESTER_2 = 'Trimester 2';

    const NAME_TRIMESTER_3 = 'Trimester 3';

    const NAME_QUADMESTER_1 = 'Quadmester 1';

    const NAME_QUADMESTER_2 = 'Quadmester 2';

    const NAME_QUADMESTER_3 = 'Quadmester 3';

    const NAME_QUADMESTER_4 = 'Quadmester 4';

    const NAME_LEGACY = 'Legacy';

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData('name');
    }

    public function __get($name)
    {
        if ($name === 'name') {
            return $this->getData('name');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    public function __isset($name)
    {
        return \in_array($name, [
            'name',
        ]) && $this->$name !== null;
    }
}
