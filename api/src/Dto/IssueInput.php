<?php declare(strict_types=1);

namespace App\Dto;

use App\Entity\Issue;
use App\Entity\State;
use App\Entity\User;
use DateInterval;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\Validator\Constraints as Assert;

final class IssueInput
{
    /**
     * @var string $title
     * @Assert\NotBlank
     */
    public string $title;

    /**
     * @var string $description
     * @Assert\NotBlank
     */
    public string $description;

    /**
     * @var string $content
     * @Assert\NotBlank
     */
    public string $content;

    /**
     * @var User|null
     */
    public ?User $assignee = null;

    /**
     * @var DateInterval|null
     */
    public ?DateInterval $estimationTime = null;

    /**
     * @var null|array|Collection $parentIssue
     */
    public ?Collection $subIssues = null;

    /**
     * @var null|array|Collection $parentIssue
     */
    public ?Collection $parentIssue = null;

    /**
     * @var State|null ?State $state
     * @Assert\NotNull(message="Issue should have a valid state")
     */
    public ?State $state;

    /**
     * @param Issue $issue
     * @throws \Exception
     */
    public function toIssue(Issue $issue): void
    {
        $issue->setTitle($this->title);
        $issue->setDescription($this->description);
        $issue->setContent($this->content);
        $issue->setAssignee($this->assignee);
        $issue->setEstimationTime($this->estimationTime);
        $issue->setState($this->state);

        if($this->subIssues !== null) {
            $issue->setSubIssues($this->subIssues);
        }

        if($this->parentIssue !== null) {
            $issue->setParentIssue($this->parentIssue);
        }
    }
}