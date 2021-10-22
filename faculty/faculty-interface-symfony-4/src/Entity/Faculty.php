<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faculty
 *
 * @ORM\Table(name="faculty")
 * @ORM\Entity
 */
class Faculty
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
     * @ORM\Column(name="fullname", type="string", length=100, nullable=false)
     */
    private $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="faculty_id", type="string", length=50, nullable=false)
     */
    private $facultyId;

    /**
     * @var string
     *
     * @ORM\Column(name="special", type="string", length=100, nullable=false)
     */
    private $special;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=50, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=50, nullable=false)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=10, nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="reg_date", type="string", length=50, nullable=false)
     */
    private $regDate;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFacultyId(): ?string
    {
        return $this->facultyId;
    }

    public function setFacultyId(string $facultyId): self
    {
        $this->facultyId = $facultyId;

        return $this;
    }

    public function getSpecial(): ?string
    {
        return $this->special;
    }

    public function setSpecial(string $special): self
    {
        $this->special = $special;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

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


}
