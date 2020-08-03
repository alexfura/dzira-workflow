<?php declare(strict_types=1);

namespace App\Dto;

use App\Entity\Issue;
use App\Entity\State;
use App\Entity\User;
use DateInterval;

final class UpdateIssue
{
    public string $title;

    public string $description;

    public string $content;

    public ?User $assignee = null;

    public ?DateInterval $estimationTime = null;

    public  $subIssues;

    public  $parentIssue;

    public State $state;

    public $comments;

    public function toIssue(Issue $issue): void
    {

    }
}