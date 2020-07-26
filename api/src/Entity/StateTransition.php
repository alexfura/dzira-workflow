<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StateTransitionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=StateTransitionRepository::class)
 */
class StateTransition
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity="State")
     */
    private State $fromState;

    /**
     * @ORM\ManyToOne(targetEntity="State")
     */
    private State $toState;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return State
     */
    public function getFromState(): State
    {
        return $this->fromState;
    }

    /**
     * @param State $fromState
     */
    public function setFromState(State $fromState): void
    {
        $this->fromState = $fromState;
    }

    /**
     * @return State
     */
    public function getToState(): State
    {
        return $this->toState;
    }

    /**
     * @param State $toState
     */
    public function setToState(State $toState): void
    {
        $this->toState = $toState;
    }
}
