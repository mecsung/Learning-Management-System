<?php

namespace App\Entity;

use App\Repository\CourseEnrolledRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * CourseEnrolled
 *
 * @ORM\Table(name="course_enrolled")
 * @ORM\Entity(repositoryClass=CourseEnrolledRepository::class)
 */
class CourseEnrolled
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="idnum", type="string", length=50, nullable=false)
     */
    private $idnum;

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", length=100, nullable=false)
     */
    private $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="year_term", type="string", length=50, nullable=false)
     */
    private $yearTerm;

    /**
     * @var string
     *
     * @ORM\Column(name="program_class", type="string", length=100, nullable=false)
     */
    private $programClass;

    /**
     * @var string
     *
     * @ORM\Column(name="course", type="string", length=100, nullable=false)
     */
    private $course;

    /**
     * @var string
     *
     * @ORM\Column(name="Interim1", type="string", length=11, nullable=false)
     */
    private $interim1;

    /**
     * @var string
     *
     * @ORM\Column(name="Midterm", type="string", length=11, nullable=false)
     */
    private $midterm;

    /**
     * @var string
     *
     * @ORM\Column(name="Interim2", type="string", length=11, nullable=false)
     */
    private $interim2;

    /**
     * @var string
     *
     * @ORM\Column(name="Final", type="string", length=11, nullable=false)
     */
    private $final;

    /**
     * @var string
     *
     * @ORM\Column(name="Grade", type="string", length=11, nullable=false)
     */
    private $grade;

    /**
     * @var string
     *
     * @ORM\Column(name="Remarks", type="string", length=20, nullable=false)
     */
    private $remarks;

    /**
     * @var string
     *
     * @ORM\Column(name="AY", type="string", length=50, nullable=false)
     */
    private $ay;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdnum(): ?string
    {
        return $this->idnum;
    }

    public function setIdnum(string $idnum): self
    {
        $this->idnum = $idnum;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getYearTerm(): ?string
    {
        return $this->yearTerm;
    }

    public function setYearTerm(string $yearTerm): self
    {
        $this->yearTerm = $yearTerm;

        return $this;
    }

    public function getProgramClass(): ?string
    {
        return $this->programClass;
    }

    public function setProgramClass(string $programClass): self
    {
        $this->programClass = $programClass;

        return $this;
    }

    public function getCourse(): ?string
    {
        return $this->course;
    }

    public function setCourse(string $course): self
    {
        $this->course = $course;

        return $this;
    }

    public function getInterim1(): ?string
    {
        return $this->interim1;
    }

    public function setInterim1(string $interim1): self
    {
        $this->interim1 = $interim1;

        return $this;
    }

    public function getMidterm(): ?string
    {
        return $this->midterm;
    }

    public function setMidterm(string $midterm): self
    {
        $this->midterm = $midterm;

        return $this;
    }

    public function getInterim2(): ?string
    {
        return $this->interim2;
    }

    public function setInterim2(string $interim2): self
    {
        $this->interim2 = $interim2;

        return $this;
    }

    public function getFinal(): ?string
    {
        return $this->final;
    }

    public function setFinal(string $final): self
    {
        $this->final = $final;

        return $this;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    public function setRemarks(string $remarks): self
    {
        $this->remarks = $remarks;

        return $this;
    }

    public function getAy(): ?string
    {
        return $this->ay;
    }

    public function setAy(string $ay): self
    {
        $this->ay = $ay;

        return $this;
    }


}
