<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users
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
     * @ORM\Column(name="id_user", type="string", length=20, nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="admin_name", type="string", length=100, nullable=false)
     */
    private $adminName;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="acctype", type="string", length=20, nullable=false)
     */
    private $acctype;

    /**
     * @var bool
     *
     * @ORM\Column(name="verified", type="boolean", nullable=false)
     */
    private $verified;

    /**
     * @var int
     *
     * @ORM\Column(name="OTP", type="integer", nullable=false)
     */
    private $otp;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    private $password;

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

    public function getIdUser(): ?string
    {
        return $this->idUser;
    }

    public function setIdUser(string $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getAdminName(): ?string
    {
        return $this->adminName;
    }

    public function setAdminName(string $adminName): self
    {
        $this->adminName = $adminName;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAcctype(): ?string
    {
        return $this->acctype;
    }

    public function setAcctype(string $acctype): self
    {
        $this->acctype = $acctype;

        return $this;
    }

    public function getVerified(): ?bool
    {
        return $this->verified;
    }

    public function setVerified(bool $verified): self
    {
        $this->verified = $verified;

        return $this;
    }

    public function getOtp(): ?int
    {
        return $this->otp;
    }

    public function setOtp(int $otp): self
    {
        $this->otp = $otp;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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
