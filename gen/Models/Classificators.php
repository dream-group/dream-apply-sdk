<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\SimpleArray;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 */
final class Classificators extends SimpleArray
{
    const CLASS_ADVISOR_GROUP = 'Advisor group';

    const CLASS_EDUCATION_LEVEL = 'Education level';

    const CLASS_EDUCATION_INSTITUTION = 'Education institution';

    const CLASS_EDUCATION_HONOR = 'Education honor';

    const CLASS_EDUCATION_MODE = 'Education mode';

    const CLASS_EDUCATION_FINANCE = 'Education finance';

    const CLASS_EDUCATION_STATUS = 'Education status';

    const CLASS_EDUCATION_TERM = 'Education term';

    const CLASS_COURSE_TYPE = 'Course type';

    const CLASS_COURSE_MODE = 'Course mode';

    const CLASS_COURSE_ENTRY = 'Course entry';

    const CLASS_COURSE_ENTRY_ASSURANCE = 'Course entry assurance';

    const CLASS_SUBJECT_TYPE = 'Subject type';

    const CLASS_SUBJECT_MODE = 'Subject mode';

    const CLASS_GRADE_TYPE = 'Grade type';

    const CLASS_LANGUAGE_TEST = 'Advisor group';

    const CLASS_LANGUAGE_PROFICIENCY = 'Education level';

    const CLASS_INVOICE_TYPE = 'Education institution';

    const CLASS_INSTITUTION_SIZE = 'Education honor';

    const CLASS_INSTITUTION_SUBJECT = 'Education mode';

    const CLASS_INSTITUTION_TYPE = 'Education finance';

    const CLASS_TEACHING_LEVEL = 'Education status';

    const CLASS_TRAINING_TYPE = 'Education term';

    const CLASS_SPECIAL_NEEDS = 'Course type';

    const CLASS_DISADVANTAGED_BACKGROUND = 'Course mode';

    const CLASS_EMPLOYMENT_COMPANY = 'Course entry';

    const CLASS_EMPLOYMENT_TYPE = 'Course entry assurance';

    const CLASS_SENIORITY_LEVEL = 'Subject type';

    const CLASS_STAFF_CATEGORY = 'Subject mode';

    const CLASS_GENDER = 'Grade type';

    const CLASS_SALUTATION = 'Advisor group';

    const CLASS_HOME_INSTITUTION = 'Education level';

    const CLASS_HOST_INSTITUTION = 'Education institution';

    const CLASS_VISA_TYPE = 'Education honor';

    const CLASS_VISA_GRADUATION_PLAN = 'Education mode';

    const CLASS_ORGANIZATION_TYPE = 'Education finance';

    const CLASS_DECLINE_REASON = 'Education status';

    protected function getField($name)
    {
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
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
