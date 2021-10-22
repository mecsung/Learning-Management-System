<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Announcements
 *
 * @ORM\Table(name="announcements")
 * @ORM\Entity
 */
class Announcements
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
     * @ORM\Column(name="admin_name", type="string", length=255, nullable=false)
     */
    private $adminName;

    /**
     * @var string
     *
     * @ORM\Column(name="announcement", type="string", length=255, nullable=false)
     */
    private $announcement;

    /**
     * @var string
     *
     * @ORM\Column(name="post_date", type="string", length=255, nullable=false)
     */
    private $postDate;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAnnouncement(): ?string
    {
        return $this->announcement;
    }

    public function setAnnouncement(string $announcement): self
    {
        $this->announcement = $announcement;

        return $this;
    }

    public function getPostDate(): ?string
    {
        return $this->postDate;
    }

    public function setPostDate(string $postDate): self
    {
        $this->postDate = $postDate;

        return $this;
    }


}
