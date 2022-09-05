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
 * @property-read AcademicTerm $academicTerm
 * @property-read Applicant $applicant
 * @property-read BinaryRecord $pdf
 * @property-read ApplicationFlags $flags
 * @property-read ApplicationCourses $courses
 * @property-read ApplicationExports $exports
 * @property-read ApplicationDocuments $documents
 * @property-read ApplicationStudyPlans $studyplans
 * @property-read ApplicationScores $scores
 */
final class Application extends Record
{
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
     * @return ApplicationExports
     */
    public function getExports()
    {
        return $this->buildCollection(
            ApplicationExports::class,
            $this->getRawField('exports'),
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
     * @return ApplicationStudyPlans
     */
    public function getStudyplans()
    {
        return $this->buildCollection(
            ApplicationStudyPlans::class,
            $this->getRawField('studyplans'),
            []
        );
    }

    /**
     * @deprecated Use getStudyplans() instead
     * @return ApplicationStudyPlans
     */
    public function studyplans()
    {
        return $this->getStudyplans();
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
        if ($name === 'exports') {
            return $this->buildCollection(
                ApplicationExports::class,
                $this->getRawField('exports'),
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
        if ($name === 'studyplans') {
            return $this->buildCollection(
                ApplicationStudyPlans::class,
                $this->getRawField('studyplans'),
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
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'flags',
            'courses',
            'exports',
            'documents',
            'studyplans',
            'scores',
        ];
    }
}
