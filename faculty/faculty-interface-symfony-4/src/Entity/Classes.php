<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classes
 *
 * @ORM\Table(name="classes")
 * @ORM\Entity
 */
class Classes
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
     * @ORM\Column(name="program_name", type="string", length=100, nullable=false)
     */
    private $programName;

    /**
     * @var string
     *
     * @ORM\Column(name="program_code", type="string", length=20, nullable=false)
     */
    private $programCode;

    /**
     * @var string
     *
     * @ORM\Column(name="pdescription", type="string", length=200, nullable=false)
     */
    private $pdescription;

    /**
     * @var string
     *
     * @ORM\Column(name="date_created", type="string", length=30, nullable=false)
     */
    private $dateCreated;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProgramName(): ?string
    {
        return $this->programName;
    }

    public function setProgramName(string $programName): self
    {
        $this->programName = $programName;

        return $this;
    }

    public function getProgramCode(): ?string
    {
        return $this->programCode;
    }

    public function setProgramCode(string $programCode): self
    {
        $this->programCode = $programCode;

        return $this;
    }

    public function getPdescription(): ?string
    {
        return $this->pdescription;
    }

    public function setPdescription(string $pdescription): self
    {
        $this->pdescription = $pdescription;

        return $this;
    }

    public function getDateCreated(): ?string
    {
        return $this->dateCreated;
    }

    public function setDateCreated(string $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }


}
