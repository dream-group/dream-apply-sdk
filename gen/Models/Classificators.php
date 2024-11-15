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

    const CLASS_LANGUAGE_TEST = 'Language test';

    const CLASS_LANGUAGE_PROFICIENCY = 'Language proficiency';

    const CLASS_INVOICE_TYPE = 'Invoice type';

    const CLASS_INSTITUTION_TYPE = 'Institution type';

    const CLASS_SPECIAL_NEEDS = 'Special needs';

    const CLASS_DISADVANTAGED_BACKGROUND = 'Disadvantaged background';

    const CLASS_EMPLOYMENT_COMPANY = 'Employment company';

    const CLASS_EMPLOYMENT_TYPE = 'Employment type';

    const CLASS_GENDER = 'Gender';

    const CLASS_SALUTATION = 'Salutation';

    const CLASS_HOME_INSTITUTION = 'Home institution';

    const CLASS_HOST_INSTITUTION = 'Host institution';

    const CLASS_VISA_TYPE = 'Visa type';

    const CLASS_VISA_GRADUATION_PLAN = 'Visa graduation plan';

    const CLASS_ORGANIZATION_TYPE = 'Organization type';

    const CLASS_DECLINE_REASON = 'Decline reason';

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
