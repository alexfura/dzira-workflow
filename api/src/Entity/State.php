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
     * @var mixed $issues
     * @ORM\OneToMany(targetEntity="Issue", mappedBy="state")
     */
    private $issues;

    /**
     * @var mixed $previousStates
     * @ORM\ManyToMany(targetEntity="State", mappedBy="nextStates")
     */
    private $previousStates;

    /**
     * @var mixed $nextStates
     * @ORM\ManyToMany(targetEntity="State", inversedBy="previousStates")
     * @ORM\JoinTable(
     *     name="state_transition",
     *     joinColumns={@ORM\JoinColumn(name="previous_state_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="next_state_id", referencedColumnName="id")}
     * )
     */
    private $nextStates;

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
     * @return mixed
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

    /**
     * @return mixed
     */
    public function getPreviousStates()
    {
        return $this->previousStates;
    }

    /**
     * @param mixed $previousStates
     */
    public function setPreviousStates( $previousStates): void
    {
        $this->previousStates = $previousStates;
    }

    /**
     * @return mixed
     */
    public function getNextStates()
    {
        return $this->nextStates;
    }

    /**
     * @param mixed $nextStates
     */
    public function setNextStates($nextStates): void
    {
        $this->nextStates = $nextStates;
    }

    public function isInNextOrPreviousStates(State $state): bool
    {
        return $this->nextStates->contains($state) || $this->previousStates->contains($state);
    }
}
