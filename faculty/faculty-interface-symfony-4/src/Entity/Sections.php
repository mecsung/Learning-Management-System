<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sections
 *
 * @ORM\Table(name="sections")
 * @ORM\Entity
 */
class Sections
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
     * @ORM\Column(name="program", type="string", length=100, nullable=false)
     */
    private $program;

    /**
     * @var string
     *
     * @ORM\Column(name="class_name", type="string", length=50, nullable=false)
     */
    private $className;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getClassName(): ?string
    {
        return $this->className;
    }

    public function setClassName(string $className): self
    {
        $this->className = $className;

        return $this;
    }


}
