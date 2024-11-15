<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $created
 * @property-read string|null $revised
 * @property-read string|null $submitted
 * @property-read string $status
 * @property-read array $profile
 * @property-read array $legal
 * @property-read array $contact
 * @property-read array $home
 * @property-read array $host
 * @property-read array $education
 * @property-read array $grades
 * @property-read array $languages
 * @property-read array $career
 * @property-read array $activities
 * @property-read array $residences
 * @property-read array $motivation
 * @property-read array $visa
 * @property-read array $misc
 * @property-read array $extras
 * @property-read AcademicTerm $academicTerm
 * @property-read Applicant $applicant
 * @property-read BinaryRecord $pdf
 * @property-read ApplicationFlags $flags
 * @property-read ApplicationCourses $courses
 * @property-read Offers $offers
 * @property-read ApplicationExports $exports
 * @property-read ApplicationDocuments $documents
 * @property-read ApplicationScores $scores
 * @property-read ApplicationTasks $tasks
 */
final class Application extends Record
{
    const STATUS_BLANK = 'Blank';

    const STATUS_DRAFT = 'Draft';

    const STATUS_INACTIVE = 'Inactive';

    const STATUS_REOPENED = 'Reopened';

    const STATUS_SUBMITTED = 'Submitted';

    const STATUS_ACCEPTED = 'Accepted';

    const STATUS_WITHDRAWN = 'Withdrawn';

    const STATUS_CLOSED = 'Closed';

    const STATUS_REJECTED = 'Rejected';

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getRawField('id');
    }

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->getRawField('created');
    }

    /**
     * @return string|null
     */
    public function getRevised()
    {
        return $this->getRawField('revised');
    }

    /**
     * @return string|null
     */
    public function getSubmitted()
    {
        return $this->getRawField('submitted');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getRawField('status');
    }

    /**
     * @return array
     */
    public function getProfile()
    {
        return $this->getRawField('profile');
    }

    /**
     * @return array
     */
    public function getLegal()
    {
        return $this->getRawField('legal');
    }

    /**
     * @return array
     */
    public function getContact()
    {
        return $this->getRawField('contact');
    }

    /**
     * @return array
     */
    public function getHome()
    {
        return $this->getRawField('home');
    }

    /**
     * @return array
     */
    public function getHost()
    {
        return $this->getRawField('host');
    }

    /**
     * @return array
     */
    public function getEducation()
    {
        return $this->getRawField('education');
    }

    /**
     * @return array
     */
    public function getGrades()
    {
        return $this->getRawField('grades');
    }

    /**
     * @return array
     */
    public function getLanguages()
    {
        return $this->getRawField('languages');
    }

    /**
     * @return array
     */
    public function getCareer()
    {
        return $this->getRawField('career');
    }

    /**
     * @return array
     */
    public function getActivities()
    {
        return $this->getRawField('activities');
    }

    /**
     * @return array
     */
    public function getResidences()
    {
        return $this->getRawField('residences');
    }

    /**
     * @return array
     */
    public function getMotivation()
    {
        return $this->getRawField('motivation');
    }

    /**
     * @return array
     */
    public function getVisa()
    {
        return $this->getRawField('visa');
    }

    /**
     * @return array
     */
    public function getMisc()
    {
        return $this->getRawField('misc');
    }

    /**
     * @return array
     */
    public function getExtras()
    {
        return $this->getRawField('extras');
    }

    /**
     * @return AcademicTerm
     */
    public function getAcademicTerm()
    {
        return $this->getObjectField('academic_term', AcademicTerm::class);
    }

    /**
     * @return AcademicTerm
     * @deprecated Use getAcademicTerm() instead
     */
    public function academicTerm()
    {
        return $this->getAcademicTerm();
    }

    /**
     * @return bool
     */
    public function hasAcademicTerm()
    {
        return $this->hasObjectField('academic_term');
    }

    /**
     * @return bool
     * @deprecated Use hasAcademicTerm() instead
     */
    public function academicTermExists()
    {
        return $this->hasAcademicTerm();
    }

    /**
     * @return Applicant
     */
    public function getApplicant()
    {
        return $this->getObjectField('applicant', Applicant::class);
    }

    /**
     * @return Applicant
     * @deprecated Use getApplicant() instead
     */
    public function applicant()
    {
        return $this->getApplicant();
    }

    /**
     * @return bool
     */
    public function hasApplicant()
    {
        return $this->hasObjectField('applicant');
    }

    /**
     * @return bool
     * @deprecated Use hasApplicant() instead
     */
    public function applicantExists()
    {
        return $this->hasApplicant();
    }

    /**
     * @return BinaryRecord
     */
    public function getPdf()
    {
        return $this->getObjectField('pdf', BinaryRecord::class);
    }

    /**
     * @return BinaryRecord
     * @deprecated Use getPdf() instead
     */
    public function pdf()
    {
        return $this->getPdf();
    }

    /**
     * @return bool
     */
    public function hasPdf()
    {
        return $this->hasObjectField('pdf');
    }

    /**
     * @return bool
     * @deprecated Use hasPdf() instead
     */
    public function pdfExists()
    {
        return $this->hasPdf();
    }

    /**
     * @return ApplicationFlags
     */
    public function getFlags()
    {
        return $this->buildCollection(
            ApplicationFlags::class,
            $this->getRawField('flags'),
            []
        );
    }

    /**
     * @deprecated Use getFlags() instead
     * @return ApplicationFlags
     */
    public function flags()
    {
        return $this->getFlags();
    }

    /**
     * @return ApplicationCourses
     */
    public function getCourses()
    {
        return $this->buildCollection(
            ApplicationCourses::class,
            $this->getRawField('courses'),
            []
        );
    }

    /**
     * @deprecated Use getCourses() instead
     * @return ApplicationCourses
     */
    public function courses()
    {
        return $this->getCourses();
    }

    /**
     * @return Offers
     */
    public function getOffers()
    {
        return $this->buildCollection(
            Offers::class,
            $this->getRawField('offers'),
            []
        );
    }

    /**
     * @deprecated Use getOffers() instead
     * @return Offers
     */
    public function offers()
    {
        return $this->getOffers();
    }

    /**
     * @return ApplicationExports
     */
    public function getExports()
    {
        return $this->buildCollection(
            ApplicationExports::class,
            $this->baseUrl . '/exports',
            []
        );
    }

    /**
     * @deprecated Use getExports() instead
     * @return ApplicationExports
     */
    public function exports()
    {
        return $this->getExports();
    }

    /**
     * @return ApplicationDocuments
     */
    public function getDocuments()
    {
        return $this->buildCollection(
            ApplicationDocuments::class,
            $this->getRawField('documents'),
            []
        );
    }

    /**
     * @deprecated Use getDocuments() instead
     * @return ApplicationDocuments
     */
    public function documents()
    {
        return $this->getDocuments();
    }

    /**
     * @return ApplicationScores
     */
    public function getScores()
    {
        return $this->buildCollection(
            ApplicationScores::class,
            $this->getRawField('scores'),
            []
        );
    }

    /**
     * @deprecated Use getScores() instead
     * @return ApplicationScores
     */
    public function scores()
    {
        return $this->getScores();
    }

    /**
     * @return ApplicationTasks
     */
    public function getTasks()
    {
        return $this->buildCollection(
            ApplicationTasks::class,
            $this->baseUrl . '/tasks',
            []
        );
    }

    /**
     * @deprecated Use getTasks() instead
     * @return ApplicationTasks
     */
    public function tasks()
    {
        return $this->getTasks();
    }

    /**
     * @return void
     */
    public function close()
    {
        return $this->callMethod('close');
    }

    /**
     * @return void
     */
    public function freeze()
    {
        return $this->callMethod('freeze');
    }

    /**
     * @return void
     */
    public function unfreeze()
    {
        return $this->callMethod('unfreeze');
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'created') {
            return $this->getRawField('created');
        }
        if ($name === 'revised') {
            return $this->getRawField('revised');
        }
        if ($name === 'submitted') {
            return $this->getRawField('submitted');
        }
        if ($name === 'status') {
            return $this->getRawField('status');
        }
        if ($name === 'profile') {
            return $this->getRawField('profile');
        }
        if ($name === 'legal') {
            return $this->getRawField('legal');
        }
        if ($name === 'contact') {
            return $this->getRawField('contact');
        }
        if ($name === 'home') {
            return $this->getRawField('home');
        }
        if ($name === 'host') {
            return $this->getRawField('host');
        }
        if ($name === 'education') {
            return $this->getRawField('education');
        }
        if ($name === 'grades') {
            return $this->getRawField('grades');
        }
        if ($name === 'languages') {
            return $this->getRawField('languages');
        }
        if ($name === 'career') {
            return $this->getRawField('career');
        }
        if ($name === 'activities') {
            return $this->getRawField('activities');
        }
        if ($name === 'residences') {
            return $this->getRawField('residences');
        }
        if ($name === 'motivation') {
            return $this->getRawField('motivation');
        }
        if ($name === 'visa') {
            return $this->getRawField('visa');
        }
        if ($name === 'misc') {
            return $this->getRawField('misc');
        }
        if ($name === 'extras') {
            return $this->getRawField('extras');
        }
        if ($name === 'academicTerm') {
            return $this->getObjectField('academic_term', AcademicTerm::class);
        }
        if ($name === 'applicant') {
            return $this->getObjectField('applicant', Applicant::class);
        }
        if ($name === 'pdf') {
            return $this->getObjectField('pdf', BinaryRecord::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'created',
            'revised',
            'submitted',
            'status',
            'profile',
            'legal',
            'contact',
            'home',
            'host',
            'education',
            'grades',
            'languages',
            'career',
            'activities',
            'residences',
            'motivation',
            'visa',
            'misc',
            'extras',
            'academic_term',
            'applicant',
            'pdf',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'flags') {
            return $this->buildCollection(
                ApplicationFlags::class,
                $this->getRawField('flags'),
                []
            );
        }
        if ($name === 'courses') {
            return $this->buildCollection(
                ApplicationCourses::class,
                $this->getRawField('courses'),
                []
            );
        }
        if ($name === 'offers') {
            return $this->buildCollection(
                Offers::class,
                $this->getRawField('offers'),
                []
            );
        }
        if ($name === 'exports') {
            return $this->buildCollection(
                ApplicationExports::class,
                $this->baseUrl . '/exports',
                []
            );
        }
        if ($name === 'documents') {
            return $this->buildCollection(
                ApplicationDocuments::class,
                $this->getRawField('documents'),
                []
            );
        }
        if ($name === 'scores') {
            return $this->buildCollection(
                ApplicationScores::class,
                $this->getRawField('scores'),
                []
            );
        }
        if ($name === 'tasks') {
            return $this->buildCollection(
                ApplicationTasks::class,
                $this->baseUrl . '/tasks',
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'flags',
            'courses',
            'offers',
            'exports',
            'documents',
            'scores',
            'tasks',
        ];
    }
}
