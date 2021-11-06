<?php

namespace App\Entity;

use App\Repository\FacultyLoadsRepository;
use App\Repository\FacultyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * FacultyLoads
 *
 * @ORM\Table(name="faculty_loads")
 * @ORM\Entity(repositoryClass=FacultyLoadsRepository::class)
 */
class FacultyLoads
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
     * @ORM\Column(name="faculty_id", type="string", length=50, nullable=false)
     */
    private $facultyId;

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", length=255, nullable=false)
     */
    private $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="course_name", type="string", length=255, nullable=false)
     */
    private $courseName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $class;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacultyId(): ?string
    {
        return $this->facultyId;
    }

    public function setFacultyId(string $facultyId): self
    {
        $this->facultyId = $facultyId;

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

    public function getCourseName(): ?string
    {
        return $this->courseName;
    }

    public function setCourseName(string $courseName): self
    {
        $this->courseName = $courseName;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }


}
