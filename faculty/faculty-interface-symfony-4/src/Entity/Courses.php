<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Courses
 *
 * @ORM\Table(name="courses")
 * @ORM\Entity
 */
class Courses
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
     * @ORM\Column(name="course_name", type="string", length=50, nullable=false)
     */
    private $courseName;

    /**
     * @var string
     *
     * @ORM\Column(name="course_code", type="string", length=20, nullable=false)
     */
    private $courseCode;

    /**
     * @var int
     *
     * @ORM\Column(name="units", type="integer", nullable=false)
     */
    private $units;

    /**
     * @var string
     *
     * @ORM\Column(name="entlev", type="string", length=20, nullable=false)
     */
    private $entlev;

    /**
     * @var string
     *
     * @ORM\Column(name="program", type="string", length=50, nullable=false)
     */
    private $program;

    /**
     * @var string
     *
     * @ORM\Column(name="reg_date", type="string", length=50, nullable=false)
     */
    private $regDate;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourseName(): ?string
    {
        return $this->courseName;
    }

    public function setCourseName(string $courseName): self
    {
        $this->courseName = $courseName;

        return $this;
    }

    public function getCourseCode(): ?string
    {
        return $this->courseCode;
    }

    public function setCourseCode(string $courseCode): self
    {
        $this->courseCode = $courseCode;

        return $this;
    }

    public function getUnits(): ?int
    {
        return $this->units;
    }

    public function setUnits(int $units): self
    {
        $this->units = $units;

        return $this;
    }

    public function getEntlev(): ?string
    {
        return $this->entlev;
    }

    public function setEntlev(string $entlev): self
    {
        $this->entlev = $entlev;

        return $this;
    }

    public function getProgram(): ?string
    {
        return $this->program;
    }

    public function setProgram(string $program): self
    {
        $this->program = $program;

        return $this;
    }

    public function getRegDate(): ?string
    {
        return $this->regDate;
    }

    public function setRegDate(string $regDate): self
    {
        $this->regDate = $regDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }


}
