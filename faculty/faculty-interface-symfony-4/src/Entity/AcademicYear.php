<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AcademicYear
 *
 * @ORM\Table(name="academic_year")
 * @ORM\Entity
 */
class AcademicYear
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
     * @ORM\Column(name="start_date", type="string", length=50, nullable=false)
     */
    private $startDate;

    /**
     * @var string
     *
     * @ORM\Column(name="end_date", type="string", length=50, nullable=false)
     */
    private $endDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function setEndDate(string $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }


}
