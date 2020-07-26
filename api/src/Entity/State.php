<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class State
 * @package App\Entity
 * @ORM\Entity()
 * @ApiResource()
 */
class State
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(name="title", type="text")
     */
    private string $title;

    /**
     * @ORM\Column(name="description", type="text")
     */
    private string $description;

    /**
     * @ORM\OneToMany(targetEntity="Issue", mappedBy="state")
     */
    private $issues;

    public function __construct()
    {
        $this->issues = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return ArrayCollection
     */
    public function getIssues()
    {
        return $this->issues;
    }

    /**
     * @param mixed $issues
     */
    public function setIssues($issues): void
    {
        $this->issues = $issues;
    }
}
