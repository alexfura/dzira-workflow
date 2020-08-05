<?php declare(strict_types=1);

namespace App\Dto;

use App\Entity\Issue;
use App\Entity\State;
use App\Entity\User;
use DateInterval;
use Doctrine\Common\Collections\Collection;

final class IssueOutput
{
    /**
     * @var int|null $id
     */
    public ?int $id;

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
     * @var User|null $assignee
     */
    public ?User $assignee = null;

    /**
     * @var DateInterval|null $estimationTime
     */
    public ?DateInterval $estimationTime = null;

    /**
     * @var Collection|array $subIssues
     */
    public  $subIssues;

    /**
     * @var Collection|array $parentIssue
     */
    public Collection $parentIssue;

    /**
     * @var State $state
     */
    public State $state;

    /**
     * @var Collection|array
     */
    public Collection $comments;

    public function copyDataFromIssue(Issue $issue): void
    {
        $this->title = $issue->getTitle();
        $this->description = $issue->getDescription();
        $this->content = $issue->getContent();
        $this->assignee = $issue->getAssignee();
        $this->estimationTime = $issue->getEstimationTime();
        $this->subIssues = $issue->getSubIssues();
        $this->parentIssue = $issue->getSubIssues();
        $this->state =  $issue->getState();
        $this->comments = $issue->getComments();
    }
}