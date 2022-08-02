<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $name
 */
final class AcademicTermType extends Record
{
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
    public function name()
    {
        return $this->getRawField('name');
    }

    protected function getField($name)
    {
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'name',
        ];
    }

    protected function getNamespace($name)
    {
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
        ];
    }
}
