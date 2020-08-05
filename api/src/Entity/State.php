<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private Collection $issues;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="State", mappedBy="nextStates")
     */
    private Collection $previousStates;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="State", inversedBy="previousStates")
     * @ORM\JoinTable(
     *     name="state_transition",
     *     joinColumns={@ORM\JoinColumn(name="previous_state_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="next_state_id", referencedColumnName="id")}
     * )
     */
    private Collection $nextStates;

    public function __construct()
    {
        $this->issues = new ArrayCollection();
        $this->previousStates = new ArrayCollection();
        $this->nextStates = new ArrayCollection();
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
     * @return Collection
     */
    public function getIssues(): Collection
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

    /**
     * @return Collection
     */
    public function getPreviousStates(): Collection
    {
        return $this->previousStates;
    }

    /**
     * @param Collection $previousStates
     */
    public function setPreviousStates(Collection $previousStates): void
    {
        $this->previousStates = $previousStates;
    }

    /**
     * @return Collection
     */
    public function getNextStates(): Collection
    {
        return $this->nextStates;
    }

    /**
     * @param Collection $nextStates
     */
    public function setNextStates(Collection $nextStates): void
    {
        $this->nextStates = $nextStates;
    }
}
