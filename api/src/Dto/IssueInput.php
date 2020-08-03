<?php declare(strict_types=1);

namespace App\Dto;

use App\Entity\Issue;
use App\Entity\State;
use App\Entity\User;
use DateInterval;
use phpDocumentor\Reflection\Types\Collection;

final class IssueInput
{
    /**
     * @var string $title
     */
    public string $title;

    /**
     * @var string $description
     */
    public string $description;

    /**
     * @var string $content
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
    public $subIssues;

    /**
     * @var null|array|Collection $parentIssue
     */
    public $parentIssue;

    /**
     * @var State $state
     */
    public State $state;

    /**
     * @param Issue $issue
     */
    public function copyDataToIssue(Issue $issue): void
    {
        $issue->setTitle($this->title);
        $issue->setDescription($this->description);
        $issue->setContent($this->content);
        $issue->setAssignee($this->assignee);
        $issue->setEstimationTime($this->estimationTime);
        $issue->setSubIssues($this->subIssues);
        $issue->setParentIssue($this->parentIssue);
        $issue->setState($this->state);
    }
}