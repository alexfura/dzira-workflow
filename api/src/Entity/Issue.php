<?php declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Dto\IssueInput;
use App\Dto\IssueOutput;
use App\Repository\IssueRepository;
use DateInterval;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     input=IssueInput::class,
 *     output=IssueOutput::class
 * )
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
     * @ORM\Column(name="title", type="string")
     */
    private string $title;

    /**
     * @var null|string $title
     * @ORM\Column(name="description", type="string", nullable=true)
     */
    private ?string $description;

    /**
     * @var string $content
     * @ORM\Column(name="content", type="string")
     */
    private string $content;

    /**
     * @var null|User $assignee
     * @ORM\ManyToOne(targetEntity="User", inversedBy="assignedIssues")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private ?User $assignee;

    /**
     * @var DateInterval $estimationTime
     * @ORM\Column(name="estimation_time", type="dateinterval", nullable=true)
     */
    private ?DateInterval $estimationTime;

    /**
     * @var Collection $subIssues
     * @ORM\ManyToMany(targetEntity="Issue", mappedBy="parentIssue")
     */
    private Collection $subIssues;

    /**
     * @var Collection $parentIssue
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
    private Collection $parentIssue;

    /**
     * @var State $state
     * @ORM\ManyToOne(targetEntity="State", inversedBy="issues")
     */
    private ?State $state = null;

    /**
     * @var Collection $comments
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="issue")
     */
    private Collection $comments;

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
     * @return mixed
     */
    public function getParentIssue()
    {
        return $this->parentIssue;
    }

    /**
     * @param mixed $parentIssue
     */
    public function setParentIssue($parentIssue): void
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
     * @return mixed
     */
    public function getSubIssues()
    {
        return $this->subIssues;
    }

    /**
     * @param mixed $subIssues
     */
    public function setSubIssues($subIssues): void
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
     * @return User|null
     */
    public function getAssignee(): ?User
    {
        return $this->assignee;
    }

    /**
     * @param null|User $assignee
     */
    public function setAssignee(?User $assignee): void
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
     * @param null|DateInterval $estimationTime
     */
    public function setEstimationTime(?DateInterval $estimationTime): void
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
     * @return Collection
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    /**
     * @param Collection $comments
     */
    public function setComments(Collection $comments): void
    {
        $this->comments = $comments;
    }
}
