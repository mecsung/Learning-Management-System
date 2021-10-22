<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Studentrecords
 *
 * @ORM\Table(name="studentrecords")
 * @ORM\Entity
 */
class Studentrecords
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
     * @ORM\Column(name="idnum", type="string", length=20, nullable=false)
     */
    private $idnum;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="entlev", type="string", length=20, nullable=false)
     */
    private $entlev;

    /**
     * @var string
     *
     * @ORM\Column(name="term", type="string", length=20, nullable=false)
     */
    private $term;

    /**
     * @var string
     *
     * @ORM\Column(name="program", type="string", length=50, nullable=false)
     */
    private $program;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=20, nullable=false)
     */
    private $class;

    /**
     * @var string
     *
     * @ORM\Column(name="enroll_date", type="string", length=50, nullable=false)
     */
    private $enrollDate;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getTerm(): ?string
    {
        return $this->term;
    }

    public function setTerm(string $term): self
    {
        $this->term = $term;

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

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getEnrollDate(): ?string
    {
        return $this->enrollDate;
    }

    public function setEnrollDate(string $enrollDate): self
    {
        $this->enrollDate = $enrollDate;

        return $this;
    }


}
