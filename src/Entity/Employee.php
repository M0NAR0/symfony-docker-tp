<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Employee
 *
 * @ORM\Table(name="employee", indexes={@ORM\Index(name="FK_EMPLOYEE_ROLE", columns={"ROLE_ID"})})
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeRepository")
 */
class Employee
{
    /**
     * @var int
     *
     * @ORM\Column(name="EMPLOYEE_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EMPLOYEE_FIRSTNAME", type="string", length=50, nullable=true)
     */
    private $employeeFirstname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EMPLOYEE_LASTNAME", type="string", length=50, nullable=true)
     */
    private $employeeLastname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EMPLOYEE_EMAIL", type="string", length=200, nullable=true, unique=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EMPLOYEE_ADDRESS", type="string", length=300, nullable=true)
     */
    private $employeeAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EMPLOYEE_CITY", type="string", length=100, nullable=true)
     */
    private $employeeCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EMPLOYEE_POSTAL_CODE", type="string", length=5, nullable=true)
     * @Assert\Regex(pattern="/^[0-9\-]+$/")
     */
    private $employeePostalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EMPLOYEE_HASHED_MDP", type="string", length=255, nullable=true, options={"fixed"=true})
     */
    private $password;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="EMPLOYEE_GENRE", type="boolean", nullable=true)
     */
    private $employeeGenre;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(name="EMPLOYEE_CREATED_AT", type="datetime", nullable=true)
     */
    private $employeeCreatedAt;

    /**
     * @var Role
     *
     * @ORM\ManyToOne(targetEntity="Role", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ROLE_ID", referencedColumnName="ROLE_ID", onDelete="SET NULL")
     * })
     */
    private $role;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->employeeCreatedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployeeFirstname(): ?string
    {
        return $this->employeeFirstname;
    }

    public function setEmployeeFirstname(?string $employeeFirstname): self
    {
        $this->employeeFirstname = $employeeFirstname;

        return $this;
    }

    public function getEmployeeLastname(): ?string
    {
        return $this->employeeLastname;
    }

    public function setEmployeeLastname(?string $employeeLastname): self
    {
        $this->employeeLastname = $employeeLastname;

        return $this;
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

    public function getEmployeeAddress(): ?string
    {
        return $this->employeeAddress;
    }

    public function setEmployeeAddress(?string $employeeAddress): self
    {
        $this->employeeAddress = $employeeAddress;

        return $this;
    }

    public function getEmployeeCity(): ?string
    {
        return $this->employeeCity;
    }

    public function setEmployeeCity(?string $employeeCity): self
    {
        $this->employeeCity = $employeeCity;

        return $this;
    }

    public function getEmployeePostalCode(): ?string
    {
        return $this->employeePostalCode;
    }

    public function setEmployeePostalCode(?string $employeePostalCode): self
    {
        $this->employeePostalCode = $employeePostalCode;

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
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEmployeeGenre(): ?bool
    {
        return $this->employeeGenre;
    }

    public function setEmployeeGenre(?bool $employeeGenre): self
    {
        $this->employeeGenre = $employeeGenre;

        return $this;
    }

    public function getEmployeeCreatedAt(): ?\DateTimeInterface
    {
        return $this->employeeCreatedAt;
    }

    public function setEmployeeCreatedAt(\DateTimeInterface $employeeCreatedAt): self
    {
        $this->employeeCreatedAt = $employeeCreatedAt;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
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

    public function __toString()
    {
        return $this->employeeFirstname . " " . $this->employeeLastname;
    }
}
