<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\IssueRepository;
use DateInterval;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=IssueRepository::class)
 */
class Issue
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @var string $title
     * @ORM\Column(name="title", type="string")
     */
    private string $title;

    /**
     * @var string $title
     * @ORM\Column(name="description", type="string", nullable=true)
     */
    private string $description;

    /**
     * @var string $content
     * @ORM\Column(name="content", type="string")
     */
    private string $content;

    /**
     * @var User $assignee
     * @ORM\ManyToOne(targetEntity="User", inversedBy="assignedIssues")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private User $assignee;

    /**
     * @var DateInterval $estimationTime
     * @ORM\Column(name="estimation_time", type="dateinterval")
     */
    private DateInterval $estimationTime;

    /**
     * @var ArrayCollection $subIssues
     * @ORM\ManyToMany(targetEntity="Issue", mappedBy="parentIssue")
     */
    private ArrayCollection $subIssues;

    /**
     * @var ArrayCollection $parentIssue
     * @ORM\ManyToMany(targetEntity="Issue", inversedBy="subIssues")
     * @ORM\JoinTable(name="issues",
     *  joinColumns={
     *     @ORM\JoinColumn(name="issue_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *     @ORM\JoinColumn(name="parent_issue_id", referencedColumnName="id")
     *  }
     * )
     */
    private ArrayCollection $parentIssue;

    /**
     * @var State $state
     * @ORM\ManyToOne(targetEntity="State", inversedBy="issues")
     */
    private State $state;

    /**
     * @var ArrayCollection $comments
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="issue")
     */
    private $comments;

    public function __construct()
    {
        $this->subIssues = new ArrayCollection();
        $this->parentIssue = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection
     */
    public function getParentIssue(): ArrayCollection
    {
        return $this->parentIssue;
    }

    /**
     * @param ArrayCollection $parentIssue
     */
    public function setParentIssue(ArrayCollection $parentIssue): void
    {
        $this->parentIssue = $parentIssue;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return ArrayCollection
     */
    public function getSubIssues(): ArrayCollection
    {
        return $this->subIssues;
    }

    /**
     * @param ArrayCollection $subIssues
     */
    public function setSubIssues(ArrayCollection $subIssues): void
    {
        $this->subIssues = $subIssues;
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
     * @return User
     */
    public function getAssignee(): User
    {
        return $this->assignee;
    }

    /**
     * @param User $assignee
     */
    public function setAssignee(User $assignee): void
    {
        $this->assignee = $assignee;
    }

    /**
     * @return DateInterval
     */
    public function getEstimationTime(): DateInterval
    {
        return $this->estimationTime;
    }

    /**
     * @param DateInterval $estimationTime
     */
    public function setEstimationTime(DateInterval $estimationTime): void
    {
        $this->estimationTime = $estimationTime;
    }

    /**
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * @param State $state
     */
    public function setState(State $state): void
    {
        $this->state = $state;
    }

    /**
     * @return ArrayCollection
     */
    public function getComments(): ArrayCollection
    {
        return $this->comments;
    }

    /**
     * @param ArrayCollection $comments
     */
    public function setComments(ArrayCollection $comments): void
    {
        $this->comments = $comments;
    }
}
