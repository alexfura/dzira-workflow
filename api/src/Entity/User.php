<?php declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="dzhira_user")
 * @ApiResource(
 *     collectionOperations={
 *          "get" = {
 *              "normalization_context"={"groups"={"user:get"}}
 *          },
 *          "post" = {
 *              "denormalization_context"={"groups" ={"user:post"}}
 *          }
 *     },
 *     itemOperations={
 *          "get" = {
 *              "normalization_context"={"groups"={"user:get"}}
 *          },
 *          "put" = {
 *              "denormalization_context"={"groups" ={"user:put"}}
 *          },
 *          "delete"
 *     }
 * )
 * @UniqueEntity(fields={"email"})
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("user:get")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"user:post", "user:get"})
     * @Assert\Email()
     */
    private string $email;

    /**
     * @ORM\Column(type="json")
     * @Groups({"user:put"})
     */
    private array $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private string $password;

    /**
     * @var string $name
     */
    private string $name;

    /**
     * @var string $surname
     */
    private string $surname;

    /**
     * @var string $position
     */
    private ?string $position;

    /**
     * @var null|string $plainPassword
     * @SerializedName("password")
     * @Groups({"user:post", "user:put"})
     */
    private ?string $plainPassword = null;

    /**
     * @var mixed $assignedIssues
     * @ORM\OneToMany(targetEntity="Issue", mappedBy="assignee")
     * @Groups({"user:put", "user:get"})
     */
    private $assignedIssues;

    public function __construct()
    {
        $this->assignedIssues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @return string
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword(string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
         $this->plainPassword = null;
    }

    /**
     * @return mixed
     */
    public function getAssignedIssues()
    {
        return $this->assignedIssues;
    }

    /**
     * @param mixed $assignedIssues
     */
    public function setAssignedIssues($assignedIssues): void
    {
        $this->assignedIssues = $assignedIssues;
    }
}
