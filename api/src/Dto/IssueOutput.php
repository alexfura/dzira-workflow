<?php declare(strict_types=1);

namespace App\Dto;

use App\Entity\Issue;
use App\Entity\State;
use App\Entity\User;
use DateInterval;
use Doctrine\Common\Collections\Collection;

final class IssueOutput
{
    public ?int $id;

    public string $title;

    public string $description;

    public string $content;

    public ?User $assignee = null;

    public ?DateInterval $estimationTime = null;

    public  $subIssues;

    public  $parentIssue;

    public State $state;

    public $comments;

    /**
     * @var Collection|array
     */
    public $validStates;

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